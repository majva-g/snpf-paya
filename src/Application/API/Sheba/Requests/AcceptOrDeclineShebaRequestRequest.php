<?php

namespace Application\API\Sheba\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class AcceptOrDeclineShebaRequestRequest extends FormRequest
{
    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|in:confirmed,canceled',
            'note' => 'nullable|string',
        ];
    }
}
