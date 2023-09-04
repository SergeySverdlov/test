<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

trait Notification
{
    public function userSendServices($resultPrice){
        foreach ($this->services as $service) {
            $service->sendNotif($resultPrice);
        }
    }
}
