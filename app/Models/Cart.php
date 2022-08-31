<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";



    public static array $allowedFields = ['id', 'image_url', 'price', 'exxp', 'product_name', 'user', 'dat', 'button' ];

    public static  array $yonListt = ['name'];

    protected $fillable = [
      'user', 'product_name', 'price', 'exxp', 'image_url', 'dat', 'button'
    ];
}
