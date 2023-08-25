<?php

namespace App\Contracts\Repositories;

interface UserRepositoryInterface
{
    public function getAllUsers();

    public function createUser(array $data);
}
?>