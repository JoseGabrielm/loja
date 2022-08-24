<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Jadlog
 *
 * @property int $id
 * @property string $region nome da região
 * @property int $zipini CEP incial
 * @property int $zipfin CEP final
 * @property int $wini Peso inicial em kg
 * @property int $wfin Peso final em kg
 * @property int $value Valor do frete x 100
 * @property int $deadline Prazo de entrega em dias uteis
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereWfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereWini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereZipfin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jadlog whereZipini($value)
 * @mixin \Eloquent
 */
class Jadlog extends Model
{
    use HasFactory;

    protected $table = 'jadlogs';
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
