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

}
