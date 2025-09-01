<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $connection='mysql2';

    protected $fillable = [
        'user_id',
        'admin_id',
        'total_amount',
        'status',
        'complete_date'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
