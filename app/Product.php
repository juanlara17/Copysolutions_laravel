<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

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

    public function quantities()
    {
        return $this->belongsToMany(Quantity::class)->withTimestamps();
    }

    public function prices()
    {
        return $this->belongsToMany(Price::class)->withTimestamps();
    }

    public function presentPrice()
    {
        $usa = new \NumberFormatter("en-US", \NumberFormatter::CURRENCY);
        $formatted1 = $usa->formatCurrency($this->price, "USD");
        return $formatted1;
    }
}
