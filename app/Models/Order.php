<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'date',
        'time',
        'small_pizza',
        'medium_pizza',
        'large_pizza',
        'body',
        'status',
        'user_id',
        'pizza_id',
        'phone',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function pizza()
    {
        return $this->belongsTo(Pizza::class,'pizza_id','id');
    }
}
