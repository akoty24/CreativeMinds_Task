<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\VerifyOtpRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function register(RegisterRequest $request)
    {
        try {
        $user = $this->authService->register($request->validated());
       
        return response()->json(['message' =>"OtP Sent Successfully"],201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function verifyOtp(VerifyOtpRequest $request)
    {
        try {
        $data = $request->validated();
        $isVerified = $this->authService->verifyOtp($data);
       
        if ($isVerified) {
            $user = User::where('mobile_number', $data['mobile_number'])->first();

            $token = Auth::login($user);
            $userResource = new UserResource($user);
            return response()->json(['message' => 'OTP verified successfully', 'data' => $userResource, 'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid OTP'], 401);
        }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function login(LoginRequest $request)
    {
     try {
        $data = $this->authService->login($request->validated());
     
        
        
        return response()->json(['message' => 'Login successful','data' => $data], 200);
    }
    catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
    }
    public function profile(Request $request)
    {  
        try {
       $user = $request->user();
       if ($user) {
           return response()->json(['user' => new UserResource($user)], 200);
       } else {
           return response()->json(['error' => 'Unauthorized'], 401);
       }
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
    }

    

}
