<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = [
        "user_id",
        "title",
        "image",
        "content"
    ];
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
