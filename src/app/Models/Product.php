<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['seller_id', 'buyer_id', 'condition_id', 'brand_id', 'name', 'image_path', 'price', 'description'];
    
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
    
    public function condition()
    {
        return $this->hasMany(Condition::class);
    }
    
    public function user()
    {
        return $this->hasMany(User::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
    
    public function comment()
    {
        return $this->belongsToMany(Comment::class);
    }
}
