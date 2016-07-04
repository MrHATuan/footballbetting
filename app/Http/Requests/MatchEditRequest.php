<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatchEditRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtHome' => 'required',
            'txtAway' => 'required|different:txtHome',
            'timestart' => 'required',
            'timeend' => 'required|after:timestart',
            'timebet' => 'required|before:timestart',
            'txtWin' => 'required|numeric',
            'txtDraw' => 'required|numeric',
            'txtLose' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'txtHome.required' => 'Chưa điền tên đội chủ nhà',
            'txtAway.required' => 'Chưa điền tên đội khách',
            'txtAway.different' => 'Tên đội khách phải khác tên đội chủ nhà',
            'timestart.required' => 'Chưa điền thời gian bắt đầu',
            'timeend.required' => 'Chưa điền thời gian kết thúc',
            'timeend.after' => 'Thời gian kết thúc phải sau trận đấu bắt đầu',
            'timebet.required' => 'Chưa điền thời gian ngưng đặt cược',
            'timebet.before' => 'Thời gian ngưng đặt cược phải trước khi trận đấu bắt đầu',
            'txtWin.required' => 'Chưa điền tỉ lệ thắng',
            'txtWin.numeric' => 'Tỉ lệ thắng phải là số',
            'txtDraw.required' => 'Chưa điền tỉ lệ hòa',
            'txtDraw.numeric' => 'Tỉ lệ hòa phải là số',
            'txtLose.required' => 'Chưa điền tỉ lệ thua',
            'txtLose.numeric' => 'Tỉ lệ thua phải là số',
        ];
    }
}
