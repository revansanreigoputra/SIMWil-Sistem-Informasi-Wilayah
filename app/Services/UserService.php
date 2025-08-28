<?php

namespace App\Services;

use App\Repositories\Interface\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $userRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(): \Illuminate\Support\Collection
    {
        return $this->userRepository->all();
    }

    public function createUser(array $data)
    {
        $user = $this->userRepository->create($data);
        if (isset($data['roles'])) {
            $this->syncUserRoles($user, $data['roles']);
        }
        return $user;
    }

    public function updateUser($id, array $data)
    {
        $user = $this->userRepository->update($id, $data);
        if (isset($data['roles'])) {
            $this->syncUserRoles($user, $data['roles']);
        }
        return $user;
    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }

    protected function syncUserRoles($user, string $roles): void
    {
        $user->syncRoles($roles);
    }
}
