@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/croppie/croppie.css">
    <link rel="stylesheet" href="{{ asset('base/css/pages/couple.css') }}">
    <style>
        .action {
            background-color: #d7d7d7;
        }
        .action:hover {
            background-color: #d7d7d7;
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
                        <el-col
                            v-for="(item, index) in form"
                            :key="index"
                            :span="8"
                            :md="8"
                            :sm="24"
                            :xs="24"
                        >
                            <div class="form-info chu_re mb-3">
                                <div class="preview-img mt-3">
                                    <img :id="'anh'+index" :src="item.anh" alt="">
                                    <div class="upload">
                                        <label :for="'input_anh'+index">
                                            Thay đổi
                                            <input @change="changeImage('anh'+index, index)" accept="image/png, image/jpeg, image/jpg" type="file" :id="'input_anh'+index">
                                        </label>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="mt-5">
                                        <label for="">Tên sự kiện</label>
                                        <el-input v-model="item.ten_su_kien" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Thời gian</label>
                                        <el-input v-model="item.thoi_gian" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Địa chỉ</label>
                                        <el-input v-model="item.dia_chi" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Link google map</label>
                                        <el-input v-model="item.map" ></el-input>
                                    </div>
                                    <div class="mt-3">
                                        <label for="">Thứ tự</label>
                                        <div>
                                            <el-input-number
                                                @change="order"
                                                v-model="item.order"
                                                :min="1"
                                                :max="100"
                                                style="width: 100%"
                                            >

                                            </el-input-number>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-3" style="font-size: 13px; font-weight: normal;">
                                        <div class="mb-2">
                                            <a style="color: #1EAEDB" target="_blank" href="https://www.youtube.com/watch?v=nKMdkNNIhcU">Click để xem hướng dẫn lấy liên kết bản đồ trên điện thoại !</a>
                                        </div>
                                        <div>
                                            <a style="color: #1EAEDB" target="_blank" href="https://www.youtube.com/watch?v=hbKYmhXjOCI">Click để xem hướng dẫn lấy liên kết bản đồ trên máy tính !</a>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <el-button @click="deleteItem(index)" icon="el-icon-delete" size="small" type="warning"> Xóa </el-button>
                                    </div>
                                </div>
                            </div>
                        </el-col>
                    </el-row>
                    <div class="text-center action">
                        <el-button class="mb-2" @click="addLoveStory" icon="el-icon-plus" type="success"> THÊM SỰ KIỆN </el-button>
                        <el-button @click="save" type="danger"> LƯU THÔNG TIN</el-button>
                    </div>
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
                form: [],
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
                deleteItem(index) {
                    this.form.splice(index, 1)
                },
                order() {
                    this.$nextTick(() => {
                        this.form.sort((a, b) => a.order - b.order);
                    })
                },
                addLoveStory() {
                    this.form.push({
                        anh: 'https://i.imgur.com/4de2gue.jpg',
                        ten_su_kien: '',
                        thoi_gian: '',
                        dia_chi: '',
                        map: '',
                        order: (this.form[this.form.length - 1]['order'] ?? 0) + 1
                    })
                },
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
                            this.form[this.key]['anh'] = response.data
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
                changeImage(id, index) {
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
                    this.key = index
                },
                save() {
                    this.loading = true
                    const url = "{{route('post-event')}}";

                    axios.post(url, {items: this.form})
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
