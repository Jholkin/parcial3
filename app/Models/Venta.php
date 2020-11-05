<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\ConvertMoney\Entities\Convert;

class Venta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product',
        'price_total',
        'salesman'
    ];

    public function convert($product)
    {
        $convert = new Convert();
        $price = $product->price_total;
        //dd($price);
        $new_price = $convert->convert($price);
        //dd($new_price);
        return $new_price;
    }
}
