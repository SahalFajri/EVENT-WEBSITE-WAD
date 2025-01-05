<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'merchandise_id', 'quantity'];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class);
    }
}
