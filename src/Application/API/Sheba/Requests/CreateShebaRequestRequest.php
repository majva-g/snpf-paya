<?php

namespace Application\API\Sheba\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class CreateShebaRequestRequest extends FormRequest
{
    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'price' => 'required|numeric|min:1',
            'fromShebaNumber' => 'required|string|exists:shebas,number',
            'ToShebaNumber' => 'required|string|exists:shebas,number',
            'note' => 'nullable|string',
        ];
    }
}
