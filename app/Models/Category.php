<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->where('deletd', 0);
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id')->where('deleted', 0);
    }
}
