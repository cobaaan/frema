<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'payment_id', 'image_path', 'postcode', 'address', 'building'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}