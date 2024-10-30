@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="https://unpkg.com/croppie/croppie.css">
    <link rel="stylesheet" href="{{ asset('base/css/pages/website.css') }}">
    <style>
        .label {
            font-weight: normal;
        }
        .link .el-input__inner {
            padding: 0 !important;
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
                        Thông tin website
                    </div>
                    <div class="next">
                        <a href="{{route('couple-information')}}">Tiếp theo
                            <i class="el-icon-right"></i>
                        </a>
                    </div>
                </div>
                <div class="box-content">
                    <div>
                        <div class="text-center label">Ảnh đại diện cho website</div>
                        <div class="preview">
                            <div class="preview-img mt-3">
                                <img id="anh_website" :src="form.anh_website" alt="">
                                <div class="upload">
                                    <label for="input_anh_website">
                                        Thay đổi hình ảnh
                                        <input @change="changeImage('anh_website')" type="file" id="input_anh_website">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <small style="font-size: 14px;" class="label">Ảnh đại diện cho website là hình ảnh sẽ được hiển thị khi chia sẻ liên kết trên các nền tảng MXH</small>
                        </div>
                        <div class="info">
                            <div class="mt-5">
                                <label for="">Điền link website</label>
                                <div class="d-flex align-center">
                                    <div style="font-weight: normal; font-size: 14px;">
                                        https://
                                    </div>
                                    <div class="link" style="min-width: 150px;">
                                        <el-input style="padding: 0" v-model="form.link_website" ></el-input>
                                    </div>
                                    <div style="font-weight: normal; font-size: 14px;">
                                        .levuquy.info.vn
                                    </div>
                                </div>
                                <div class="d-flex mt-2 mb-4">
                                    <div class="ml-2">
                                        <el-button size="mini" @click="copyLink" type="info">
                                            <i class="el-icon-copy-document"></i>
                                            Copy link
                                        </el-button>
                                    </div>
                                    <div class="ml-2">
                                        <a :href="'https://'+form.link_website+'.levuquy.info.vn'" target="_blank">
                                            <el-button size="mini" type="success">
                                                <i class="el-icon-view"></i>
                                                Xem website
                                            </el-button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="">Tên website</label>
                                <el-input v-model="form.ten_website" ></el-input>
                            </div>
                            <div class="mt-3">
                                <label for="">Mô tả website</label>
                                <el-input v-model="form.mo_ta_website" ></el-input>
                            </div>
                            <div class="mt-3">
                                <label for="">Nhạc nền website</label>
                                <div class="music">
                                   <div class="mr-3">
                                       <el-select @change="changeMusic" v-model="form.nhac_website" placeholder="Chọn nhạc nền">
                                           <el-option
                                               v-for="item in options"
                                               :key="item.value"
                                               :label="item.label"
                                               :value="item.value">
                                           </el-option>
                                       </el-select>
                                   </div>
                                   <div class="mt-2">
                                       <audio id="mp3" ref="mp3" controls>
                                           <source :src="form.nhac_website" type="audio/mpeg">
                                       </audio>
                                   </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="">Ngày cưới</label>
                                <div>
                                    <el-date-picker
                                        style="width: 100%"
                                        v-model="form.ngay_cuoi"
                                        type="date"
                                        format="dd/MM/yyyy"
                                        value-format="yyyy-MM-dd"
                                        placeholder="Ngày cưới">
                                    </el-date-picker>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="">Link youtube video cưới</label>
                                <el-input v-model="form.video_cuoi" ></el-input>
                            </div>

                            <div class="mt-3">
                                <label for="">Hiện khối Câu chuyện tình yêu</label>
                                <el-switch v-model="form.cau_chuyen_tinh_yeu" />
                            </div>
                            <div class="mt-3">
                                <label for="">Hiện khối Sự kiện cưới</label>
                                <el-switch v-model="form.su_kien_cuoi" />
                            </div>
                            <div class="mt-3">
                                <label for="">Hiện khối Phù dâu & Phù rể</label>
                                <el-switch v-model="form.phu_dau_phu_re" />
                            </div>
                            <div class="mt-3">
                                <label for="">Hiện khối Album</label>
                                <el-switch v-model="form.album" />
                            </div>
                            <div class="mt-3">
                                <label for="">Hiện khối Lời cảm tạ</label>
                                <el-switch v-model="form.loi_cam_ta" />
                            </div>
                        </div>

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
    <script src="https://unpkg.com/vue-croppie/dist/vue-croppie.js"></script>
    <script>
        ELEMENT.locale(ELEMENT.lang.en)
        new Vue({
            el: '#app',
            data: {
                form: {
                    nhac_website: 'https://cdn.biihappy.com/ziiweb/wedding-musics/BeautifulInWhite-ShaneFilan-524801.mp3'
                },
                loading: false,
                dialogVisible: false,

                croppieImage: '',
                image: null,
                key: null,

                options: [
                    {
                        label: 'IDo-911',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/IDo-911.mp3'
                    },
                    {
                        label: 'Perfect - Ed Sheeran',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/Perfect-EdSheeran-6445593.mp3'
                    },
                    {
                        label: 'Beautiful In White - Shane Filan',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/BeautifulInWhite-ShaneFilan-524801.mp3'
                    },
                    {
                        label: 'Everytime we touch - Cascada',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/EverytimeWeTouch-Cascada_34jyq.mp3'
                    },
                    {
                        label: 'I love you 3000 - Stephanie Poetri',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/ILoveYou3000-StephaniePoetri-6009786.mp3'
                    },
                    {
                        label: 'Marry you - Bruno Mars',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/MarryYou-BrunoMars-6450059.mp3'
                    },
                    {
                        label: 'Just the way you are - Bruno Mars',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/JustTheWayYouAre-BrunoMars.mp3'
                    },
                    {
                        label: 'Can’t Take My Eyes Off You - Frankie Valli',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/CantTakeMyEyesOffYou-FrankieValli_xdnu.mp3'
                    },
                    {
                        label: 'A Thousand Years - Christina Perri',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/AThousandYears-christinaperri-6430911.mp3'
                    },
                    {
                        label: 'Until you - Shayne Ward',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/UntilYou-ShayneWard.mp3'
                    },
                    {
                        label: 'Hơn cả yêu - Đức Phúc',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/HonCaYeu-DucPhuc.mp3'
                    },
                    {
                        label: 'Ánh nắng của anh - Đức Phúc',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/AnhNangCuaAnh-DucPhuc.mp3'
                    },
                    {
                        label: 'Ngày đầu tiên - Đức Phúc',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/NgayDauTien-DucPhuc.mp3'
                    },
                    {
                        label: 'Nơi này có anh - Sơn Tùng MTP',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/NoiNayCoAnh-MTP.mp3'
                    },
                    {
                        label: 'Cưới nhau đi (Yes, I do) - Hiền Hồ, Bùi Anh Tuấn',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/CuoinhauDi-BuiAnhTuanHienHo.mp3'
                    },
                    {
                        label: 'Làm vợ anh nhé - Chi Dân',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/LamVoAnhNhe-ChiDan.mp3'
                    },
                    {
                        label: 'Nắm lấy tay anh - Tuấn Hưng',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/NamLayTayAnh-TuanHung.mp3'
                    },
                    {
                        label: 'Một nhà - DaLab',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/MotNha-DaLAB.mp3'
                    },
                    {
                        label: 'Ta là của nhau - Ông Cao Thắng ft Đông Nhi',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/TaLaCuaNhau-DongNhiOngCaoThang.mp3'
                    },
                    {
                        label: 'Chuyện sui gia- Doan Minh Khuu Huy Vu',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/ChuyenSuiGia-DoanMinhKhuuHuyVu-6352176.mp3'
                    },
                    {
                        label: 'Rước dâu miệt vườn - Kim Tử Long',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/RuocDauMietVuon-KimTuLong.mp3'
                    },
                    {
                        label: 'Rượu cưới ngày xuân - Hoài Linh',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/RuouCuoiNgayXuan-HoaiLinh.mp3'
                    },
                    {
                        label: 'Cô Thắm về làng - Phi Nhung',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/CoThamVeLang-PhiNhung.mp3'
                    },
                    {
                        label: 'Mùa xuân cưới em - Mai Lệ Quyên ft Lưu Chí Vỹ',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/MuaXuanCuoiEm-MaiLeQuyenLuuChiVy.mp3'
                    },
                    {
                        label: 'Rước tình về với quê hương - NS. Hoàng Thi Thơ',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/RuocTinhVeVoiQueHuong-HoangThiTho.mp3'
                    },
                    {
                        label: 'Thuyền hoa - Quang Linh ft Hà Phương',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/ThuyenHoa-QuangLinhHaPhuong.mp3'
                    },
                    {
                        label: 'Đám cưới trên đường quê - Ngọc Sơn',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/DamCuoiVeTrenDuongQueNgocSon.mp3'
                    },
                    {
                        label: 'Đường về hai thôn - Phi Nhung',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/DuongVeHaiThon-PhiNhung.mp3'
                    },
                    {
                        label: 'Thương nhau lý tơ hồng - Cẩm Ly ft Quang Linh',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/ThuongNhauLyToHong-CamLyQuangLinh.mp3'
                    },
                    {
                        label: 'Túp lều lý tưởng - Quang Linh',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/TupLieuLyTuong-QuangLinh.mp3'
                    },
                    {
                        label: 'Ngày xuân vui cưới - Hoài Linh, Tuấn Vũ',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/NgayXuanVuiCuoi-HoaiLinh-TuanVu.mp3'
                    },
                    {
                        label: 'Trai tài gái sắc - Hoài Linh ft Cẩm Ly',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/TraiTaiGiaSac-HoaiLinhCamLy.mp3'
                    },
                    {
                        label: 'Thề non hẹn biển - Mai Lệ Quyên, Đoàn Minh',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/TheNonHenBien-MaiLeQuyenDoanMinh.mp3'
                    },
                    {
                        label: 'Thiên duyên tiền định - Lưu Chí Vỹ',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/ThienDuyenTienDinh-LuuChiVyQuynhTrang.mp3'
                    },
                    {
                        label: 'Hỏi vợ ngoại thành - Đan Trường',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/HoiVoNgoaiThanh-GiangTruong.mp3'
                    },
                    {
                        label: 'Đám cưới như mơ - Quang Linh',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/DamCuoiNhuMo-QuangLinh.mp3'
                    },{
                        label: 'Memories are made of this - Dean Martin',
                        value: 'https://cdn.biihappy.com/ziiweb/wedding-musics/MemoriesAreMadeOfThis-DeanMartin.mp3'
                    },
                ]
            },
            created() {
                this.fetchData()
            },
            mounted() {

            },
            methods: {
                async copyLink() {
                    try {
                        await navigator.clipboard.writeText(`https://${this.form.link_website}.levuquy.info.vn`);
                        this.$notify({
                            title: 'Thông báo',
                            message: 'Copy thành công',
                            type: 'success'
                        });
                    } catch($e) {
                        alert('Cannot copy');
                    }
                },
                changeMusic() {
                  this.$refs.mp3.src = this.form.nhac_website
                },
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
                    const url = "{{route('get-website-information')}}";
                    axios.get(url, this.form)
                        .then((response) => {
                            this.form = response.data
                            this.form.su_kien_cuoi = !!this.form.su_kien_cuoi
                            this.form.cau_chuyen_tinh_yeu = !!this.form.cau_chuyen_tinh_yeu
                            this.form.album = !!this.form.album
                            this.form.phu_dau_phu_re = !!this.form.phu_dau_phu_re
                            this.form.loi_cam_ta = !!this.form.loi_cam_ta
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
                save: function () {
                    this.loading = true
                    const url = "{{route('post-website-information')}}";

                    this.form.su_kien_cuoi = this.form.su_kien_cuoi ? 1 : 0
                    this.form.cau_chuyen_tinh_yeu = this.form.cau_chuyen_tinh_yeu ? 1:0
                    this.form.album = this.form.album ? 1:0
                    this.form.phu_dau_phu_re = this.form.phu_dau_phu_re ? 1:0
                    this.form.loi_cam_ta = this.form.loi_cam_ta ? 1:0

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

                    this.form.su_kien_cuoi = !!this.form.su_kien_cuoi
                    this.form.cau_chuyen_tinh_yeu = !!this.form.cau_chuyen_tinh_yeu
                    this.form.album = !!this.form.album
                    this.form.phu_dau_phu_re = !!this.form.phu_dau_phu_re
                    this.form.loi_cam_ta = !!this.form.loi_cam_ta
                }
            }
        })
    </script>
@endsection
