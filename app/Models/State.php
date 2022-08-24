<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\State
 *
 * @property int $id
 * @property string $name nome do estado
 * @property string $initials sigla do estado
 * @property int $country_id
 * @property-read Collection|\App\Models\City[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\Country $country
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @mixin \Eloquent
 */
class State extends Model
{
	protected $table = 'states';
	public $timestamps = false;

	protected $casts = [
		'country_id' => 'int'
	];

	protected $fillable = [
		'name',
		'initials',
		'country_id'
	];

	public function country()
	{
		return $this->belongsTo(Country::class, 'country_id');
	}

	public function cities()
	{
		return $this->hasMany(City::class, 'state_id');
	}
}
