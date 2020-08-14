<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_code',
        'slug',
        'buy_price',
        'current_price',
        'quantity_in_stock',
        'description',
        'sale_off',
        'brand_id',
        'properties',
    ];

    protected $casts = [
        'properties' => Json::class,
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function inOrder()
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id')
            ->withPivot('price', 'quantity_ordered');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getThumb($src)
    {
        return preg_replace('#(.*)(\/)(.*)$#', '$1/thumbs/$3', $src);
    }

    public function allThumbs($items, $join = true)
    {
        $result = [];
        foreach ($items as $item) {
            $result[] = $item->image;
        }
        if ($join) {
            $result = implode(',', $result);
        }
        return $result;
    }

    public function money_format($quantity= 1, $price = null, $multiply = 1000)
    {
        $price = ($price) ? $price : $this->current_price;
        return number_format(($quantity*$price*$multiply), 0, ',', '.');
    }

    public function cartQuantity()
    {
        $quantity = session()->get('cart-quantity');
        if (!empty($quantity) && array_key_exists($this->id, $quantity)) {
            return $quantity[$this->id];
        }
    }

    public function getTotalSales()
    {
        $sales = \DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('status', Order::STT['completed'])
            ->where('product_id', $this->id)
            ->sum('quantity_ordered');
        return $sales;
    }

    public function getTotalAmount()
    {
        $total = \DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('status', Order::STT['completed'])
            ->where('product_id', $this->id)
            ->sum(\DB::RAW('quantity_ordered * price'));
        return $total;
    }
}
