<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['name', 'slug', 'description', 'extract', 'image', 'visible', 'price', 'category_id', 'visits', 'sales', 'quantity', 'percent_promo', 'state', 'slide_principal'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function dimensions()
    {
        return $this->belongsToMany(Dimension::class)->withTimestamps();
    }
}
