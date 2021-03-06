<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
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
            "title" => "required|min:5|max:500",
            //al slug, debemos enviarle el id del post que estamos cambiando, ya que el slug es unico y no pueden existir dos iguales
            "slug" => "required|min:5|max:500|unique:categories,slug,".$this->route("category")->id
        ];
    }
}
