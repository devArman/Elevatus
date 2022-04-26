<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DistanceCalculateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'string1' => 'required',
            'string2' => 'required',
            'method' => ['required', Rule::in(['hamming', 'levenshtein']),
            ],
        ];
    }
}
