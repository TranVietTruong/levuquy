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
            height: 300px;
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
                height: 250px;
            }
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 99;
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
            background-color: white;
        }
        .modal-fullscreen {
            position: relative;
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0;
        }
        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            outline: 0;
            height: 100%;
        }
        .modal-header {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: space-between;
            background-color: black;
            padding: 10px;
        }
        .name,.close {
            color: white;
            z-index: 9999;
        }
        #iframe-container {
            position: relative;
            padding: 0;
            overflow: hidden;
            -webkit-overflow-scrolling: touch;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <div id="app">
        <div id="modal" class="modal">
            <div class="modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="name">
                            <h4>@{{ template.name }}</h4>
                        </div>
                        <div @click="closePreview" class="close cursor-pointer mr-3">
                            <i class="bi bi-x-circle-fill"></i>
                        </div>
                    </div>
                    <div id="iframe-container">
                        <iframe id="iframe-preview" class="border-0 shadow-strong" width="100%" height="100%" :src="template.link_preview"></iframe>
                    </div>
                </div>
            </div>
        </div>

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
                        Chọn mẫu website
                    </div>
                    <div class="next">
                        <a href="{{route('website-information')}}">Tiếp theo
                            <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <el-row :gutter="20">
                        <el-col
                            v-for="(item,index) in form"
                            :key="index"
                            :span="8"
                            :md="8"
                            :sm="24"
                            :xs="24"
                        >
                            <el-card class="mt-2">
                                <div class="img-preview">
                                    <img :src="item.avatar" alt="">
                                </div>
                                <div class="text-center mt-2 mb-3">
                                    @{{item.name}}
                                </div>
                                <div class="mt-2 d-flex align-center justify-center">
                                    <el-button v-if="templateUser === item.id" class="mr-2" size="small" icon="el-icon-check" type="success"> Đã Chọn </el-button>
                                    <el-button v-else @click="selectTemplate(item)" class="mr-2" size="small" type="info"> Chọn </el-button>
                                    <el-button  @click="preview(item)" class="mr-2" size="small" type="primary" icon="el-icon-view"> Xem trước </el-button>
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
                templateUser: 1,
                template: {}
            },
            created() {
                this.fetchData()
            },
            mounted() {

            },
            methods: {
                closePreview() {
                    this.template = {}
                    document.getElementById('modal').style.display = 'none'
                },
                preview(template) {
                    this.template = template
                    document.getElementById('modal').style.display = 'block'
                },
                selectTemplate(item) {
                    const url = "{{route('post-template')}}";
                    axios.post(url, {'template_id': item.id})
                        .then((response) => {
                            this.$notify({
                                title: 'Thông báo',
                                message: 'Chọn mẫu thành công',
                                type: 'success'
                            });
                            this.templateUser = item.id
                        }).catch(response => {
                        this.$notify({
                            title: 'Thông báo',
                            message: response.meta.message,
                            type: 'error'
                        });
                    })

                },
                fetchData() {
                    const url = "{{route('get-template')}}";
                    axios.get(url, this.form)
                        .then((response) => {
                            this.form = response.data.templates
                            this.templateUser = response.data.template_user
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
