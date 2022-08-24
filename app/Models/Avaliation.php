<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Avaliation
 *
 * @property int $id
 * @property int|null $avaliation local para o clienter colocar um texto de avaliação
 * @property string $note nota de 0 a 5 para o produto
 * @property bool $active true se o comentario vai aparacer no anuncio
 * @property int $client_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereAvaliation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avaliation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Avaliation extends Model
{
	protected $table = 'avaliations';

	protected $casts = [
		'avaliation' => 'int',
		'active' => 'bool',
		'client_id' => 'int',
		'products_id' => 'int'
	];

	protected $fillable = [
		'avaliation',
		'note',
		'active'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id');
	}
}
