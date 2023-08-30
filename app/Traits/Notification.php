<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

trait Notification
{
    public function emailSend($resultPrice){
        $profile = $this->profile;
        if($profile->email){
            //send on email
        }
        if($profile->whatsapp){
            //send on whatsapp
        }
    }
}
