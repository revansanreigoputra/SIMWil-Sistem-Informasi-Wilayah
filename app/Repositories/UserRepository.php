<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all(): \Illuminate\Support\Collection
    {
        return User::with('roles')->orderBy('name', 'asc')->get();
    }

    public function findByid($id)
    {
        return User::findOrFail($id);
    }

    public function create(array $data)
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->findByid($id);
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return $user->fresh(); // Return the updated user object
    }

    public function delete($id)
    {
        $user = $this->findByid($id);
        return $user->delete();
    }
}
