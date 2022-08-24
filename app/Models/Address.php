<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $type
 * @property string|null $postcode codigo postal
 * @property string|null $street endereço
 * @property string|null $number numero
 * @property string|null $neighborhood bairro
 * @property string|null $complement complemento
 * @property int $client_id
 * @property int|null $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereComplement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNeighborhood($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
	
	public $with = ['city'];
	protected $table = 'addresses';

	protected $casts = [
		'client_id' => 'int',
		'city_id' => 'int'
	];

	protected $fillable = [
		'type',
		'postcode',
		'street',
		'number',
		'neighborhood',
		'complement'
	];


	public function city()
	{
		return $this->belongsTo(City::class, 'city_id');
	}


	public function client()
	{
		return $this->belongsTo(Client::class, 'client_id');
	}


	
}
