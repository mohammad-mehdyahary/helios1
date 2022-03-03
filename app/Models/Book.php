<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'city',
        'city1',
        'address',
        'zip',
        'price'
    ];
}
