<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = "images";



    public static array $allowedFields = ['id', 'image_url', 'path', 'price', 'button', 'exxp', 'product_name' ];

    protected $fillable = [
      'product_name', 'price', 'exxp', 'image_url'
    ];
}
