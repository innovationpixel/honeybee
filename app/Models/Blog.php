<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function document()
    {
        return $this->hasOne(Document::class, 'belong_id', 'id')->where('belong_name', 'blog_image')->where('deleted', '0');
    }
}
