<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Ticket extends Model
{

    protected $fillable = [
        'name',
        'stock',
        'price',
        'description'
    ];

    public function orderDetails(): MorphMany
    {
        return $this->morphMany(OrderDetail::class, 'item');
    }
}
