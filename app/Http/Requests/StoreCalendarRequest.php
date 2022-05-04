<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCalendarRequest extends FormRequest
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
        if ($this->has('eventTitle')) {
            return $this->rulesEvent();
        }
        else {
            return $this->rulesCategory();
        }
    }
    public function rulesEvent()
    {
        return [
            'eventTitle' => 'required',
            'description',
            'presetCategory' => 'required',
            'color',
            'eventStartTime',
            'eventEndTime',
            'user_id',
        ];
    }

    public function rulesCategory()
    {
        return [
            'categoryName' => 'required',
            'categoryColor' => 'required',
            'categoryStartTime' => 'required',
            'categoryEndTime' => 'required', 'user_id',
            'timetable_id',

        ];
    }

    public function messages()
    {
        return [
            'eventTitle.required' => 'Event tittle cannot be empty',
            'categoryName.required' => 'Time Block Label cannot be empty',
            'categoryColor.required' => 'Please select the color',
            'categoryStartTime.required' => 'Please set the start time',
            'categoryEndTime.required' => 'Please set the end time',
        ];
    }
}