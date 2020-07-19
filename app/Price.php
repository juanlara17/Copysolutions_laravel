<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    protected $fillable = ['price'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
