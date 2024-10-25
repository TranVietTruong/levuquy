@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('base/css/pages/couple.css') }}">
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
                        Lời cảm tạ
                    </div>
                    <div class="next">
                        <a href="{{route('tuy-chinh-giao-dien')}}">Tiếp theo
                            <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <div>
                        <el-input :rows="4" v-model="form.content" type="textarea"></el-input>
                    </div>
                    <button @click="save" class="action">
                        Lưu thông tin
                    </button>
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
                form: {},
                loading: false,
            },
            created() {
                this.fetchData()
            },
            mounted() {

            },
            methods: {
                fetchData() {
                    const url = "{{route('get-loi-cam-ta')}}";
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
                    const url = "{{route('post-loi-cam-ta')}}";

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
