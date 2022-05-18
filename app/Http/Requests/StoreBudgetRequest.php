<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBudgetRequest extends FormRequest
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

            'name' => 'required',
            'income' => 'required|integer',
            'house' => 'required|integer|between:1,99',
            'food' => 'required|integer|between:1,99',
            'transport' => 'required|integer|between:1,99',
            'personal' => 'required|integer|between:1,99',
            'entertainment' => 'required|integer|between:1,99',

        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Please specify the name for your budget',

            'house.required' => 'Please fill the missing housing value',
            'food.required' => 'Please fill the missing food spendings value',
            'transport.required' => 'Please fill the missing transportation value',
            'personal.required' => 'Please fill the missing personal spendings value',
            'entertainment.required' => 'Please fill the missing entertainment value',

            'house.between' => 'value needs to be integer between 0-99, idealy a correct %',
            'food.between' => 'value needs to be integer between 0-99, idealy a correct %',
            'transport.between' => 'value needs to be integer between 0-99, idealy a correct %',
            'personal.between' => 'value needs to be integer between 0-99, idealy a correct %',
            'entertainment.between' => 'value needs to be integer between 0-99, idealy a correct %',

        ];
    }
}
