<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'content',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
