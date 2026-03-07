<?php

namespace App\Models;

use App\Policies\BookPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(BookPolicy::class)]
class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "title",
        "author",
        "price",
        "year",
        "limited"
    ];

    /*Relations */

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
