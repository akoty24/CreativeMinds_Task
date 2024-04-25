<?php
namespace App\Repositories\Admin;

use App\Models\User;
use Hash;

class UserRepository 
{
    public function getAll()
    {
        return User::all();
    }

    public function create(array $data)
    {
        
        $user = User::create([
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => $data['role'],
            'mobile_number' => $data['mobile_number'],
            'location' => json_encode($data['location'] ?? null),
        ]);
        return $user ;

    }

    public function update(array $data, $id)
{
    $user = User::findOrFail($id);
    if (isset($data['password'])) {
        $user->password = Hash::make($data['password']);
    }
    if (isset($data['image'])) {
        $imagePath = $data['image']->store('images');
        $user->image = $imagePath;
    }
    if (isset($data['latitude']) && isset($data['longitude'])) {
        $location = [
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ];
        $user->location = $location;
    }
    $user->username = $data['username'];
    $user->role = $data['role'];
    $user->mobile_number = $data['mobile_number'];
    $user->save();

    return $user;
}
    

    public function delete($id)
    {
        return User::destroy($id);
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

}