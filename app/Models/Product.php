<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
	protected $table = 'products';

    protected $fillable = [
        'name', 
        'category_id'
    ];

    protected static function booted()
    {
        static::addGlobalScope('notDeleted', function (Builder $builder) {
            $builder->where('deleted', 0);
        });
    }

	public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

	public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class, 'belong_id', 'id')->where('belong_name', 'product')->where('deleted', '0');
    }

    public function documentTitle()
	{
	    return $this->hasOne(Document::class, 'belong_id', 'id')->where('title', '1')->where('deleted', '0')->orderBy('id', 'desc');
	}

    public function productPrice()
    {
        return $this->hasOne(ProductSize::class, 'product_id', 'id')->orderBy('id', 'asc');
    }

    public function productSizes()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id')->orderBy('id', 'asc');
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class, 'product_id', 'id')->orderBy('id', 'asc');
    }

    public function productTags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

}

