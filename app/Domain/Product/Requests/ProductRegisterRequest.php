<?php

namespace App\Domain\Merchant\Requests;

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
            'store_id'       => 'required|exists:store,id',
            'name'           => 'required|string|max:255',
            'description'    => 'required|string|max:1000',
            'price'          => 'required|numeric|min:1',
            'vat_included'   => 'nullable|boolean',
            'vat_percentage' => 'nullable|numeric|min:0|max:100'
        ];
    }
}
