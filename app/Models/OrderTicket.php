<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderTicket extends Model
{
    protected $table = 'orders_tickets';

    protected $fillable = [
        'user_id',
        'status',
        'notes',
        'snap_token',
        'gross_amount'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(OrderTicketDetail::class);
    }
}
