<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function createUser(array $userData)
    {
        return User::create($userData);
    }

    public function findByMobileNumber($mobileNumber)
    {
        return User::where('mobile_number', $mobileNumber)->first();
    }

    public function getUserProfile($id)
    {
        return User::where('id', $id)->first();
    }

}