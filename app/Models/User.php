<?php

namespace App\Models;

use App\Traits\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notification;
    protected $fillable = [
        'name',
    ];

    public function services(){
        return $this->hasMany(Services::class, 'user_id', 'id');
    }

    use HasFactory;
}
