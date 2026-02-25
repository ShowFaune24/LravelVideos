<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //Relations

    public function book(){
        return $this->hasOne(Book::class);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
