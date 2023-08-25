<?php

namespace App\Contracts\Services;

interface UserServiceInterface
{
    public function getAllUsers();

    public function createUser(array $data);
}
?>