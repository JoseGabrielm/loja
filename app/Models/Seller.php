<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Seller
 *
 * @property int $id
 * @property string $name nome do vendedor
 * @property string|null $description dados do vendedor
 * @property-read Collection|\App\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seller whereName($value)
 * @mixin \Eloquent
 */
class Seller extends Model
{
	protected $table = 'sellers';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description'
	];

	public function groups()
	{
		return $this->hasMany(Group::class, 'seller_id');
	}
}
