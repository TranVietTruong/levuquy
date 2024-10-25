@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('base/css/pages/couple.css') }}">
    <style>
        .preview {
            width: 300px;
            margin: 0 auto;
        }
        .img-preview {
            width: 100%;
            height: 200px;
        }
        .img-preview img {
            object-fit: cover;
            border-radius: 5px;
        }
        .el-checkbox__inner {
            width: 25px; /* Custom width */
            height: 25px; /* Custom height */
            border-radius: 4px; /* Customize the border radius */
            border-color: #409eff;
        }

        .el-checkbox__inner::after {
            height: 14px; /* Customize the checkmark size */
            width: 8px;   /* Customize the checkmark size */
        }

         .el-checkbox__input.is-checked .el-checkbox__inner {
            background-color: #409eff; /* Change background when checked */
            border-color: #409eff;
        }
        .el-checkbox__inner::after {
            left: 6px;
        }

        @media (max-width: 576px) {
            .img-preview {
                height: 150px;
            }
        }
    </style>
@endsection

@section('content')
    <div id="app">
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
                        Album ảnh cưới
                    </div>
                    <div class="next">
                        <a href="{{route('love-story')}}">Tiếp theo
                            <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <div>
                        <input @change="changeFile" ref="upload" type="file" accept="image/png, image/jpeg, image/jpg">
                        <el-button class="mb-2" @click="upload" type="success" icon="el-icon-plus"> Thêm hình </el-button>
                        <el-button @click="deleteAll" class="mr-2" type="danger" icon="el-icon-delete"> Xóa ảnh đã chọn </el-button>
                        <el-checkbox @change="checkAllItem" size="medium" v-model="checkAll"> Chọn tất cả </el-checkbox>

                        <div v-if="loading" class="mt-2">
                            <el-progress :text-inside="true" :stroke-width="20" :percentage="percent" status="success"></el-progress>
                        </div>
                    </div>
                    <el-row :gutter="20">
                        <el-col
                            v-for="(item,index) in form"
                            :key="index"
                            :span="6"
                            :md="6"
                            :sm="12"
                            :xs="12"
                        >
                            <el-card class="mt-2">
                                <div class="img-preview">
                                    <img :src="item.small" alt="">
                                </div>
                                <div class="mt-1">
                                    <el-input @change="update(item)" class="mb-1" v-model="item.title" placeholder="Tiêu đề"></el-input>
                                    <el-input-number @change="order(item)" size="mini" style="width: 100%" v-model="item.order" :min="1" :max="100" placeholder="STT"></el-input-number>
                                </div>
                                <div class="mt-2 d-flex align-center justify-center">
                                    <el-button @click="deleteItem(item, index)" class="mr-2" size="small" type="danger" icon="el-icon-delete"></el-button>
                                    <el-checkbox size="medium" v-model="item.check"></el-checkbox>
                                </div>
                            </el-card>
                        </el-col>
                    </el-row>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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
                key: null,
                percent: 0,

                checkAll: false
            },
            created() {
                this.fetchData()
            },
            mounted() {

            },
            methods: {
                deleteAll() {
                  const ids = this.form.filter(item => item.check).map(item => item.id)
                    const url = "{{route('delete-album')}}"
                    axios.post(url, {'ids': ids})
                        .then((response) => {

                        }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })
                    .finally(() => {
                        this.fetchData()
                    });
                },
                checkAllItem() {
                    if (this.checkAll === true) {
                        this.form.forEach(item => {
                            item.check = true
                        })
                    } else {
                        this.form.forEach(item => {
                            item.check = false
                        })
                    }
                },
                deleteItem(item, index) {
                    this.form.splice(index, 1)
                    const url = "{{route('delete-album')}}"
                    axios.post(url, {'ids': [item.id]})
                    .then((response) => {

                    }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })
                    .finally(() => {

                    });
                },
                order(item) {
                    const url = "{{route('update-album')}}"
                    axios.post(url, item)
                        .then((response) => {
                            this.form.sort((a, b) => a.order - b.order);
                        }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })
                        .finally(() => {

                        });
                },
                update(item) {
                    const url = "{{route('update-album')}}"
                    axios.post(url, item)
                    .then((response) => {

                    }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })
                    .finally(() => {

                    });
                },
                changeFile() {
                    this.$nextTick(() => {
                        const files = event.target.files || event.dataTransfer.files;
                        if (!files.length) {
                            return;
                        }

                        const loading = this.$loading({
                            lock: true,
                            text: 'Đang tải hình ảnh',
                            spinner: 'el-icon-loading',
                            background: 'rgba(0, 0, 0, 0.7)'
                        });

                        const formData = new FormData()
                        formData.append('image', files[0])
                        const url = "{{route('post-album')}}"
                        this.loading = true
                        axios.post(url, formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                            },
                            onUploadProgress: (progressEvent) => {
                                const percentCompleted = this.percent = Math.round((progressEvent.loaded * 100) / progressEvent.total)
                            },
                        })
                        .then((response) => {
                            this.fetchData()
                        }).catch(response => {
                            this.$notify({
                                title: 'Thông báo',
                                message: response.meta.message,
                                type: 'error'
                            });
                        })
                        .finally(() => {
                            this.loading = false
                            loading.close();
                        });
                        event.target.value = '';
                    })
                },
                upload() {
                  this.$refs.upload.click()
                },
                fetchData() {
                    const url = "{{route('get-album')}}";
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
