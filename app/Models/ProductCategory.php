<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    // Get subcategories
    public function subcategories()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id');
    }

    // Get parent category
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }
}
