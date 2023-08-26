<?php

namespace App\DTO;

class CreateUserRequestDTO extends BaseDTO
{
    public function validateRequestData()
    {
        $rules = [
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ];

        return parent::validate($rules);
    }
}
