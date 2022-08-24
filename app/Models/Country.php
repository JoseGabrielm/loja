<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name nome do pais
 * @property string $initials abreviatura do pais
 * @property-read Collection|\App\Models\State[] $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
	protected $table = 'countries';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'initials'
	];

	public function states()
	{
		return $this->hasMany(State::class, 'country_id');
	}
}
