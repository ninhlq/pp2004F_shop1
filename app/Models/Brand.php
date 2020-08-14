<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getTotalSales()
    {
        $products = \DB::table('products')->where('brand_id', $this->id)->pluck('id');
        $sales = \DB::table('order_details')->whereIn('product_id', $products)->sum('quantity_ordered');
        return $sales;
    }

    public function getTotalAmount()
    {
        $products = \DB::table('products')->where('brand_id', $this->id)->pluck('id');
        $sales = \DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->where('status', Order::STT['completed'])
            ->whereIn('product_id', $products)
            ->sum(\DB::raw('quantity_ordered * price'));
        return $sales;
    }
}
