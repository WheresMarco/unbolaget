<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_name_bold',
        'product_name_thin',
        'product_nr',
        'bottle_text',
        'is_organic',
        'is_ethical',
        'is_web_launch',
        'sell_start_date',
        'is_completely_out_of_stock',
        'is_temporary_out_of_stock',
        'alcohol_percentage',
        'volume',
        'price',
        'country',
        'origin_level_1',
        'origin_level_2',
        'vintage',
        'sub_category',
        'type',
        'style',
        'assortment_text',
        'beverage_description',
        'usage',
        'taste',
        'assortment',
        'is_news',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function producer()
    {
        return $this->belongsTo('App\Models\Producer');
    }
}
