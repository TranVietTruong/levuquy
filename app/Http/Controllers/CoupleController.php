<?php

namespace App\Http\Controllers;

use App\Models\CoupleInformation;
use App\Models\User;
use App\Services\UploadImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CoupleController extends Controller
{
    public function index() {
        $data = CoupleInformation::where('user_id', Auth::user()->id)->first();
        if (!$data) {
            $data = [
                'anh_chu_re' => 'https://cdn.biihappy.com/ziiweb/default/website/3b48bc6125ce6d186297a3e90a11085e.jpeg',
                'ten_chu_re' => 'Hoàng Kiến Văn',
                'ngay_sinh_chu_re' => '12/02/1992',
                'gioi_thieu_chu_re' => 'Là bác sĩ nha khoa hiện đang công tác tại một phòng khám nha khoa ở Quận 1 thành phồ Hồ Chí Minh. Là một người hiền lành và ít nói. Luôn coi trọng tình cảm và yêu thương gia đình. Với anh: “Gia đình là điểm tựa vững chắc nhất và là bến đỗ bình yên không đâu sánh bằng đối với mỗi con người. Đó luôn là nơi tràn ngập tình yêu thương để ta trở về.”',
                'ho_ten_bo_chu_re' => 'Hoàng Anh Kiệt',
                'ho_ten_me_chu_re' => 'Ngô Thị Hoài',
                'ten_ngan_hang_chu_re' => 'VPBank',
                'ten_chu_tai_khoan_chu_re' => 'HOANG KIEN VAN',
                'stk_chu_re' => '12345678910',
                'chi_nhanh_chu_re' => 'TP.HCM',
                'anh_qr_chu_re' => 'https://cdn.biihappy.com/ziiweb/website/61990349db8f76231c132068/49bc348db7eb284d9fc249b9d958893b.jpeg',

                'anh_co_dau' => 'https://cdn.biihappy.com/ziiweb/default/website/59b631f29bfb9f7cd20437d27ddbe4db.jpeg',
                'ten_co_dau' => 'Ngô Việt Hoài',
                'ngay_sinh_co_dau' => '12/05/1995',
                'gioi_thieu_co_dau' => 'Cô gái đến từ xứ Huế mộng mơ, hiện đang sinh sống và làm việc tại Sài Gòn. Sau khi tốt nghiệp Học viện Báo chí và Tuyên truyền, quyết tâm theo đuổi đam mê làm phóng viên du lịch. Là một người hay cười nhưng lại sống nội tâm, thích đọc sách, trồng cây và yêu thiên nhiên. Ngoài ra còn rất thích vẽ vời, nuôi mèo và nuôi ước mơ có cho mình một vườn hồng khoe sắc',
                'ho_ten_bo_co_dau' => 'Ngô Xuân Nghĩa',
                'ho_ten_me_co_dau' => 'Trần Hồng Thắm',
                'ten_ngan_hang_co_dau' => 'TPBANK',
                'ten_chu_tai_khoan_co_dau' => 'NGO VIET HOAI',
                'stk_co_dau' => '12345678910',
                'chi_nhanh_co_dau' => 'TP.HCM',
                'anh_qr_co_dau' => 'https://cdn.biihappy.com/ziiweb/website/61990349db8f76231c132068/49bc348db7eb284d9fc249b9d958893b.jpeg',
            ];
        } else {
            $data = $data->toArray();
        }

        $data['anh_chu_re'] = $data['anh_chu_re'] ?? 'https://cdn.biihappy.com/ziiweb/default/website/3b48bc6125ce6d186297a3e90a11085e.jpeg';
        $data['anh_co_dau'] = $data['anh_co_dau'] ?? 'https://cdn.biihappy.com/ziiweb/default/website/59b631f29bfb9f7cd20437d27ddbe4db.jpeg';

        $data['anh_qr_chu_re'] = $data['anh_qr_chu_re'] ?? 'https://cdn.biihappy.com/ziiweb/website/61990349db8f76231c132068/49bc348db7eb284d9fc249b9d958893b.jpeg';
        $data['anh_qr_co_dau'] = $data['anh_qr_co_dau'] ?? 'https://cdn.biihappy.com/ziiweb/website/61990349db8f76231c132068/49bc348db7eb284d9fc249b9d958893b.jpeg';
        return $this->responseData($data);
    }

    public function store(Request $request) {
        $rules = [
            'ten_chu_re' => 'required|max:100',
            'ten_chu_re_ngan_gon' => 'required|max:100',
            'gioi_thieu_chu_re' => 'required|max:1000',
//            'ho_ten_bo_chu_re' => 'required|max:100',
//            'ho_ten_me_chu_re' => 'required|max:100',
            'ten_ngan_hang_chu_re' => 'required|max:100',
            'stk_chu_re' => 'required|max:100',
            'ten_chu_tai_khoan_chu_re' => 'required|max:100',
            'chi_nhanh_chu_re' => 'required|max:100',
            'ten_co_dau' => 'required|max:100',
            'ten_co_dau_ngan_gon' => 'required|max:100',
            'gioi_thieu_co_dau' => 'required|max:1000',
//            'ho_ten_bo_co_dau' => 'required|max:100',
//            'ho_ten_me_co_dau' => 'required|max:100',
            'ten_ngan_hang_co_dau' => 'required|max:100',
            'stk_co_dau' => 'required|max:100',
            'ten_chu_tai_khoan_co_dau' => 'required|max:100',
            'chi_nhanh_co_dau' => 'required|max:100',
        ];
        $messages = [
            'ten_chu_re.required' => 'Bạn hãy điền họ và tên chú rể',
            'ten_chu_re.max' => 'Họ và tên chú rể tối đa 100 kí tự',
            'gioi_thieu_chu_re.required' => 'Bạn hãy điền giới thiệu về chú rể',
            'gioi_thieu_chu_re.max' => 'Giới thiệu về chú rể tối đa 1000 kí tự',
            'ho_ten_bo_chu_re.required' => 'Bạn hãy điền họ tên bố của chú rể',
            'ho_ten_bo_chu_re.max' => 'Họ tên bố của chú rể tối đa 100 kí tự',
            'ho_ten_me_chu_re.required' => 'Bạn hãy điền họ tên mẹ của chú rể',
            'ho_ten_me_chu_re.max' => 'Họ tên mẹ của chú rể tối đa 100 kí tự',
            'ten_ngan_hang_chu_re.required' => 'Bạn hãy điền tên ngân hàng của chú rể',
            'ten_ngan_hang_chu_re.max' => 'Tên ngân hàng của chú rể tối đa 100 kí tự',
            'stk_chu_re.required' => 'Bạn hãy điền số tài khoản của chú rể',
            'stk_chu_re.max' => 'Số tài khoản của chú rể tối đa 100 kí tự',
            'ten_chu_tai_khoan_chu_re.required' => 'Bạn hãy điền tên chủ tài khoản của chú rể',
            'ten_chu_tai_khoan_chu_re.max' => 'Tên chủ tài khoản của chú rể tối đa 100 kí tự',
            'chi_nhanh_chu_re.required' => 'Bạn hãy điền tên chi nhánh tài khoản của chú rể',
            'chi_nhanh_chu_re.max' => 'Chi nhánh tài khoản của chú rể tối đa 100 kí tự',
            'ten_co_dau.required' => 'Bạn hãy điền họ và tên cô dâu',
            'ten_co_dau.max' => 'Họ và tên cô dâu tối đa 100 kí tự',
            'gioi_thieu_co_dau.required' => 'Bạn hãy điền giới thiệu về cô dâu',
            'gioi_thieu_co_dau.max' => 'Giới thiệu về cô dâu tối đa 1000 kí tự',
            'ho_ten_bo_co_dau.required' => 'Bạn hãy điền họ tên bố của cô dâu',
            'ho_ten_bo_co_dau.max' => 'Họ tên bố của cô dâu tối đa 100 kí tự',
            'ho_ten_me_co_dau.required' => 'Bạn hãy điền họ tên mẹ của cô dâu',
            'ho_ten_me_co_dau.max' => 'Họ tên mẹ của cô dâu tối đa 100 kí tự',
            'ten_ngan_hang_co_dau.required' => 'Bạn hãy điền tên ngân hàng của cô dâu',
            'ten_ngan_hang_co_dau.max' => 'Tên ngân hàng của cô dâu tối đa 100 kí tự',
            'stk_co_dau.required' => 'Bạn hãy điền số tài khoản của cô dâu',
            'stk_co_dau.max' => 'Số tài khoản của cô dâu tối đa 100 kí tự',
            'ten_chu_tai_khoan_co_dau.required' => 'Bạn hãy điền tên chủ tài khoản của cô dâu',
            'ten_chu_tai_khoan_co_dau.max' => 'Tên chủ tài khoản của cô dâu tối đa 100 kí tự',
            'chi_nhanh_co_dau.required' => 'Bạn hãy điền tên chi nhánh tài khoản của cô dâu',
            'chi_nhanh_co_dau.max' => 'Chi nhánh tài khoản của cô dâu tối đa 100 kí tự',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return $this->responseBadRequest($validator->getMessageBag()->first());
        }
        $user = Auth::user();

        $couple = CoupleInformation::where('user_id', $user->id)->first();
        if (!$couple) {
            $couple = new CoupleInformation();
        }

        $params = $request->all();
        $couple->fill($params);
        $couple->user_id = $user->id;
        $couple->created_by = $user->id;
        $couple->updated_by = $user->id;
        $couple->save();

        return $this->responseSuccess();
    }

}
