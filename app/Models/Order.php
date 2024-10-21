<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Mass-assignable attributes
    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order items associated with the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
