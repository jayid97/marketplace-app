<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'image_name',
        'buyer_id',
        'price',
        'location',
        'rating_id',
        'status',
        'payment_gateway_status'
    ];

    function rating(){
        return $this->belongsTo(Rating::class , 'rating_id' , 'id');
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'payment_gateway_status' => 'json',
     ];

}
