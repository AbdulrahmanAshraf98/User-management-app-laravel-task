<?php
    

namespace App\DTO;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BaseDTO
{
    protected $data = [];

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function validate(array $rules)
    {
        $validator = Validator::make($this->data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $this->data;
    }
}
