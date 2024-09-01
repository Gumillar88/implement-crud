<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price', 'order_date'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function getTotalHargaHarian()
    {
        return self::whereDate('order_date', now()->toDateString())
            ->sum('total_price');
    }
}