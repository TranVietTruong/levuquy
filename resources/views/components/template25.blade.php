<h3 class="mt-5">- ẢNH TÙY CHỈNH </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_home" :src="form.anh_home ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_home">
                        ẢNH HOME- Thay đổi
                        <input @change="changeImage('anh_home', '25')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_home">
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
            <label for="">[LỜI NGỎ] Nội dung</label>
            <el-input type="textarea" v-model="form.text_loi_ngo" ></el-input>
        </div>
    </el-col>
</el-row>
