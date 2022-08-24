<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $type
 * @property string|null $contact nome do contato
 * @property string $description numero ou email ou outro valor
 * @property int $client_id
 * @property-read \App\Models\Client $client
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereType($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
	protected $table = 'contacts';
	public $timestamps = false;

	protected $casts = [
		'clients_id' => 'int'
	];

	protected $fillable = [
		'type',
		'contact',
		'description'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'client_id');
	}
}
