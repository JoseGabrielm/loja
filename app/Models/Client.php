<?php

namespace App\Models;

use DateTime;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name nome ou razão social do cliente
 * @property string|null $fantasy nome fantasia do cliente
 * @property string|null $contact nome de contato ou de quem recebe
 * @property bool|null $is_company true se for pessoa juridica
 * @property string|null $doc_ssn cpf
 * @property string|null $doc_country CNPJ
 * @property string|null $doc_state inscrição estadual
 * @property string|null $doc_city inscrição municipal
 * @property \Illuminate\Support\Carbon|null $birthday data de nascimento
 * @property bool|null $is_active true se for liberada a compra
 * @property bool|null $news_letter true se desejar receber anuncios
 * @property bool|null $is_verified true se os dados foram verificados
 * @property string|null $note informação complementar do cliente
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read int|null $addresses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Avaliation[] $avaliations
 * @property-read int|null $avaliations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Contact[] $contacts
 * @property-read int|null $contacts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocSsn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereDocState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereFantasy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNewsLetter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 * @mixin \Eloquent
 */
class Client extends Model
{
	//public $with = ['addresses', 'avaliations', 'contacts', 'coupons', 'orders'];

	protected $table = 'clients';

	protected $casts = [
		'is_company' => 'bool',
		'is_active' => 'bool',
		'news_letter' => 'bool',
		'is_verified' => 'bool',
		'user_id' => 'int'
	];

	protected $dates = [
		'birthday'
	];

	protected $fillable = [
		'name',
		'fantasy',
		'contact',
		'is_company',
		'doc_ssn',
		'doc_country',
		'doc_state',
		'doc_city',
		'gender',
		'birthday',
		'is_active',
		'news_letter',
		'is_verified',
		'note',
		'user_id'
	];


	public function addresses()
	{
		return $this->hasMany(Address::class);
	}


	public function avaliations()
	{
		return $this->hasMany(Avaliation::class);
	}


	public function contacts()
	{
		return $this->hasMany(Contact::class);
	}


	public function coupons()
	{
		return $this->hasMany(Coupon::class, 'client_id');
	}


	public function orders()
	{
		return $this->hasMany(Order::class, 'client_id');
	}


	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}


	public function getBirthdayAttribute($date)
    {
		if (!$date instanceof DateTime) {
			$date = new DateTime($date);
		  }
        return date_format($date, 'd/m/Y');
    }

	public function setBirthdayAttribute($date)
    {
		$date = str_replace('/', '-', $date);
		$dateNew = new DateTime($date);
        $dateNew->format('Y-m-d');
        $this->attributes['birthday'] = $dateNew;
    }


	public function getDocSsnAttribute($doc_ssn)
    {
		if (strlen($doc_ssn) == 11) {
		return substr($doc_ssn, 0, 3) . '.' . substr($doc_ssn, 3, 3) . '.' . substr($doc_ssn, 6, 3) . '-' . substr($doc_ssn, 9);
		}
	}


	public function setDocSsnAttribute($doc_ssn)
    {
		$doc_ssn =  preg_replace('/[^0-9]/', '', $doc_ssn);
		$this->attributes['doc_ssn'] = '';
		if (strlen($doc_ssn) == 11) {
			$this->attributes['doc_ssn'] = $doc_ssn;
		}
	}


	public function getDocCountryAttribute($doc_country)
    {
		if (strlen($doc_country) == 14) {
            return substr($doc_country, 0, 2) . '.' . substr($doc_country, 2, 3) . '.' . substr($doc_country, 5, 3) . '/' . substr($doc_country, 8, 4) . '-' . substr($doc_country, 12, 2);
        }
	}


	public function setDocCountryAttribute($doc_country)
    {
		$doc_country = preg_replace('/[^0-9]/', '', $doc_country);
		$this->attributes['doc_country'] = '';
		if (strlen($doc_country) == 14) {
			$this->attributes['doc_country'] = $doc_country;
		}
	}


}
