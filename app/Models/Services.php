<?php

namespace App\Models;

use App\Traits\Sender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use Sender;
    protected $fillable = [
        'user_id',
        'service_name',
        'contact_info'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    use HasFactory;
}
