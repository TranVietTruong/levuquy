@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/croppie/croppie.css">
    <link rel="stylesheet" href="{{ asset('base/css/pages/couple.css') }}">
    <style>
        .box-content {
            font-size: 14px;
            font-weight: normal;
        }
        .preview img{
            height: 200px;
            object-fit: contain;
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
            :destroy-on-close="true"
        >
            <vue-croppie
                ref="croppieRef"
                :boundary="boundary"
                :viewPort="viewPort"
            >
            </vue-croppie>
            <span slot="footer" class="dialog-footer">
                <el-button @click="close">Hủy</el-button>
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
                        Tùy chỉnh giao diện
                    </div>
                    <div class="next">
{{--                        <a href="">Tiếp theo--}}
{{--                            <i class="el-icon-right"></i>--}}
{{--                        </a>--}}
                    </div>
                </div>
                <div class="box-content">
                    <el-row :gutter="20">
                        <el-col :span="24" :md="24" :sm="24" :xs="24">
                            <div class="form-info chu_re mb-3">
                                <h4>- KHỐI MENU </h4>
                                <el-row :gutter="20">
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề HOME</label>
                                            <el-input v-model="form.menu_home" ></el-input>
                                        </div>
                                    </el-col>
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề CẶP ĐÔI</label>
                                            <el-input v-model="form.menu_cap_doi" ></el-input>
                                        </div>
                                    </el-col>
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề CÂU CHUYỆN TÌNH YÊU</label>
                                            <el-input v-model="form.menu_cau_chuyen_tinh_yeu" ></el-input>
                                        </div>
                                    </el-col>
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề PHÙ DÂU & PHÙ RỂ</label>
                                            <el-input v-model="form.menu_phu_dau_phu_re" ></el-input>
                                        </div>
                                    </el-col>
                                </el-row>
                                <el-row :gutter="20">
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề ALBUM HÌNH CƯỚI</label>
                                            <el-input v-model="form.menu_album_hinh_cuoi" ></el-input>
                                        </div>
                                    </el-col>
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề SỰ KIỆN CƯỚI</label>
                                            <el-input v-model="form.menu_su_kien_cuoi" ></el-input>
                                        </div>
                                    </el-col>
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề VIDEO CƯỚI</label>
                                            <el-input v-model="form.menu_video_cuoi" ></el-input>
                                        </div>
                                    </el-col>
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề LỜI CẢM TẠ</label>
                                            <el-input v-model="form.menu_loi_cam_ta" ></el-input>
                                        </div>
                                    </el-col>
                                </el-row>
                                <el-row :gutter="20">
                                    <el-col :span="6" :md="6" :sm="24" :xs="24">
                                        <div class="mt-3">
                                            <label for="">[KHỐI MENU] Tiêu đề MỪNG CƯỚI</label>
                                            <el-input v-model="form.menu_mung_cuoi" ></el-input>
                                        </div>
                                    </el-col>
                                </el-row>
                                @if ($website && $website->template_id === 4)
                                    @include('components.template4')
                                @elseif ($website && $website->template_id === 9)
                                    @include('components.template9')
                                @elseif ($website && $website->template_id === 16)
                                    @include('components.template16')
                                @elseif ($website && $website->template_id === 17)
                                    @include('components.template17')
                                @elseif ($website && $website->template_id === 20)
                                    @include('components.template20')
                                @elseif ($website && $website->template_id === 23)
                                    @include('components.template23')
                                @elseif ($website && $website->template_id === 18)
                                    @include('components.template23')
                                @elseif ($website && $website->template_id === 25)
                                    @include('components.template25')
                                @else
                                    @include('components.template1')
                                @endif
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
                form: {

                },
                loading: false,
                dialogVisible: false,

                croppieImage: '',
                image: null,
                key: null,
                size: { width: 1920, height: 1080 },
                boundary: { width: 338, height: 190},
                viewPort: { width: 330, height: 185 },

            },
            created() {
                this.fetchData()
            },
            mounted() {
            },
            methods: {
                close() {
                    this.dialogVisible = false
                },
                crop() {
                    let options = {
                        type: 'base64',
                        size: this.size,
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
                    const url = "{{route('get-setup')}}";
                    axios.get(url, this.form)
                        .then((response) => {
                            if (response.data) {
                                this.form = response.data
                            }
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
                changeImage(id, type = 'bg') {
                    if (type === 'popup') {
                        this.size = { width: 500, height: 500 }
                        this.boundary = { width: 338, height: 338}
                        this.viewPort = { width: 330, height: 330 }
                    } else if(type === '25')  {
                        this.size = { width: 1280, height: 1920 }
                        this.boundary = { width: 190, height: 338}
                        this.viewPort = { width: 185, height: 330 }
                    } else if(type === '23')  {
                        this.size = { width: 1000, height: 1000 }
                        this.boundary = { width: 338, height: 338}
                        this.viewPort = { width: 330, height: 330 }
                    }
                    else  {
                        this.size = { width: 1920, height: 1080 }
                        this.boundary = { width: 338, height: 190}
                        this.viewPort = { width: 330, height: 185 }
                    }

                    this.$nextTick(() => {
                        this.dialogVisible = true
                    })

                    this.$nextTick(() => {
                        if (this.$refs.croppieRef) {
                            this.$refs.croppieRef.refresh()
                        }
                    })

                    this.$nextTick(() => {

                        const files = event.target.files || event.dataTransfer.files;
                        if (!files.length) return;

                        const reader = new FileReader();
                        reader.onload = e => {
                            this.$refs.croppieRef.bind({
                                url: e.target.result,
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
                    const url = "{{route('post-setup')}}";
                    axios.post(url, {'data': this.form})
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
