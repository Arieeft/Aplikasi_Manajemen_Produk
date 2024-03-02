<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //biar field(image, title, content) bisa di isi
    protected $fillable = [
        'name',
        'desc',
        'price',
        'stock'
    ];
}
