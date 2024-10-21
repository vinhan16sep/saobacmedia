<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeCategory extends Model
{
    use HasFactory;

    protected $table = 'knowledge_category';
    public $timestamps = true;

    protected $fillable = [
        'image',
        'name',
        'slug',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];
}
