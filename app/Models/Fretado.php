<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Fretado
 *
 * @property int $id
 * @property string $region nome da região
 * @property int $zipini CEP incial
 * @property int $zipfin CEP final
 * @property int $wini Peso inicial em kg
 * @property int $wfin Peso final em kg
 * @property int $value Valor do frete x 100
 * @property int $deadline Prazo de entrega em dias uteis
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereWfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereWini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereZipfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fretado whereZipini($value)
 * @mixin \Eloquent
 */
class Fretado extends Model
{
    use HasFactory;

    protected $table = 'fretados';
	public $timestamps = false;

	protected $fillable = [
		'region',
        'zipini',
        'zipfin',
        'wini',
        'wfin',
        'value',
		'deadline'
	];

}
