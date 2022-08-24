<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\Carrier
 *
 * @property int $id
 * @property string $name nome ou razão social do entregador
 * @property string|null $contact nome do contato
 * @property string|null $Phone telefone de contato
 * @property string|null $email email de contato
 * @property string|null $cell celular de contato
 * @property-read Collection|\App\Models\Shipment[] $shipments
 * @property-read int|null $shipments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereCell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Carrier wherePhone($value)
 * @mixin \Eloquent
 */
class Carrier extends Model
{
	protected $table = 'carriers';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'contact',
		'Phone',
		'email'
	];

	public function shipments()
	{
		return $this->hasMany(Shipment::class, 'carrier_id');
	}
}
