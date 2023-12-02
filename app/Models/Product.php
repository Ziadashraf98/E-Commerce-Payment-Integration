<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = ['title' , 'description' , 'image' , 'category_id' , 'quantity' , 'price' , 'discount_price'];
    public $translatable = ['title' , 'description'];
    
    // public function getImageAttribute($value)
    // {
    //     return asset('images/products/'.$value);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
