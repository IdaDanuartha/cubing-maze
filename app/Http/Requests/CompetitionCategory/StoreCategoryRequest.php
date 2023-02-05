<?php

namespace App\Http\Requests\CompetitionCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30|unique:cube_categories,name',
            'short_name' => 'required|max:15|unique:cube_categories,short_name',
            'icon_img' => 'required|image|max:2048|mimes:png,jpg,svg,webp,jpeg,gif',
        ];
    }
}
