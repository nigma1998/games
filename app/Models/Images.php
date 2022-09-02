<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = "images";



    public static array $allowedFields = ['id', 'image_url', 'path', 'total_time', 'button', 'exp', 'product_name' ];

    protected $fillable = [
      'product_name', 'total_time', 'exp', 'image_url'
    ];
}
