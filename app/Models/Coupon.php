<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $code código do cupom
 * @property string $base_currency moeda do pagamento
 * @property int $value valor do desconto em moeda
 * @property int $percent valor do desconto em percentagem
 * @property \Illuminate\Support\Carbon $times_expire data da expiração da promoção
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereBaseCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereTimesExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereValue($value)
 * @mixin \Eloquent
 */
class Coupon extends Model
{
	protected $table = 'coupons';

	protected $casts = [
		'value' => 'int',
		'percent' => 'int',
		'clients_id' => 'int'
	];

	protected $dates = [
		'times_expire'
	];

	protected $fillable = [
		'type',
		'code',
		'value',
		'percent',
		'times_expire',
		'clients_id'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client_id');
	}
}
