<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $status
 * @property string|null $method forma de pagamento
 * @property int|null $base_currency moeda do pagamento
 * @property int|null $value valor a ser pago
 * @property int|null $parcel numero de parcelas
 * @property \Illuminate\Support\Carbon $due_date data de vencimento
 * @property \Illuminate\Support\Carbon|null $payment_date data do vencimento
 * @property string|null $note obs complementar o pagamento
 * @property int $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereParcel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereValue($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
	protected $table = 'payments';

	protected $casts = [
		'value' => 'int',
		'base_currency' => 'int',
		'orders_id' => 'int'
	];

	protected $dates = [
		'due_date',
		'payment_date'
	];

	protected $fillable = [
		'status',
		'method',
		'value',
		'parcel',
		'due_date',
		'payment_date',
		'note',
		'base_currency'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'order_id');
	}
}
