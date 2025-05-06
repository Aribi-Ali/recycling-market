<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller{

    public function markAsRead($notificationId){
        $notification = auth()->user()->notifications()->findOrFail($notificationId);
        $notification->markAsRead();
    }
}
