<h3 class="mt-5">- ẢNH TÙY CHỈNH </h3>
<el-row :gutter="20">
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_couple_1" :src="form.anh_couple_1 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_couple_1">
                        ẢNH CÔ DÂU & CHÚ RỂ 1 - Thay đổi
                        <input @change="changeImage('anh_couple_1', '23')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_couple_1">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
    <el-col :span="6" :md="6" :sm="24" :xs="24">
        <div class="preview">
            <div class="preview-img mt-3">
                <img id="anh_couple_2" :src="form.anh_couple_2 ?? 'https://i.imgur.com/4de2gue.jpg'" alt="">
                <div class="upload">
                    <label for="input_anh_couple_2">
                        ẢNH CÔ DÂU & CHÚ RỂ 2 - Thay đổi
                        <input @change="changeImage('anh_couple_2', '25')" accept="image/png, image/jpeg, image/jpg" type="file" id="input_anh_couple_2">
                    </label>
                </div>
            </div>
        </div>
    </el-col>
</el-row>

