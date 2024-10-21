<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBanner extends Model
{
    use HasFactory;

    protected $table = 'sub_banner';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
        'link',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
