<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{

    protected $fillable = [
        'name',
        'stock',
        'price',
        'description',
        'is_available',
    ];

    public function orderTicketDetails(): HasMany
    {
        return $this->hasMany(OrderTicketDetail::class);
    }
}
