<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'content',
        'created_by',
        'updated_by'
    ];
}
