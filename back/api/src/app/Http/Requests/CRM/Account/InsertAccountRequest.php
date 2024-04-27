<?php

namespace App\Http\Requests\CRM\Account;

use Illuminate\Foundation\Http\FormRequest;

class InsertAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'accountName' => ['required','string'],
            'accountWebsite' => ['required','url'],
            'accountPhone' => ['required', 'string', 'regex:/^([+]?)(?![.-])(?>(?>[.-]?[ ]?[\da-zA-Z]+)+|([ ]?((?![.-])(?>[ .-]?[\da-zA-Z]+)+)(?![.])([ -]?[\da-zA-Z]+)?)+)+(?>(?>([,]+)?[;]?[\da-zA-Z]+)+(([#][\da-zA-Z]+)+)?)?[#;]?$/'],
        ];
    }

    protected function failedValidation($validator)
    {
        $errorMessage = $validator->errors()->first();
        $response = response()->json(['message' => $errorMessage], 422);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

}
