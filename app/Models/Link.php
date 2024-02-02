<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_link',
        'short_link',
        'category_id',
        'visit_count',
        'user_id',
    ];

     // Define the relationship between Link and Category
     public function category()
     {
         return $this->belongsTo(Category::class);
     }

     public function user()
    {
        return $this->belongsTo(User::class);
    }

}
