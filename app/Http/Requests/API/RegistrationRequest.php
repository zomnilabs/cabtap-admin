<?php
namespace App\Http\Requests\API;

class RegistrationRequest extends AbstractAPIRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'        => 'required|email|min:2',
            'password'     => 'required|min:2',
            'profile.first_name'    => 'required',
            'profile.last_name'     => 'required'
        ];
    }
}