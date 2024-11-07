<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'meta',
        'header',
        'lang',
    ];


    public function hasBlog() {
        if (Blog::where('category_id', $this->id)->count() > 0) {
            return true;
        }
        return false;
    }

    public function getChild() {
        return Blog::where('category_id', $this->id)->get();
    }

}
