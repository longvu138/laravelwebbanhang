<?php

namespace App\Models;

use App\Traits\HandleUploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HandleUploadImage;

    protected $fillable = [
        'name',
        'description',
        'sale',
        'price'

    ];

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getBy($dataSearch, $categoryId)
    {
        return $this->whereHas('categories', fn ($q) => $q->where('category_id', $categoryId))->paginate(10);
    }
}
