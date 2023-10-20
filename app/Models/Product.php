<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'count', 'seller_id', 'profile' , 'description', 'price', 'discount'];

    public function seller()
    {
         return  $this->belongsTo(User::class, 'seller_id', 'id');
    }
}
