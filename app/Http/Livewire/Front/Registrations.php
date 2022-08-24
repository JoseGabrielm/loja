<?php

namespace App\Http\Livewire\Front;

use App\Models\City;
use App\Models\State;
use App\Models\Client;
use App\Models\Address;
use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Registrations extends Component
{
    public $formModalClientOpened = false;
    public $formModalAddressOpened = false;
    public $formModalContactOpened = false;
    public $formModalCityOpened = false;

    public Client $form;
    public Contact $contact;
    public Address $adShip;
    public $adShips;
    public $contacts;
    public $cityName;
    public $cityState;
    public $iscompany = 1;

    public $states;
    public $cities;
    public $selectedState = NULL;
    public $selectedCity = NULL;




    public function mount() {
        $user = auth()->user();
        if($user->client){
            $this->form = $user->client->with('addresses')->where('user_id', $user->id)->first();
            //dd($this->form->id);
            $this->adShips = $this->form->addresses->where('client_id', $this->form->id);
            //dd($this->adShips);
            $this->contacts = $this->form->contacts->where('client_id', $this->form->id);
        }else{
            return redirect()->route('front.cart');
        }
        $this->states = State::all();
        $this->cities = collect();
    }

    protected $listeners = ['refreshCompany'];

    public function refreshCompany()
    {
        if($this->iscompany == true){
            $this->form->is_company = 1;
        }else{
            $this->form->is_company = 0;
        }
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::with('state')->where('state_id', $state)->get();
        }
    }

    public function selectCity()
    {
        //dd($this->selectedCity);
        $city = City::with('state')->where( 'code', $this->selectedCity )->first();
        //dd($city);
        $this->adShip->city_id = $city->id;
        $this->cityName = $city->name;
        $this->cityState = $city->state->initials;
        $this->formModalCityOpened = false;
    }


    public function editClient(Client $client)
    {
        $this->form = $client;
        //dd($this->form->birthday );
        $this->formModalClientOpened = true;
        $this->clearValidation();
    }

    public function saveClient()
    {
        $this->Validate();
        //dd($this->form->toArray());
        $this->form->save();
        $this->formModalClientOpened = false;
        $this->clearValidation();
    }

    public function findCity(Address $address)
    {
        //$this->adShip = $address;
        //dd($this->adShips->type );
        $this->formModalCityOpened = true;
        //$this->clearValidation();
    }

    public function newAddress()
    {
        $this->adShip = new Address();
        $this->adShip->client_id = $this->form->id;
        $this->formModalAddressOpened = true;
        $this->clearValidation();
    }

    public function editShipAddress(Address $address)
    {
        $this->adShip = $address;
        if($address->city){
            $this->cityName = $address->city->name;
            $this->cityState = $address->city->state->initials;
        }
        //dd($this->adShips->type );
        $this->formModalAddressOpened = true;
        $this->clearValidation();
    }

    public function saveAddress()
    {
        $this->Validate();
        //dd($this->adShips->toArray());
        $this->adShip->save();
        $this->formModalAddressOpened = false;
        $this->mount();
        $this->clearValidation();
    }

    public function newContact()
    {
        $this->contact = new Contact();
        $this->contact->client_id = $this->form->id;
        $this->formModalContactOpened = true;
        $this->clearValidation();
    }

    public function editContact(Contact $contact)
    {
        $this->contact = $contact;
        //dd($this->contact );
        $this->formModalContactOpened = true;
        $this->clearValidation();
    }

    public function saveContact()
    {
        $this->Validate();
        //dd($this->adShips->toArray());
        $this->contact->save();
        $this->formModalContactOpened = false;
        $this->mount();
        $this->clearValidation();
    }

    public function searchAddress() {
        $postcode = preg_replace( '/[^0-9]/', '', $this->adShip->postcode );
        //dd( $postcode );
        if ( strlen( $postcode ) == 8 ) {
            try {
                $response = Http::get( 'viacep.com.br/ws/' . $postcode . '/json' )->json();
            } catch (\Throwable $th) {
                $this->adShip->postcode = 'CEP não encontrado';
            }
            //dd( $response );
            if ( $response ) {
                if ( !empty( $response['logradouro'] ) ) {
                    $this->adShip->postcode = $response['cep'];
                    $this->adShip->street = $response['logradouro'];
                    $this->adShip->neighborhood = $response['bairro'];
                    $localidade = $response['localidade'];
                    $uf = $response['uf'];
                    $ibge = $response['ibge'];
                    $ddd = $response['ddd'];
                    $cityResponse = City::with('state')->where( 'code', 'like', $ibge )->first();
                    //dd( $cityResponse );
                    //$this->adShip->city->name = $cityResponse->name;
                    //$this->adShip->city_id = $cityResponse->id;
                    $this->cityName = $cityResponse->name;
                    $this->cityState = $cityResponse->state->initials;

                } else {
                    return $this->adShip->postcode = 'CEP não existe';
                }
            } else {
                return $this->adShip->postcode = $postcode;
            }
        } else {
            return $this->adShip->postcode = 'CEP com erro';
        }
    }

    public function render()
    {
        return view('livewire.front.registration.registrations');
    }


    public $rules = [
        'form.name' => 'required',
		'form.fantasy' => '',
		'form.is_company' => '',
		'form.doc_ssn' => 'required',
		'form.doc_country' => '',
		'form.doc_state' => '',
		'form.doc_city' => '',
		'form.birthday' => 'required',
		'form.is_active' => '',
		'form.news_letter' => '',
		'form.is_verified' => '',
		'form.note' => '',
		'form.user_id' => '',
        'adShip.type' => 'required',
        'adShip.postcode' => 'required',
        'adShip.street' => 'required|min:10',
        'adShip.number' => 'required|numeric',
        'adShip.neighborhood' => 'required|min:10',
        'adShip.complement' => '',
        'adShip.client_id' => '',
        'adShip.city_id' => '',
        'cityName' => 'required',
        'cityState' => 'required',
        'adShip.type' => '',
        'contact.client_id' => '',
        'contact.type' => '',
        'contact.description' => '',
        'contact.contact' => ''
    ];
}
