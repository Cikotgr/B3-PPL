<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'OwnerName' => 'required|string|max:255',
            'OwnerTelephone' => 'required|numeric|min:12',
            'OwnerEmail' => 'required|email|max:255',
            'BussinesEmail' => 'required|email|max:255',
            'BussinesName' =>'required|unique:supplier_profiles,bussines_name|max:255',
            'BussinesTelephone' => 'required|unique:supplier_profiles,bussines_telephone|numeric',
            'BussinesType' => 'required',
            'Provincy' => 'required',
            'regency' => 'required',
            'Address' => 'required',
            'Description' => 'required'
        ];
    }
}
