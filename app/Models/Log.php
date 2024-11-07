<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'email',
        'password',
        'recoveryMail',
    ];

    public function scopeKeywords($query, $keywords)
    {
        if ($keywords)
        {
            $keywords = strtolower($keywords);
            $query->where('email', 'like', '%' . $keywords . '%')
                ->orWhere('recoveryMail', 'like', '%' . $keywords . '%');
        }

        return $query;
    }
}
