<?php

namespace App\Domain\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRegisterRequest extends FormRequest
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
            'store_id'                => 'required|exists:stores,id',
            'name'                    => 'required|string|max:255',
            'description'             => 'required|string|max:1000',
            'price'                   => 'required|numeric|min:1',

            'languages'               => 'nullable|array',
            'languages.*.lang'        => 'required_with:languages|string|exists:languages,code',
            'languages.*.name'        => 'required_with:languages|string|max:255',
            'languages.*.description' => 'required_with:languages|string',
        ];
    }
}
