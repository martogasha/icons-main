<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode',
        'product_name',
        'profit',
        'loss',
        'quantity',
        'number_of_pack',
        'selling_price',
        'total',
        'order_id',
        'date',
        'image',
    ];
}
