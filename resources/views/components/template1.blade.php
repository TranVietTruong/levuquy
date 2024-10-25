<h3 class="mt-5">- ẢNH BACKGROUND </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider_1" :src="form.background_slider_1 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider_1">
                        ẢNH BACKGROUND SLIDER 1- Thay đổi
                        <input @change="changeImage('background_slider_1')" type="file" id="input_background_slider_1">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider_2" :src="form.background_slider_2 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider_2">
                        ẢNH BACKGROUND SLIDER 2- Thay đổi
                        <input @change="changeImage('background_slider_2')" type="file" id="input_background_slider_2">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_thoi_gian" :src="form.background_thoi_gian ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_thoi_gian">
                        ẢNH BACKGROUND KHỐI THỜI GIAN - Thay đổi
                        <input @change="changeImage('background_thoi_gian')" type="file" id="input_background_thoi_gian">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_love_quote" :src="form.background_love_quote ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_love_quote">
                        ẢNH BACKGROUND KHỐI LOVE QUOTE - Thay đổi
                        <input @change="changeImage('background_love_quote')" type="file" id="input_background_love_quote">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_thank_you" :src="form.background_thank_you ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_thank_you">
                        ẢNH BACKGROUND KHỐI THANK YOU- Thay đổi
                        <input @change="changeImage('background_thank_you')" type="file" id="input_background_thank_you">
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
                <img id="anh_su_kien_cuoi" :src="form.anh_su_kien_cuoi ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_su_kien_cuoi">
                        ẢNH KHỐI SỰ KIỆN CƯỚI - Thay đổi
                        <input @change="changeImage('anh_su_kien_cuoi', 'popup')" type="file" id="input_anh_su_kien_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_love_quote" :src="form.anh_love_quote ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_love_quote">
                        ẢNH KHỐI LOVE QUOTE - Thay đổi
                        <input @change="changeImage('anh_love_quote', 'popup')" type="file" id="input_anh_love_quote">
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
            <label for="">[KHỐI LOVE QUOTE] Nội dung</label>
            <el-input type="textarea" v-model="form.text_love_quote" ></el-input>
        </div>
    </el-col>
</el-row>
