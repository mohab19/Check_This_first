<?php

namespace App\Domain\Store\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'merchant_id' => 'required|exists:merchants,id',
            'name'        => 'required|string|max:255',
            'type'        => 'required|string|max:255',
            'country_id'  => 'required|exists:countries,id'
        ];
    }
}
