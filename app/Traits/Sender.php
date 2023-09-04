<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

trait Sender
{
    public function sendNotif($resultPrice){
        switch ($this->service_name) {
            case 'telegram':
//                dd($this->contact_info, $resultPrice);
            case 'email':
//                dd($this->contact_info, $resultPrice);
            case 'whatsapp':
//                dd($this->contact_info, $resultPrice);
        }
    }
}
