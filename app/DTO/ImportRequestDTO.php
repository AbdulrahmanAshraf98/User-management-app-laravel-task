<?php

namespace App\DTO;

class ImportRequestDTO extends BaseDTO
{
    public function validateRequestData()
    {
        $rules = [
            'file' => 'required|mimes:xlsx',
            'columns' => 'required|array',
            'columns.*' => 'string', // Each column should be a string
        ];

        return parent::validate($rules);
    }
}   
?>