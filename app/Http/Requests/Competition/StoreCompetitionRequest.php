<?php

namespace App\Http\Requests\Competition;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionRequest extends FormRequest
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
            'name' => 'required|max:50|unique:competitions,name',
            'competition_img' => 'required|image|max:2048|mimes:png,jpg,svg,webp,jpeg,gif',
            'description' => 'required|min:10',
            'competitor_limit' => 'required',
            'type' => 'required',
            'fee' => 'nullable|integer',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'password' => 'nullable|min:5|max:20',
            'cube_categories' => 'required'
        ];
    }
}
