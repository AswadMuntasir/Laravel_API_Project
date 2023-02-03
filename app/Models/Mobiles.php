<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobiles extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'brand', 'color', 'storage', 'price'];
}
