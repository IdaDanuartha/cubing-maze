<?php

namespace App\Http\Requests\CompetitionRound;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompetitionRound extends FormRequest
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
            'competition_id' => 'required',
            'round_name' => 'required|max:15|unique:competition_rounds,round_name',
            'cube_categories' => 'required',
        ];
    }
}
