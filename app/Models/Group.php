<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Image;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $sku codigo unico do grupo de produto
 * @property string $name nome do grupo que aparece no anuncio
 * @property string $slug nome que aparece na url do anuncio
 * @property string|null $packing_format formato da embalagem
 * @property int $qty_ship quantidade enviada pelo mesmo valor de frete
 * @property int|null $grossweight preso bruto em gramas
 * @property int|null $netweight peso liquido em gramas
 * @property int|null $packing_length comprimento da embalagem em mm
 * @property int|null $packing_width largura da embalagem em mm
 * @property int|null $packing_height altura da embalagem em mm
 * @property int|null $product_length comprimento do produto em mm
 * @property int|null $product_width largura do produto em mm
 * @property int|null $product_height altura do produto em mm
 * @property string|null $description descrição do produto
 * @property string|null $description_short descrição curta do produto
 * @property string|null $description_long descrição longa do produto
 * @property string|null $technical_features dados técnicos do produto
 * @property int $order ordem em que o grupo que aparece no anuncio
 * @property int $active 1 se aparece para venda
 * @property int $seller_id
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Product[] $products
 * @property-read int|null $products_count
 * @property-read Seller $sellers
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescriptionLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescriptionShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGrossweight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereNetweight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePackingWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProductHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProductLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProductWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereQtyShip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSellerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTechnicalFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    
    //public $with = ['images', 'products'];

    protected $table = 'groups';

    protected $casts = [
        'grossweight' => 'int',
        'netweight' => 'int',
        'packing_length' => 'int',
        'packing_width' => 'int',
        'packing_height' => 'int',
        'product_length' => 'int',
        'product_width' => 'int',
        'product_height' => 'int',
        'qty_ship' => 'int',
        'category_id' => 'int',
        'seller_id' => 'int',
        'active' => 'int',
        'order' => 'int',
    ];

    protected $fillable = [
        'sku',
        'slug',
        'name',
        'description',
        'description_short',
        'description_long',
        'technical_features',
        'active',
        'qty_ship',   
        'packing_format',
        'grossweight',
        'netweight',
        'packing_length',
        'packing_width',
        'packing_height',
        'product_length',
        'product_width',
        'product_height',
        'order',
        'category_id',
    ];


    protected $attributes = [
        'seller_id' => 1,
    ];

    public function sellers()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function images()
    {
        return $this->hasMany(Image::class, 'group_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'group_id');
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

}
