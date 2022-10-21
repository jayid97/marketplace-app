<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'seller_id',
        'comment',
        'star'
    ];
    

    function item()
    {
        return $this->hasOne(Item::class);
    }

    function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id','id');
    }

    function seller()
    {
        return $this->belongsTo(User::class, 'seller_id','id');
    }

}
