<?php

namespace App\Http\Requests;

use App\StudentClass;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
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
            'maximum_students' => ['integer', 'max:10', 'min:1'],
            'status' => ['in:' . StudentClass::OPENED_STATUS . ',' . StudentClass::CLOSED_STATUS],
        ];
    }
}
