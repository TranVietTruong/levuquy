<h3 class="mt-5">- ẢNH BACKGROUND </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_home" :src="form.background_home ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_home">
                        ẢNH BACKGROUND HOME- Thay đổi
                        <input @change="changeImage('background_home')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_home">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_couple" :src="form.background_couple ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_couple">
                        ẢNH BACKGROUND CẶP ĐÔI- Thay đổi
                        <input @change="changeImage('background_couple')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_couple">
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
                <img id="background_phu_dau_phu_re" :src="form.background_phu_dau_phu_re ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_phu_dau_phu_re">
                        ẢNH BACKGROUND CÂU CHUYỆN TÌNH YÊU- Thay đổi
                        <input @change="changeImage('background_phu_dau_phu_re')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_phu_dau_phu_re">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_album" :src="form.background_album ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_album">
                        ẢNH BACKGROUND ALBUM- Thay đổi
                        <input @change="changeImage('background_album')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_album">
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
                        ẢNH BACKGROUND ALBUM- Thay đổi
                        <input @change="changeImage('background_su_kien_cuoi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_su_kien_cuoi">
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
                        ẢNH BACKGROUND ALBUM- Thay đổi
                        <input @change="changeImage('background_video_cuoi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_video_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_loi_cam_ta" :src="form.background_loi_cam_ta ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_loi_cam_ta">
                        ẢNH BACKGROUND LỜI CẢM TẠ- Thay đổi
                        <input @change="changeImage('background_loi_cam_ta')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_loi_cam_ta">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_mung_cuoi" :src="form.background_mung_cuoi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_mung_cuoi">
                        ẢNH BACKGROUND MỪNG CƯỚI- Thay đổi
                        <input @change="changeImage('background_mung_cuoi')" type="file" id="input_background_mung_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
</el-row>
