<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $description descrição da categoria
 * @property string|null $image url da imagem da categoria
 * @property-read Collection|\App\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
	protected $table = 'categories';
	public $timestamps = false;

	protected $fillable = [
		'description',
		'image'
	];

	public function groups()
	{
		return $this->hasMany(Group::class, 'category_id');
	}
}
