@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/croppie/croppie.css">
    <link rel="stylesheet" href="{{ asset('base/css/pages/couple.css') }}">
    <style>
        .preview {
            width: 300px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <div id="app">
        <el-dialog
            title="Chỉnh sửa hình ảnh"
            :visible.sync="dialogVisible"
            :close-on-click-modal="false"
            width="400px"
        >
            <vue-croppie
                ref="croppieRef"
                :boundary="{ width: 338, height: 338}"
                :viewPort="{ width: 300, height: 300 }"
            >
            </vue-croppie>
            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Hủy</el-button>
                <el-button type="primary" @click="crop">Xác nhận</el-button>
           </span>
        </el-dialog>

        <div class="container">
            <div class="box">
                <div class="box-header">
                    <div class="back">
                        <a href="{{route('dashboard')}}">
                            <i class="el-icon-back"></i>
                            Trở về
                        </a>
                    </div>
                    <div class="title-header">
                            Phù Dâu & Phu Rể
                    </div>
                    <div class="next">
                        <a href="{{route('loi-cam-ta')}}">Tiếp theo
                            <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <el-row :gutter="20">
                        <el-col :span="12" :md="12" :sm="24" :xs="24">
                            <div class="form-info chu_re mb-3">
                                <div class="text-center">
                                    Thông tin phù rể
                                </div>
                                <div class="preview">
                                    <div class="preview-img mt-3">
                                        <img id="anh_phu_de" :src="form.anh_phu_re" alt="">
                                        <div class="upload">
                                            <label for="input_anh_phu_de">
                                                Thay đổi hình ảnh
                                                <input @change="changeImage('anh_phu_re')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_phu_de">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên</label>
                                        <el-input v-model="form.ten_phu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Giới thiệu</label>
                                        <el-input type="textarea" v-model="form.gioi_thieu_phu_re" ></el-input>
                                    </div>
                                </div>
                            </div>
                        </el-col>
                        <el-col :span="12" :md="12" :sm="24" :xs="24">
                            <div class="form-info chu_re">
                                <div class="text-center">
                                    Thông tin phù dâu
                                </div>
                                <div class="preview">
                                    <div class="preview-img mt-3">
                                        <img id="anh_phu_dau" :src="form.anh_phu_dau" alt="">
                                        <div class="upload">
                                            <label for="input_anh_phu_dau">
                                                Thay đổi hình ảnh
                                                <input @change="changeImage('anh_phu_dau')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_phu_dau">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên</label>
                                        <el-input v-model="form.ten_phu_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Giới thiệu</label>
                                        <el-input type="textarea" v-model="form.gioi_thieu_phu_dau" ></el-input>
                                    </div>
                                </div>
                            </div>
                        </el-col>
                    </el-row>
                    <button @click="save" class="action">
                        Lưu thông tin
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/vue-croppie/dist/vue-croppie.js"></script>
    <script>
        ELEMENT.locale(ELEMENT.lang.en)
        new Vue({
            el: '#app',
            data: {
                form: {},
                loading: false,
                dialogVisible: false,

                croppieImage: '',
                image: null,
                key: null
            },
            created() {
                this.fetchData()
            },
            mounted() {

            },
            methods: {
                crop() {
                    let options = {
                        type: 'base64',
                        size: { width: 500, height: 500 },
                        format: 'jpeg'
                    };
                    this.$refs.croppieRef.result(options, output => {
                        this.croppieImage = output;

                        const loading = this.$loading({
                            lock: true,
                            text: 'Đang tải hình ảnh',
                            spinner: 'el-icon-loading',
                            background: 'rgba(0, 0, 0, 0.7)'
                        });

                        const url = "{{route('upload')}}"
                        axios.post(url, {
                            image: this.croppieImage
                        }).then((response) => {
                            this.form[this.key] = response.data
                            this.image.src = this.croppieImage
                        }).catch(response => {
                            this.$notify({
                                title: 'Thông báo',
                                message: 'Có lỗi xảy ra, xin vui lòng thử lại',
                                type: 'error'
                            });
                        })
                            .finally(() => {
                                this.dialogVisible = false
                                loading.close();
                            });
                    });
                },
                fetchData() {
                    const url = "{{route('get-phu-dau')}}";
                    axios.get(url, this.form)
                        .then((response) => {
                            this.form = response.data
                        }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })
                        .finally(() => {
                            this.loading = false
                        });
                },
                changeImage(id) {
                    this.dialogVisible = true
                    this.$nextTick(() => {
                        const files = event.target.files || event.dataTransfer.files;
                        if (!files.length) return;

                        const reader = new FileReader();
                        reader.onload = e => {
                            this.$refs.croppieRef.bind({
                                url: e.target.result
                            });
                        };
                        reader.readAsDataURL(files[0]);
                        event.target.value = '';
                    })

                    this.image = document.getElementById(id)
                    this.key = id
                },
                save() {
                    this.loading = true
                    const url = "{{route('post-phu-dau')}}";

                    axios.post(url, this.form)
                        .then((response) => {
                            this.$notify({
                                title: 'Thông báo',
                                message: 'Lưu thông tin thành công',
                                type: 'success'
                            });

                        }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })
                        .finally(() => {
                            this.loading = false
                        });
                }
            }
        })
    </script>
@endsection
