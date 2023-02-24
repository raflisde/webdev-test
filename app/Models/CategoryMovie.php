<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function movie()
    {
        return $this->hasMany(Movies::class, 'category_id');
    }
}
