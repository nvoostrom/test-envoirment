<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUser()
    {
        return user::all();
    }
    public function getUserById($userId)
    {
        return user::findOrFail($userId);
    }
    public function deleteUser($userId)
    {
        return user::destroy($userId);
    }
    public function createUser(array $userDetails)
    {
        return user::create($userDetails);
    }
    public function updateUser($userId, array $userDetails)
    {
        return user::whereId($userId)->update($userDetails);
    }
    public function getverified_at()
    {
        return user::whereNotNull('email_verified_at');
    }
}
