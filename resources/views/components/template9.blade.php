<h3 class="mt-5">- ẢNH BACKGROUND </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_video_cuoi" :src="form.background_video_cuoi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_video_cuoi">
                        ẢNH BACKGROUND KHỐI VIDEO CƯỚI- Thay đổi
                        <input @change="changeImage('background_video_cuoi')" type="file" id="input_background_video_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>

    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_text" :src="form.background_text ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_text">
                        ẢNH BACKGROUND KHỐI TEXT- Thay đổi
                        <input @change="changeImage('background_text')" type="file" id="input_background_text">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
</el-row>

<h3 class="mt-5">- ẢNH TÙY CHỈNH </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_home_trai" :src="form.anh_home_trai ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_home_trai">
                        ẢNH HOME TRÁI - Thay đổi
                        <input @change="changeImage('anh_home_trai', 'popup')" type="file" id="input_anh_home_trai">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_home_giua" :src="form.anh_home_giua ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_home_giua">
                        ẢNH HOME GIỮA - Thay đổi
                        <input @change="changeImage('anh_home_giua', 'popup')" type="file" id="input_anh_home_giua">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_home_phai" :src="form.anh_home_phai ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_home_phai">
                        ẢNH HOME PHẢI - Thay đổi
                        <input @change="changeImage('anh_home_phai', 'popup')" type="file" id="input_anh_home_phai">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
</el-row>

<h3 class="mt-5">- TEXT TÙY CHỈNH </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="mt-3">
            <label for="">[KHỐI VIDEO CƯỚI] Nội dung</label>
            <el-input type="textarea" v-model="form.text_video_cuoi" ></el-input>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="mt-3">
            <label for="">[KHỐI TEXT] Nội dung</label>
            <el-input type="textarea" v-model="form.text_text" ></el-input>
        </div>
    </el-col>
</el-row>
