<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Favorite extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'product_id'];
    
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
