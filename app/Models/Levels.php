<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Levels extends Model
{
    // $fillable berfungsi agar kolom yang masuk didalamnya bisa dimasukkan data
    protected $fillable=['name'];
}
