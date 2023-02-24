<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'date_release',
        'description',
        'file',
    ];

    public function category()
    {
        return $this->belongsTo(CategoryMovie::class, 'category_id');
    }
}
