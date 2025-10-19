<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TagCategory extends Model
{
    protected $table = 'tag_categories';

    public function tag()
    {
        return $this->hasMany(Tag::class, 'category_id', 'id');
    }
}
