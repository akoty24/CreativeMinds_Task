<?php
namespace App\Services\Admin;

use App\Repositories\Admin\UserRepository;
use Hash;

class UserService 
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAll();
    }

    public function createUser(array $data)
    {

    $data['password'] = Hash::make($data['password']);

    if (isset($data['image'])) {
        $imagePath = $data['image']->store('images');
        $data['image'] = $imagePath;
    }

    if (isset($data['latitude']) && isset($data['longitude'])) {
       
        $location = [
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ];
       
        $data['location'] = $location;
    
    }
    $user = $this->userRepository->create($data);
    
    return $user;

    }

    public function updateUser(array $data, $id)
    {
        
        $user = $this->userRepository->update($data, $id);
        
        return $user;

    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }
}