<?php

namespace App\Http\Requests\CRM\Deal;

use Illuminate\Foundation\Http\FormRequest;

class InsertDealRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dealName' => ['required','string'],
            'dealStage' => ['required','string'],
            'dealAccountName' => ['required','string'],
        ];
    }

    protected function failedValidation($validator)
    {
        $response = response()->json([
            'data' => $validator->errors()->first(),
        ], 400);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
