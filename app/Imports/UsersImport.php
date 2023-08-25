<?php

namespace App\Imports;
use App\Models\User;
use App\Services\UserService;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements WithHeadingRow, ToModel
{    
    protected $columns;
    protected $userService;
    public function __construct( $columns,UserService $userService)
    {
        $this->columns = $columns;
        $this->userService = $userService;
    }
   public function model($row){
    $userData = [
        "full_name" => $row[$this->columns["full_name"]],
        "phone_number" => $row[$this->columns["phone"]],
        "email" => $row[$this->columns["email"]],
    ];

    return  $this->userService->createUser($userData);
    
   }

    // Skip header row using useRow
    public function headingRow(): int
    {
        return 1; // Set to skip the first row (header)
    }
}



?>