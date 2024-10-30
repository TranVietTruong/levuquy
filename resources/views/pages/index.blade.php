<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nền tảng tạo Website đám cưới & Thiệp cưới online</title>
    <link rel="icon" href="https://i.imgur.com/EedZsKg.png" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('base/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('base/css/skeleton.css') }}">
    <link rel="stylesheet" href="{{ asset('base/css/style.css') }}">
    <style>
        .img-preview {
            width: 100%;
            height: 300px;
        }
        .img-preview img {
            object-fit: cover;
            border-radius: 5px;
        }
        .preview {
            background: white;
            border-radius: 5px;
            box-shadow: 2px 2px 9px;
        }
        .check {
            width: 500px;
        }
        @media (max-width: 576px) {
            .check {
                font-size: 13px;
                width: 100vw;
            }
        }

    </style>
</head>
<body>
<div style="min-height: 100vh">
    <div class="logo">
        <div>
            <a href="/">
                <img src="https://i.imgur.com/lLIaYHI.png" alt="">
            </a>
        </div>
    </div>
    <div class="content" style="padding: 20px;">
        <h1 style="color: #f23783;">Nền tảng tạo Website đám cưới & Thiệp cưới online</h1>
        <p style="font-size: 18px; color: #f23783;">Cho đám cưới trở nên độc đáo hơn theo cách riêng của bạn!</p>
        <a href="{{ route('login') }}">
            <button class="button-primary">Tạo website</button>
        </a>
        <a href="#templates">
            <button class="button-primary">Xem các mẫu thiệp</button>
        </a>
        <div class="mt-3 check" style="margin: 0 auto; font-size: 16px; font-weight: normal">
            <ul class="">
                <li class="d-flex align-center">
                    <img style="width: 35px;" src="{{asset('base/icon/check.png')}}" alt="">
                    Sở hữu website vĩnh viễn
                </li>
                <li class="d-flex align-center">
                    <img style="width: 35px;" src="{{asset('base/icon/check.png')}}" alt="">
                    Không tốn chi phí duy trì hàng tháng
                </li>
                <li class="d-flex align-center">
                    <img style="width: 35px;" src="{{asset('base/icon/check.png')}}" alt="">
                    Được sử dụng, thay đổi tất các các mẫu theo sở thích
                </li>

                <li class="d-flex align-center">
                    <img style="width: 35px;" src="{{asset('base/icon/check.png')}}" alt="">
                    Chỉnh sửa tên miền theo cá nhân
                </li>
                <li class="d-flex align-center">
                    <img style="width: 35px;" src="{{asset('base/icon/check.png')}}" alt="">
                    Hỗ trợ chỉnh sửa 24/24
                </li>
                <li class="d-flex  align-center">
                    <img style="width: 35px;" src="{{asset('base/icon/check.png')}}" alt="">
                    Tạo tài khoản chỉ với 200.000đ
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="template mt-5" id="templates">
    <h1 class="text-center mau_thiep">Mẫu Thiệp</h1>
    <div class="container">
        <div class="row list-template mt-3">
            @foreach($templates as $template)
            <div class="four columns mt-5">
                <div class="preview">
                    <div class="img-preview">
                        <img src="{{$template->avatar}}" alt="">
                    </div>
                    <div class="text-center mt-2 mb-3">
                        {{$template->name}}
                    </div>
                    <div class="mt-2 d-flex align-center justify-center">
                        <a href="{{$template->link_preview}}" target="_blank">
                            <button class="button-primary">Xem Trước</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="footer mt-5">
    <div>
        <span>Copyright © 2024 | levuquy - Vì cuộc sống hạnh phúc!</span>
    </div>
</div>
</body>
</html>
