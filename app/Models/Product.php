<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model 
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'productname',
        'price',
        'discount',
        'description',
        'title',
        'image',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];
}
