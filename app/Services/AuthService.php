<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use DB;
use Illuminate\Support\Facades\Hash;
use Twilio\Rest\Client;

class AuthService
{
    protected $userRepository;
    protected $twilioClient;

    public function __construct(UserRepository $userRepository, $twilioSid, $twilioAuthToken, $twilioPhoneNumber)
    {
        $this->userRepository = $userRepository;
                $this->twilioClient = new Client($twilioSid, $twilioAuthToken);
    }

    public function register(array $data)
    {
        DB::beginTransaction();

        try {   
        
        $verificationCode = mt_rand(100000, 999999);

        $data['password'] = Hash::make($data['password']);

        $imagePath = $data['image']->store('images');

        $user = $this->userRepository->createUser([
            'mobile_number' => $data['mobile_number'],
            'password' => $data['password'] ?? null,
            'verification_code' => $verificationCode ?? null,
            'username' => $data['username'] ?? null,
            'location' => json_encode($data['location'] ?? null),
            'image' => $imagePath ?? null,
            'role' => $data['role'] ?? null,

        ]);
               $this->sendVerificationCode($data['mobile_number'], $verificationCode);
        DB::commit();

        return $user;
    } catch (\Exception $e) {
        DB::rollBack();
        throw $e;
    }
    }

    protected function sendVerificationCode($mobileNumber, $verificationCode)
    {


        $twilioClient = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));

        $message = $twilioClient->messages->create(
        // $mobileNumber 
         '+201027401686',         
            [
                'from' => '+12563048567',
                'body' => 'Your verification code is: ' . $verificationCode
            ]
        );
        
        if ($message->sid) {
            error_log('Message sent successfully');
        } else {
            error_log('Failed to send message');
        }
        
    }
    
    public function verifyOtp(array $data)
    {
        $user = $this->userRepository->findByMobileNumber($data['mobile_number']);
        
        if (!$user) {
            throw new \Exception('User not found');
        }
        
        if ($user->verification_code !== $data['verification_code']) {
            return false;
        }
        
        $user->verification_code = null;
        $user->save();
        
        return true; 
    }

    

    protected function generateJwtToken($user)
    {
        $token = auth()->login($user);
        return $token;
        
    }

    public function login(array $data)
    {
        $user = $this->userRepository->findByMobileNumber($data['mobile_number']);

        if (!$user) {
            throw new \Exception('User not found');
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid password');
        }
        $data=[
            'user' => new UserResource($user),
            'token' => $this->generateJwtToken($user),
        ];
        return $data;
    }
    public function getUserProfile($userId)
    {
        return $this->userRepository->getUserProfile($userId);
    }
}
