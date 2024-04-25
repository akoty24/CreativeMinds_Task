<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        try {
            $users = $this->userService->getAllUsers();
           return view('admin.users.index', compact('users'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch users.'], 500);
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        try {
            $data = $request->validated();
            
            $this->userService->createUser($data);
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create user.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userService->getUserById($id);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user.'], 500);
        }
    }
    public function edit($id){
        try {
            $user = $this->userService->getUserById($id);
            return view('admin.users.edit', compact('user'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user.'], 500);
        }
    }
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $data = $request->validated();
          
            
        $user = $this->userService->updateUser($data, $id);
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update user.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->userService->deleteUser($id);
            return redirect()->route('users.index')->with('success', 'User deleted successfully');

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user.'], 500);
        }
    }
}
