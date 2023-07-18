<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\OrderProduct
 *
 * @property int $id
 * @property string $sku sku do produto
 * @property string $product_description descrição do produto
 * @property string $base_currency moeda do pagamento
 * @property int $unitary_price valor unitário do produto
 * @property int $amount quantidade comprada de produto
 * @property int $base_total valor total dos produtos
 * @property int $discount_percent valor do desconto em percentual
 * @property string|null $additional informação acicional
 * @property int $order_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereBaseTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUnitaryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderProduct extends Model
{
    public $with = ['product'];
    protected $table = 'order_products';

    protected $hidden = [

        'id',
        'order_id',
        'product_id'

    ];

    protected $casts = [
        'amount' => 'int',
        'unitary_price' => 'int',
        'base_total' => 'int',
        'discount_percent' => 'int',
        'order_id' => 'int',
        'product_id' => 'int'
    ];

    protected $fillable = [
        'product_description',
        'amount',
        'unitary_price',
        'base_currency',
        'base_total',
        'discount_percent',
        'product_type',
        'additional',
        'order_id',
        'product_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
