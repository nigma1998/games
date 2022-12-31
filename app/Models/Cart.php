<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";



    public static array $allowedFields = ['id', 'image_url', 'total_time', 'exp', 'product_name', 'updated_at', 'user', 'dat', 'button', 'identifier', 'chat_nps' ];

    public static  array $yonListt = ['updated_at'];

    public static  array $yonLi = ['total_time'];

    protected $fillable = [
      'user', 'product_name', 'total_time', 'exp', 'image_url', 'dat', 'button', 'identifier', 'chat_nps', 'updated_at',
    ];
}
