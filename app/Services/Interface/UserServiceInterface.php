<?php

namespace App\Services\Interface;

interface UserServiceInterface
{
    public function getAllUsers(): \Illuminate\Support\Collection;
    public function getUserById($id);
    public function createUser(array $data);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}
