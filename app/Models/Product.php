<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $sku codigo unico do produto
 * @property string $name nome do produto que aparece no anuncio
 * @property string|null $slug nome que aparece na url do anuncio
 * @property string|null $color cor de destaque do produto
 * @property string|null $base_currency moeda do pagamento
 * @property int $price preço de venda do anuncio x 100
 * @property int $price_max preço máximo do anuncio x 100
 * @property int $stock Quantidade em estoque do produto
 * @property string|null $image url da imagem principal do produto
 * @property int $order ordem em que aparece no anuncio
 * @property int|null $active 1 se aparece para venda
 * @property int $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Avaliation[] $avaliations
 * @property-read int|null $avaliations_count
 * @property-read \App\Models\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderProduct[] $order_products
 * @property-read int|null $order_products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePriceMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    //public $with = ['group'];
    
    protected $table = 'products';

    protected $casts = [
        'price' => 'int',
        'price_max' => 'int',
        'stock' => 'int',
        'group_id' => 'int',
        'active' => 'int',
        'order' => 'int',
    ];

    protected $fillable = [
        'sku',
        'slug',
        'name',
        'color',
        'active',
        'base_currency',
        'price',
        'price_max',
        'image',
        'stock',
        'order',
        'group_id',
    ];



    public function avaliations()
    {
        return $this->hasMany(Avaliation::class);
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name, '-');
        });
    }

    //public function getRouteKeyName()
    //{
    //    return 'slug';
    //}

    public function getPriceAttribute($value)
    {
        return $value/100;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value*100;
    }

    public function getPriceMaxAttribute($value)
    {
        return $value/100;
    }

    public function setPriceMaxAttribute($value)
    {
        $this->attributes['price_max'] = $value*100;
    }

}
