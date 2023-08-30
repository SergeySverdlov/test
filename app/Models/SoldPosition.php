<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldPosition extends Model
{
    protected $fillable = [
        'user_id',
        'goods_id',
        'order_id',
        'count',
        'price',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function goods(){
        return $this->hasOne(Good::class, 'id', 'goods_id');
    }
    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    use HasFactory;
}
