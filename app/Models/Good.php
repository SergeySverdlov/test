<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
        'name',
        'price',
        'count',
    ];

    public function SoldPosition(){
        return $this->belongsTo(SoldPosition::class, 'id', 'good_id');
    }

    use HasFactory;
}
