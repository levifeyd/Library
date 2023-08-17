<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comment extends Model
{
    protected $fillable = [
        'text',
    ];
    public $timestamps = false;

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
