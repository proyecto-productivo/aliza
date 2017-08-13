<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            // 'imagen'=>"required|mimes:jpeg,bmp,png",
            'imagen'=>"required",
            'type_id'=>"required",
            'subtype_id'=>"required",
            'name'=>"max:20",
            'condition'=>"required",
            'notes'=>"required",
            'place'=>"required",
            'colors'=>"required",
            'state_id'=>"required",
            'city_id'=>"required"

        ];
    }
}
