<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $status
 * @property int $base_currency moeda do pagamento
 * @property int|null $ship_value valor total do frete do produto
 * @property int|null $total valor total dos produtos
 * @property int|null $ship_deadline prazo de entrega
 * @property string|null $ship_form forma de envio dos produtos
 * @property string|null $ship_zip CEP do endereço de entrega do produto
 * @property string|null $doc_type CPF, CNPJ
 * @property string|null $doc_number numero do documento do comprador
 * @property string|null $coupon_code codigo do cupom de desconto
 * @property int|null $discount valor do desconto dado na compra
 * @property int|null $sub_total valor total do produto mais o frete
 * @property int|null $grand_total valor do produto, mais o frete, menos o desconto
 * @property string|null $payby boleto, deposito, cartão
 * @property string|null $url_pay código para url do pagamento gerado
 * @property string|null $payment_code Código que identifica o pagamento
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderProduct[] $order_products
 * @property-read int|null $order_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shipment[] $shipments
 * @property-read int|null $shipments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDocNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDocType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereShipZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUrlPay($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    public $with = ['order_products'];

    protected $hidden = [
        'created_at',
        'updated_at',


    ];


    protected $table = 'orders';

    protected $casts = [
        'total' => 'int',
        'unitary_value' => 'int',
        'base_currency' => 'int',
        'ship_value' => 'int',
        'ship_deadline' => 'int',
        'ship_address' => 'int',
        'discount' => 'int',
        'sub_total' => 'int',
        'grand_total' => 'int',
        'clients_id' => 'int'
    ];

    protected $fillable = [
        'status',
        'total',
        'unitary_value',
        'base_currency',
        'ship_deadline',
        'ship_form',
        'ship_value',
        'ship_zip',
        'doc_type',
        'doc_number',
        'coupon_code',
        'discount',
        'sub_total',
        'grand_total',
        'payby',
        'url_pay',
        'payment_code',
        'idmetodo_metodo',
        'idbandeira_bandeira'

    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id');
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'order_id');
    }

    public function scopeRelationsJson(Builder $query)
    {

        return  $query->with([
            'client' => function ($query) {
                $query->select(
                    'id',
                    'name',
                    'is_company',
                    'doc_ssn',
                    'doc_country',
                    'doc_state',
                    'birthday',
                    'is_verified',
                    'note'
                );
            }, 'order_products' => function ($query) {

                $query->select('id', 'sku', 'order_id', 'product_id')
                    ->with(['product' => function ($query) {

                        $query->select('id', 'sku', 'name');
                    }]);
            },
            'shipments'
        ]);
    }
}
