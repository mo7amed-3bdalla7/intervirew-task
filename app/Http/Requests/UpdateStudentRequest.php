<?php

namespace App\Http\Requests;

use App\StudentClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class UpdateStudentRequest extends FormRequest
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
            'date_of_birth' => [
                'date',
                'before:' . Carbon::today()->subYear()->toDateString()
            ],
            'class_id' => ['exists:classes,id'],
        ];
    }
}
