<?php

namespace App\Services;

use App\Models\User;
use Kreait\Firebase\Contract\Messaging as ContractMessaging;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Kreait\Laravel\Firebase\Facades\Firebase;



class FirebaseNotificationService
{
    protected $messaging;

    public function __construct(ContractMessaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function sendNotificationToUser($userId, $title, $body)
    {
        $message = \Kreait\Firebase\Messaging\CloudMessage::new()
            ->withNotification(\Kreait\Firebase\Messaging\Notification::create($title, $body))
            ->withData(['key' => 'value']); 
        $this->messaging->send($message, $userId);
    }
}