<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model 
{
    use HasFactory;

    protected $table = 'books';
    public $timestamps = true;

    protected $fillable = array(
        'name', 'slug', 'image', 'description', 'content', 
        'timestamps'
    );
    protected $appends = ['images'];

    // public function book_category() {
    //     return $this->belongsTo(ProductCategory::class, 'book_category_id', 'id');
    // }

    public function getImageAttribute($value) {
        $images = json_decode($value, true);
        return $images[0] ?? "";
    }

    public function getImagesAttribute() {
        if(!empty($this->attributes["image"])) {
            return json_decode($this->attributes["image"], true);
        } else {
            return [];
        }
    }

}