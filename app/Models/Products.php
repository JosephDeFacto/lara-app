<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "price", "image"];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
