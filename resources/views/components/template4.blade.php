<h3 class="mt-5">- ẢNH BACKGROUND </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider_1" :src="form.background_slider_1 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider_1">
                        ẢNH BACKGROUND SLIDER 1- Thay đổi
                        <input @change="changeImage('background_slider_1')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_slider_1">
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
                        <input @change="changeImage('background_slider_2')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_slider_2">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_slider_3" :src="form.background_slider_3 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_slider_2">
                        ẢNH BACKGROUND SLIDER 3- Thay đổi
                        <input @change="changeImage('background_slider_3')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_slider_3">
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
                        ẢNH BACKGROUND KHỐI VIDEO CƯỚI - Thay đổi
                        <input @change="changeImage('background_video_cuoi')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_video_cuoi">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="background_adventure" :src="form.background_adventure ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_background_adventure">
                        ẢNH BACKGROUND KHỐI Adventure Begins - Thay đổi
                        <input @change="changeImage('background_adventure')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_background_adventure">
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
            <label for="">[KHỐI Adventure Begins] Tiêu đề </label>
            <el-input type="textarea" v-model="form.text_title_adventure" ></el-input>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="mt-3">
            <label for="">[KHỐI Adventure Begins] Nội dung</label>
            <el-input type="textarea" v-model="form.text_adventure" ></el-input>
        </div>
    </el-col>
</el-row>