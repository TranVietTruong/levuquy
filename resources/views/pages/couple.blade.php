@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/croppie/croppie.css">
    <link rel="stylesheet" href="{{ asset('base/css/pages/couple.css') }}">
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
                        Thông tin Cô Dâu & Chú Rể
                    </div>
                    <div class="next">
                        <a href="{{route('event')}}">Tiếp theo
                        <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <el-row :gutter="20">
                        <el-col :span="12" :md="12" :sm="24" :xs="24">
                            <div class="form-info chu_re mb-3">
                                <div class="text-center">
                                    Thông tin Chú Rể
                                </div>
                                <div class="preview-img mt-3">
                                    <img id="anh_chu_re" :src="form.anh_chu_re" alt="">
                                    <div class="upload">
                                        <label for="input_anh_chu_re">
                                            Thay đổi hình ảnh
                                            <input @change="changeImage('anh_chu_re')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_chu_re">
                                        </label>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên đầy đủ chú rể</label>
                                        <el-input v-model="form.ten_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Tên ngắn gọn chú rể</label>
                                        <el-input v-model="form.ten_chu_re_ngan_gon" ></el-input>
                                    </div>
{{--                                    <div class="mt-3">--}}
{{--                                        <label for="">Ngày sinh</label>--}}
{{--                                        <el-input v-model="form.ngay_sinh_chu_re" ></el-input>--}}
{{--                                    </div>--}}
                                    <div class="mt-3">
                                        <label for="">Giới thiệu</label>
                                        <el-input type="textarea" :rows="3" v-model="form.gioi_thieu_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-5">
                                        <label for="">Họ tên bố</label>
                                        <el-input v-model="form.ho_ten_bo_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Họ tên mẹ</label>
                                        <el-input v-model="form.ho_ten_me_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-5">
                                        <label for="">Tên ngân hàng</label>
                                        <el-input v-model="form.ten_ngan_hang_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Số tài khoản</label>
                                        <el-input v-model="form.stk_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Tên chủ tài khoản</label>
                                        <el-input v-model="form.ten_chu_tai_khoan_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Chi nhánh</label>
                                        <el-input v-model="form.chi_nhanh_chu_re" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label>Hình ảnh QR</label>
                                        <div class="qr">
                                            <div style="width: 50%; margin: auto">
                                                <img id="anh_qr_chu_re" :src="form.anh_qr_chu_re" alt="">
                                            </div>
                                            <label for="input_anh_qr_chu_re">Thay đổi</label>
                                            <input @change="changeImage('anh_qr_chu_re')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_qr_chu_re">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </el-col>
                        <el-col :span="12" :md="12" :sm="24" :xs="24">
                            <div class="form-info chu_re">
                                <div class="text-center">
                                    Thông tin Cô Dâu
                                </div>
                                <div class="preview-img mt-3">
                                    <img id="anh_co_dau" :src="form.anh_co_dau" alt="">
                                    <div class="upload">
                                        <label for="input_anh_co_dau">
                                            Thay đổi hình ảnh
                                            <input @change="changeImage('anh_co_dau')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_co_dau">
                                        </label>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên đầy đủ cô dâu</label>
                                        <el-input v-model="form.ten_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Tên ngắn gọn cô dâu</label>
                                        <el-input v-model="form.ten_co_dau_ngan_gon" ></el-input>
                                    </div>
{{--                                    <div class="mt-3">--}}
{{--                                        <label for="">Ngày sinh</label>--}}
{{--                                        <el-input v-model="form.ngay_sinh_co_dau" ></el-input>--}}
{{--                                    </div>--}}
                                    <div class="mt-3">
                                        <label for="">Giới thiệu</label>
                                        <el-input type="textarea" :rows="3" v-model="form.gioi_thieu_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-5">
                                        <label for="">Họ tên bố</label>
                                        <el-input v-model="form.ho_ten_bo_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Họ tên mẹ</label>
                                        <el-input v-model="form.ho_ten_me_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-5">
                                        <label for="">Tên ngân hàng</label>
                                        <el-input v-model="form.ten_ngan_hang_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Số tài khoản</label>
                                        <el-input v-model="form.stk_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Tên chủ tài khoản</label>
                                        <el-input v-model="form.ten_chu_tai_khoan_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Chi nhánh</label>
                                        <el-input v-model="form.chi_nhanh_co_dau" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label>Hình ảnh QR</label>
                                        <div class="qr">
                                            <div style="width: 50%; margin: auto">
                                                <img id="anh_qr_co_dau" :src="form.anh_qr_co_dau" alt="">
                                            </div>
                                            <label for="input_anh_qr_co_dau">Thay đổi</label>
                                            <input @change="changeImage('anh_qr_co_dau')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_qr_co_dau">
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
                        size: { width: 1000, height: 1000 },
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
                    const url = "{{route('get-couple-information')}}";
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
                    const url = "{{route('post-couple-information')}}";

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
