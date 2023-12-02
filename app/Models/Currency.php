<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Currency extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = ['name' , 'code' , 'status'];
    public $translatable = ['name' , 'code'];
}
