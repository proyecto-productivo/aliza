<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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

        'type_id'=> "required",
        'entity'=> "required",
        'number'=>"required|min:4|max:20",
        'name'=>"required|min:3|max:40",
        'notes'=>"required|min:5",
        'place'=>"required",
        'state_id'=>"required",
        'city_id'=>"required"
            //
        ];
    }
}
