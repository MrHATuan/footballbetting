<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BettingRequest extends Request
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
            'sltBets' => 'required|integer',
            'txtMoney' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sltBets.required' => 'Không được để trống',
            'sltBets.integer' => 'Yêu cầu chọn cửa',
            'txtMoney.required' => 'Không được để trống',
        ];
    }
}
