<h3 class="mt-5">- ẢNH BACKGROUND </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider1" :src="form.background_slider1 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider1">
                        ẢNH BACKGROUND SLIDER 1- Thay đổi
                        <input @change="changeImage('background_slider1')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_slider1">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider2" :src="form.background_slider2 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider2">
                        ẢNH BACKGROUND SLIDER 2- Thay đổi
                        <input @change="changeImage('background_slider2')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_slider2">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider3" :src="form.background_slider3 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider3">
                        ẢNH BACKGROUND SLIDER 3- Thay đổi
                        <input @change="changeImage('background_slider3')" type="file" id="input_background_slider3">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_cau_chuyen_tinh_yeu" :src="form.background_cau_chuyen_tinh_yeu ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_cau_chuyen_tinh_yeu">
                        ẢNH BACKGROUND CÂU CHUYỆN TÌNH YÊU- Thay đổi
                        <input @change="changeImage('background_cau_chuyen_tinh_yeu')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_cau_chuyen_tinh_yeu">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_the_big_day" :src="form.background_the_big_day ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_the_big_day">
                        ẢNH BACKGROUND THE BIG DAY- Thay đổi
                        <input @change="changeImage('background_the_big_day')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_the_big_day">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_video_cuoi" :src="form.background_video_cuoi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_video_cuoi">
                        ẢNH BACKGROUND VIDEO CƯỚI- Thay đổi
                        <input @change="changeImage('background_video_cuoi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_video_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_su_kien_cuoi" :src="form.background_su_kien_cuoi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_su_kien_cuoi">
                        ẢNH BACKGROUND SỰ KIỆN CƯỚI- Thay đổi
                        <input @change="changeImage('background_su_kien_cuoi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_su_kien_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_phu_dau_phu_re" :src="form.background_phu_dau_phu_re ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_phu_dau_phu_re">
                        ẢNH BACKGROUND PHÙ DÂU & PHÙ RỂ- Thay đổi
                        <input @change="changeImage('background_phu_dau_phu_re')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_phu_dau_phu_re">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
</el-row>
