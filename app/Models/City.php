<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name nomne da cidade
 * @property string $code Códigos dos municípios IBGE
 * @property int $state_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \App\Models\State $state
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereStateId($value)
 * @mixin \Eloquent
 */
class City extends Model
{
	//public $with = ['state'];
	protected $table = 'cities';
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int'
	];

	protected $fillable = [
		'name',
		'code',
		'state_id'
	];

	public function state()
	{
		return $this->belongsTo(State::class, 'state_id');
	}

	public function addresses()
	{
		return $this->hasMany(Address::class, 'city_id');
	}
}
