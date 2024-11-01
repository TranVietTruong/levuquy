<h4 class="mt-3">- ẢNH BACKGROUND </h4>
<el-row :gutter="20">
        <el-col :span="6" :md="6" :sm="24" :xs="24">
            <div class="preview">
                <div class="preview-img mt-3">
                    <img id="background_home" :src="form.background_home ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                    <div class="upload">
                        <label for="input_background_home">
                            HOME - Thay đổi
                            <input @change="changeImage('background_home')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_home">
                        </label>
                    </div>
                </div>
            </div>
        </el-col>
        <el-col :span="6" :md="6" :sm="24" :xs="24">
            <div class="preview">
                <div class="preview-img mt-3">
                    <img id="background_cap_doi" :src="form.background_cap_doi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                    <div class="upload">
                        <label for="input_background_cap_doi">
                            CẶP ĐÔI - Thay đổi
                            <input @change="changeImage('background_cap_doi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_cap_doi">
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
                            CÂU CHUYỆN TÌNH YÊU - Thay đổi
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
                            PHÙ DÂU & PHÙ RỂ - Thay đổi
                            <input @change="changeImage('background_phu_dau_phu_re')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_phu_dau_phu_re">
                        </label>
                    </div>
                </div>
            </div>
        </el-col>
        <el-col :span="6" :md="6" :sm="24" :xs="24">
            <div class="preview">
                <div class="preview-img mt-3">
                    <img id="background_album_hinh_cuoi" :src="form.background_album_hinh_cuoi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                    <div class="upload">
                        <label for="input_background_album_hinh_cuoi">
                            ALBUM HÌNH CƯỚI - Thay đổi
                            <input @change="changeImage('background_album_hinh_cuoi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_album_hinh_cuoi">
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
                            SỰ KIỆN CƯỚI - Thay đổi
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
                            VIDEO CƯỚI - Thay đổi
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
                            LỜI CẢM TẠ - Thay đổi
                            <input @change="changeImage('background_loi_cam_ta')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_loi_cam_ta">
                        </label>
                    </div>
                </div>
            </div>
        </el-col>
        <el-col :span="6" :md="6" :sm="24" :xs="24">
            <div class="preview">
                <div class="preview-img mt-3">
                    <img id="background_mung_cuoi" :src="form.background_loi_cam_ta ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                    <div class="upload">
                        <label for="input_background_loi_cam_ta">
                            MỪNG CƯỚI - Thay đổi
                            <input @change="changeImage('background_loi_cam_ta')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_loi_cam_ta">
                        </label>
                    </div>
                </div>
            </div>
        </el-col>
</el-row>
