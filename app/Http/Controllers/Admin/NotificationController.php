<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirebaseNotificationService;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Messaging\CloudMessage;


class NotificationController extends Controller
{
    public function create()
    {
        return view('admin.notifications.create');
    }

    protected $firebaseService;

    public function __construct(FirebaseNotificationService $firebaseService)
    {
        $this->firebaseService = $firebaseService;
    }

    public function send(Request $request)
    {
        $title = "title";
        $body = "body";
        $userId = "1";
        $this->firebaseService->sendNotificationToUser($userId, $title, $body);

        return redirect()->back();
    }
}
