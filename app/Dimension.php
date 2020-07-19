<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $table = 'dimensions';

    protected $fillable = ['dimension'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
