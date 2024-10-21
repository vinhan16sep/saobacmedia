<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_category';
    public $timestamps = true;

    protected $fillable = [
        'image',
        'parent_id',
        'name',
        'slug',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
