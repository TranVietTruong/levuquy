@extends('layout.master')

@section('style')
    <style>
        .title {
            text-align: center;
            background: #d7d7d7;
            padding: 20px 20px;
            border-radius: 10px;
            color: #506690;
            font-size: 25px;
        }

        .item {
            padding: 10px;
            display: flex;
            border-radius: 5px;
            background-color: #d7d7d7;
            cursor: pointer;
        }
        .item:hover {
            background-color: #e2e2e2;
            color: #ba4d4d;
        }

        i {
            color: #506690;
        }
    </style>
@endsection

@section('content')
    <div id="app">
        <div class="container">
            <div class="title mb-5">
                <span>Chỉnh sửa thông tin website</span>
            </div>
            <el-row :gutter="20">
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('template')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-clipboard2-check-fill"></i>
                            </div>
                            <div class="name">
                                Chọn mẫu website
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('website-information')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-house-door-fill"></i>
                            </div>
                            <div class="name">
                                Thông tin chung
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('couple-information')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="name">
                                Thông tin Cô Dâu & Chú Rể
                            </div>
                        </div>
                        </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('event')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            <div class="name">
                                Sự kiện cưới
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('album')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-images"></i>
                            </div>
                            <div class="name">
                                Album ảnh cưới
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('love-story')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                            <div class="name">
                                Câu chuyện tình yêu
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('phu-dau')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-person-heart"></i>
                            </div>
                            <div class="name">
                                Phù dâu, phù rể
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('loi-cam-ta')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-chat-left"></i>
                            </div>
                            <div class="name">
                                Lời cảm tạ
                            </div>
                        </div>
                    </a>
                </el-col>
                <el-col :span="8" :md="8" :sm="24" :xs="24" class="mb-3">
                    <a href="{{route('tuy-chinh-giao-dien')}}">
                        <div class="item">
                            <div class="icon mr-2">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <div class="name">
                                Chỉnh sửa giao diện
                            </div>
                        </div>
                    </a>
                </el-col>

            </el-row>
        </div>
    </div>
@endsection

@section('script')
    <script>
        ELEMENT.locale(ELEMENT.lang.en)
        new Vue({
            el: '#app',
            data: {
                phone: "",
                password: ""
            }
        })
    </script>
@endsection
