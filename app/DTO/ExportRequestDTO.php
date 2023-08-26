<?php

namespace App\DTO;

class ExportRequestDTO extends BaseDTO
{
    public function validateRequestData()
    {
        $rules = [
            'columns' => 'array',
            'columns.*' => 'string', // Each column should be a string
        ];

        return parent::validate($rules);
    }
}
