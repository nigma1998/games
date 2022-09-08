<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";



    public static array $allowedFields = ['id', 'image_url', 'total_time', 'exp', 'product_name', 'user', 'dat', 'button', 'identifier', 'chat_nps' ];

    public static  array $yonListt = ['name'];

    protected $fillable = [
      'user', 'product_name', 'total_time', 'exp', 'image_url', 'dat', 'button', 'identifier', 'chat_nps' 
    ];
}
