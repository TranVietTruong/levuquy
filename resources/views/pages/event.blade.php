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
                        Sự kiện cưới
                    </div>
                    <div class="next">
                        <a href="{{route('album')}}">Tiếp theo
                            <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <el-row :gutter="20">
                        <el-col :span="12" :md="12" :sm="24" :xs="24">
                            <div class="form-info chu_re mb-3">
                                <div class="text-center">
                                    Lễ cưới nhà Nam
                                </div>
                                <div class="preview">
                                    <div class="preview-img mt-3">
                                        <img id="anh_su_kien_nam" :src="form.anh_su_kien_nam" alt="">
                                        <div class="upload">
                                            <label for="input_anh_su_kien_nam">
                                                Thay đổi hình ảnh
                                                <input @change="changeImage('anh_su_kien_nam')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_su_kien_nam">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên sự kiện</label>
                                        <el-input v-model="form.ten_su_kien_nam" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Thời gian</label>
                                        <div>
                                            <el-date-picker
                                                style="width: 100%"
                                                v-model="form.thoi_gian_su_kien_nam"
                                                type="datetime"
                                                format="HH:mm:ss dd/MM/yyyy"
                                                value-format="yyyy-MM-dd HH:mm:ss"
                                                placeholder="Chọn thời gian tổ chức sự kiện">
                                            </el-date-picker>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Địa chỉ</label>
                                        <el-input v-model="form.dia_chi_nam" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Đường dẫn liên kết bản đồ</label>
                                        <el-input v-model="form.map_nam" ></el-input>
                                    </div>
                                    <div class="mt-3" style="font-size: 13px; font-weight: normal;">
                                        <div class="mb-2">
                                            <a style="color: #1EAEDB" target="_blank" href="https://www.youtube.com/watch?v=nKMdkNNIhcU">Click để xem hướng dẫn lấy liên kết bản đồ trên điện thoại !</a>
                                        </div>
                                        <div>
                                            <a style="color: #1EAEDB" target="_blank" href="https://www.youtube.com/watch?v=hbKYmhXjOCI">Click để xem hướng dẫn lấy liên kết bản đồ trên máy tính !</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </el-col>
                        <el-col :span="12" :md="12" :sm="24" :xs="24">
                            <div class="form-info chu_re">
                                <div class="text-center">
                                    Lễ cưới nhà nữ
                                </div>
                                <div class="preview">
                                    <div class="preview-img mt-3">
                                        <img id="anh_su_kien_nu" :src="form.anh_su_kien_nu" alt="">
                                        <div class="upload">
                                            <label for="input_anh_su_kien_nu">
                                                Thay đổi hình ảnh
                                                <input @change="changeImage('anh_su_kien_nu')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_su_kien_nu">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên sự kiện</label>
                                        <el-input v-model="form.ten_su_kien_nu" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Thời gian</label>
                                        <div>
                                            <el-date-picker
                                                style="width: 100%"
                                                v-model="form.thoi_gian_su_kien_nu"
                                                type="datetime"
                                                format="HH:mm:ss dd/MM/yyyy"
                                                value-format="yyyy-MM-dd HH:mm:ss"
                                                placeholder="Chọn thời gian tổ chức sự kiện">
                                            </el-date-picker>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Địa chỉ</label>
                                        <el-input v-model="form.dia_chi_nu" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Đường dẫn liên kết bản đồ</label>
                                        <el-input v-model="form.map_nu" ></el-input>
                                    </div>
                                    <div class="mt-3" style="font-size: 13px; font-weight: normal;">
                                        <div class="mb-2">
                                            <a style="color: #1EAEDB" target="_blank" href="https://www.youtube.com/watch?v=nKMdkNNIhcU">Click để xem hướng dẫn lấy liên kết bản đồ trên điện thoại !</a>
                                        </div>
                                        <div>
                                            <a style="color: #1EAEDB" target="_blank" href="https://www.youtube.com/watch?v=hbKYmhXjOCI">Click để xem hướng dẫn lấy liên kết bản đồ trên máy tính !</a>
                                        </div>
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
                    const url = "{{route('get-event')}}";
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
                    const url = "{{route('post-event')}}";

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
