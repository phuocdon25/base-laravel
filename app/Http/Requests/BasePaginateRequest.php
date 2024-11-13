<?php

namespace App\Http\Requests;

/**
 * Class BasePaginateRequest
 */
class BasePaginateRequest extends BaseRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'page' => $this->input('page') === null ? config('paginate.page') : (int) $this->input('page'),
            'limit' => $this->input('limit') === null ? config('paginate.limit') : (int) $this->input('limit'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'page' => 'nullable|numeric|min:1',
            'limit' => 'nullable|numeric|min:1',
        ];
    }
}
