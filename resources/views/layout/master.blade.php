<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nền tảng tạo Website đám cưới & Thiệp cưới online</title>
    <link rel="icon" href="https://i.imgur.com/EedZsKg.png" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('base/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('base/css/element.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    @yield('style')
</head>
<body>
@if (\Illuminate\Support\Facades\Auth::check())
    <div class="container user">
        <div>{{\Illuminate\Support\Facades\Auth::user()->phone}} - <a href="{{route('logout')}}">Đăng xuất</a></div>
    </div>
@endif
<div class="logo">
    <div>
        <a href="/">
            <img src="https://i.imgur.com/lLIaYHI.png" alt="">
        </a>
    </div>
</div>
@yield('content')
{{--<div class="footer">--}}
{{--    <div>--}}
{{--        <span>Copyright © 2024 | levuquy - Vì cuộc sống hạnh phúc!</span>--}}
{{--    </div>--}}
{{--    <div class="lien-he">--}}
{{--        <span class="mr-2"><a href="">Trang chủ</a></span>--}}
{{--        <span class="mr-2"><a href="">Giới thiệu</a></span>--}}
{{--        <span class="mr-2"><a href="">Chính sách bảo mật</a></span>--}}
{{--        <span class="mr-2"><a href="">Điều khoản sử dụng</a></span>--}}
{{--        <span class="mr-2"><a href="">Liên hệ</a></span>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<script src="https://code.jquery.com/jquery-3.7.1.js"></script>--}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js"></script>
<script>
    axios.interceptors.response.use(function (response) {
        return response.data || { data: [], meta: {} }
    }, function (error) {
        if (error.response.status === 403) {
            localStorage.clear()
            location.reload()
        } else {
            return Promise.reject(error.response.data || {})
        }
    })
</script>
<script type="text/javascript" src="{{ asset('base/js/vue.js') }}"></script>
<script src="{{ asset('base/js/element.js') }}"></script>
<script src="{{ asset('base/js/element-en.js') }}"></script>
@yield('script')
</body>
</html>
