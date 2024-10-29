@extends('layout.master')

@section('style')
    <style>
        .form-login {
            display: flex;
            justify-content: center;
        }
        .register {
            color: #229922;
            cursor: pointer;
        }
        .text-error {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div id="app">
        <div class="form-login">
            <div style="width: 400px">
                <div class="mb-3">
                    <label for="phone">Nhập số điện thoại</label>
                    <el-input
                        id="phone"
                        v-model="form.phone"
                        placeholder="Nhập số điện thoại"
                    >
                    </el-input>
                </div>
                <div class="mb-3">
                    <label for="password">Mật khẩu</label>
                    <el-input
                        id="password"
                        v-model="form.password"
                        type="password"
                        placeholder="Nhập mật khẩu"
                    ></el-input>
                </div>
                <div v-if="error" class="text-danger mb-3" style="font-size: 16px;">
                    <i class="bi bi-exclamation-diamond-fill"></i> <span>@{{ error }}</span>
                </div>
                <div class="mb-3 text-center">
                    <el-button @click="login" type="primary"> Đăng nhập </el-button>
                </div>
                <div class="text-center" style="font-size: 16px;">
                    Bạn chưa có tài khoản? <a href="https://www.facebook.com/thiepcuoicuatui">
                        <span class="register">Đăng ký</span>
                    </a>
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
                form: {
                    phone: '',
                    password: ''
                },
                error: ""
            },
            methods: {
                login() {
                    const url = '{{route('postLogin')}}'
                    axios.post(url, this.form)
                    .then((response) => {
                        window.location.href = '/cms'
                    })
                    .catch((response) => {
                        this.error = response.meta.message
                    });
                }
            }
        })
    </script>
@endsection
