<?php

namespace App\Http\Requests\CompetitionItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompetitionItem extends FormRequest
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
            'competition_round_id' => 'required',
            'cube_category_id' => 'required',
            'scramble_img' => 'nullable',
            'date' => 'required|date'
        ];
    }

    public function attributes()
    {
        return [
            'competition_id' => 'required',
            'competition_round_id' => 'competition round',
            'cube_category_id' => 'cube category',
            'scramble_img' => 'scramble image',
        ];
    }
}
