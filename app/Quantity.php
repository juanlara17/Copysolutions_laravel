<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $table = 'quantities';

    protected $fillable = ['quantity'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
