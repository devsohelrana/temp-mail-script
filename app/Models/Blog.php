<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'image',
        'content',
        'slug',
        'category_id',
        'meta',
        'header',
        'lang',
        'short_description',
        'seo_keyword',
        'seo_title',
        'seo_description',
    ];

    public function category() {
        if ($this->category_id) {
            return Category::where('id', $this->category_id)->first();
        }
        return null;
    }

    
}
