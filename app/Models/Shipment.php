<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Shipment
 *
 * @property int $id
 * @property string $status
 * @property string $sku sku do produto
 * @property string $nome nome do produto
 * @property string $base_currency moeda do pagamento
 * @property int $price_prod preço de venda do produto
 * @property int $total_qty quantidade por embalagem
 * @property int $total_weight peso em gramas unitario da embalgem do produto comprado
 * @property string $packing_width largura em mm da embalagem do produto comprado
 * @property string $packing_height altura em mm da embalagem do produto comprado
 * @property string $packing_lenght comprimento em mm da embalagem do produto comprado
 * @property string|null $track_number coodigo de rastreio
 * @property string|null $contact dados para entrar em contato o cliente
 * @property string|null $additional informações adicionais de envio
 * @property string|null $postcode codigo postal
 * @property string|null $address endereço de entrega
 * @property string|null $number numero da entrega
 * @property string|null $neighborhood bairro da entrega
 * @property string|null $complement dados complementares da entrega
 * @property int $order_id
 * @property int $carrier_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Carrier $carrier
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereAdditional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCarrierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePackingHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePackingLenght($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePackingWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment wherePriceProd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereTotalQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereTotalWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereTrackNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Shipment extends Model
{
    protected $table = 'shipments';

    protected $casts = [
        'price_prod' => 'int',
        'total_qty' => 'int',
        'total_weight' => 'int',
        'email_sent' => 'bool',
        'order_id' => 'int',
        'carrier_id' => 'int'
    ];

    protected $fillable = [
        'status',
        'sku',
        'order_id',
        'carrier_id',
        'description',
        'price_prod',
        'total_qty',
        'total_weight',
        'packing_width',
        'packing_height',
        'packing_lenght',
        'track_number',
        'email_sent',
        'additional',
        'type',
        'postcode',
        'address',
        'number',
        'neighborhood',
        'complement'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function carrier()
    {
        return $this->belongsTo(Carrier::class, 'carrier_id');
    }
}
