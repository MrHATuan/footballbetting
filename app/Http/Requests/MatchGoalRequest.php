<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatchGoalRequest extends Request
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
            'txtHomegoal' => 'required|integer',
            'txtAwaygoal' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'txtHomegoal.required' => 'Chưa điền bàn thắng đội nhà',
            'txtHomegoal.integer' => 'Bàn thắng đội nhà phải là một số nguyên',
            'txtAwaygoal.required' => 'Chưa điền bàn thắng đội khách',
            'txtAwaygoal.integer' => 'Bàn thắng đội khách phải là một số nguyên',
        ];
    }
}
