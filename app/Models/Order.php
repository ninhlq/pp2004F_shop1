<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
        'comment',
        'ship_to_address',
    ];

    public $timestamp = 'created_at';
    const UPDATED_AT = null;

    public const STT = [
        'pending'       => 1, // Order created, no payment initiated. Awaiting payment
        'on_hold'       => 2, // Awaiting payment – stock is reduced
        'prepaided'     => 3, // Pre-paided. Payment Received but not shipped yet
        'on_shipping'   => 4, // Awaiting payment at shipping address
        'shipped'       => 5, // Payment received, shipped but need to confirm
        'failed'        => 6, // Payment failed or was declined (unpaid) or requires authentication (SCA)
        'canceled'      => 7, // Canceled by an admin or the customer – stock is increased
        'completed'     => 8, // Order fulfilled and completed – requires no further action
        'refunded'      => 9, // Refunded by an admin – no further action required
    ];

    public function orderedProducts()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')
            ->withPivot('price', 'quantity_ordered');
    }

    public function log()
    {
        return $this->hasMany(OrderLog::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function getAmount($tax = false)
    {
        $total = 0;
        foreach($this->orderedProducts as $product) {
            $total += $product->pivot->price * $product->pivot->quantity_ordered;
        }
        if ($tax) {
            return $total * 1.1;
        }
        return $total;
    }

    public function textStatus($stt = null)
    {
        if (empty($stt)) {
            $stt = $this->status;
        }
        switch($stt) {
            case (1): 
                return 'Pending';
            case (2): 
                return 'On Hold';
            case (3): 
                return 'Pre-paided';
            case (4): 
                return 'On Shipping';
            case (5): 
                return 'Shipped';
            case (6): 
                return 'Failed';
            case (7): 
                return 'Canceled';
            case (8): 
                return 'Completed';
            case (9): 
                return 'Refunded';
        }
    }

}
