<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    use HasFactory;

    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = array(
        'product_main_category_id',
        'product_category_id',
        'name', 'slug', 'image', 'description', 'content', 'content2', 
        'price', 'discount_price',
        'is_active', 'is_highlight', 
        'timestamps'
    );
    protected $appends = ['images'];

    public function product_category() {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

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