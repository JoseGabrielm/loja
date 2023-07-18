<?php

namespace App\Http\Livewire\Front;

use Cart;
use stdClass;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Models\Client;
use App\Models\Address;
use App\Models\Contact;

use App\Models\Product;
use Livewire\Component;
use App\Models\OrderProduct;
use App\Classes\CalculateShipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Classes\CalculateShipOtimized;
use App\Models\Shipment;

class Carts extends Component
{


    public ?Address $addressShip;
    public  $addressList;
    public ?Shipment $shipment;
    public ?Client $documentShip;
    public ?Contact $contactForm;
    public $editedEnd = null, $editedDoc = null, $radiodoc = 0, $radioend = 1, $modalLoginOpen = false, $formConfirmAd = false, $editCityModal = false, $iscompany, $modalLoginType = true;
    public $postcode, $street, $number, $neighborhood, $complement, $city_id, $city, $retira = 0;
    public $name, $contact, $doc_ssn, $doc_country, $doc_state, $note;
    public $zip, $totalship, $carrier, $deadlineship, $noShipMessage, $isDisabled = '';
    public $states, $cities, $cityName, $cityState, $selectedState = NULL, $selectedCity = NULL;

    protected $rules = [
        'addressShip.postcode' => ['required', 'min:8', 'max:9'],
        'addressShip.street' => ['required'],
        'addressShip.number' => [''],
        'addressShip.neighborhood' => ['required'],
        'addressShip.complement' => [''],
        'addressShip.city_id' => [''],
        'documentShip.name' => ['required', 'min:3 '],
        'documentShip.fantasy' => ['required', 'min:11', 'numeric'],
        'documentShip.is_company' => '',
        'documentShip.doc_ssn' => ['nullable',  'min:11', 'max:14'],
        'documentShip.doc_country' => ['nullable',  'min:14', 'max:18'],
        'documentShip.doc_state' => ['nullable', 'max:15'],
        'documentShip.doc_city' => '',
        'documentShip.birthday' => '',
        'documentShip.is_active' => '',
        'documentShip.news_letter' => '',
        'documentShip.is_verified' => '',
        'documentShip.contact' => ['required', 'max:100', 'email'],
        'documentShip.note' => '',
        'documentShip.user_id' => '',
        'cityName' => [''],
        'cityState' => [''],
        'contactForm.client_id' => '',
        'contactForm.type' => '',
        'contactForm.description' => '',
        'contactForm.contact' => ''

    ];



    protected $messages = [

        'documentShip.doc_ssn.required_if' => 'O campo CPF não pode estar vazio se você for uma pessoa fisica',
        'documentShip.doc_country.required_if' => 'O campo CNPJ não pode estar vazio se você for uma pessoa Juridica',
        'documentShip.name.required' => 'O campo nome não pode estar vazio.',
        'documentShip.name.min' => 'Nome deve conter mais de uma palavra',
        'documentShip.contact.required' => 'O campo email não pode estar vazio.',
        'documentShip.contact.email' => 'Email não é válido.',
        'documentShip.fantasy.required' => 'O campo telefone não pode estar vazio',
        'documentShip.fantasy.numeric' => 'O telefone deve conter apenas números'
    ];



    protected $listeners = ['refreshCompany'];


    public function mount()
    {

        $this->states = State::all();
        $this->cities = collect();



        if (Auth::check()) {

            $user = auth()->user();
            $this->documentShip = $user->client()->first();



            //se não tiver cria documentos para entrega
            if (!$this->documentShip) {
                $client = new Client;
                $client->name = $user->name;
                $client->user_id = $user->id;
                $client->save();
                $this->documentShip = $user->client()->first();
            }

            //se tiver atualiza documentos para entrega
            $this->name = $this->documentShip->name;
            $this->contact = $this->documentShip->contact;
            $this->doc_ssn = $this->documentShip->doc_ssn;
            $this->doc_country = $this->documentShip->doc_country;
            $this->doc_state = $this->documentShip->doc_state;
            $this->note = $this->documentShip->note;
            $this->iscompany = $this->documentShip->is_company;
            //dd( $name );
            $client_id = $this->documentShip->id;
            //dd( $this->client_id );

            $this->addressShip = $this->documentShip->addresses()->first();
            $this->addressList = $this->documentShip->addresses()->get();


            //se não tiver cria endereço para entrega

            if (!$this->addressShip) {
                $address = new Address;
                $address->type = 'entrega';
                $address->postcode = session('zipSimulador');
                $address->client_id = $client_id;
                $address->save();
                $this->addressShip = $user->client()->first()->addresses()->first();
            }


            //dd( $this->addressShip->type );
            //se tiver atualiza endereço para entrega
            $this->postcode = $this->addressShip->postcode;
            $this->street = $this->addressShip->street;
            $this->number = $this->addressShip->number;
            $this->neighborhood = $this->addressShip->neighborhood;
            $this->complement = $this->addressShip->complement;
            $this->city_id = $this->addressShip->city_id;
            $this->city = $this->addressShip->city()->first()->name ?? '';




            $this->contactForm = $this->documentShip->contacts()->first();


            if (!$this->contactForm) {

                $contact = new Contact;
                $contact->type = 'telephone';
                $contact->description = $this->contactForm->description ?? '';
                $contact->client_id = $this->documentShip->id;
                $contact->save();
                $this->contactForm = $this->documentShip->contacts()->first();
            }




            //dd( $this->city );
            //se não tiver cep de entrega atualiza com o da sessão
            if ($user) {
                $address = $user->client()->first()->addresses()->where('type', 'like', 'entrega')->first();
                if ($address) {
                    if ($address->postcode == null) {
                        $address->postcode = session('zipSimulador');
                        $address->save();
                    }
                    $this->zip = $address->postcode;
                }
            }
            //já tem um cep cadastrado. Recalcula o frete esse cep
            if ($this->postcode) {

                $this->zip = $this->postcode;

                $this->totalShip();
            }
        } else {

            $this->postcode = session('zipSimulador');
            $this->totalShip();
        }
    }








    public function saveDocument()
    {
        $user = auth()->user();
        $this->documentShip = $user->client()->first();
        $this->name = $this->documentShip->name;
        $this->contact = $this->documentShip->contact;
        $this->doc_ssn = $this->documentShip->doc_ssn;
        $this->doc_country = $this->documentShip->doc_country;
        $this->doc_state = $this->documentShip->doc_state;
        $this->note = $this->documentShip->note;
        $this->editedDoc = null;
    }





    public function refreshCompany()
    {
        if ($this->iscompany == true) {
            $this->documentShip->is_company = true;
            $this->documentShip->doc_ssn = '';
        } else {


            $this->documentShip->is_company = false;
            $this->documentShip->doc_country = '';
            $this->documentShip->doc_state = '';
        }
    }








    public function saveShipping()
    {
        if ($this->noShipMessage != 'Desculpe, no momento não entregamos em sua região') {




            if ($this->documentShip->is_company == true) {

                $validatedData = $this->validate([
                    'documentShip.doc_country' => ['required_if:is_company,true',  'min:14', 'max:18'],
                    'documentShip.doc_state' => ['required_unless:doc_country,null', 'max:15'],
                ]);
            } else {
                $validatedData = $this->validate([
                    'documentShip.doc_ssn' => ['required_if:is_company,false',  'min:11', 'max:14'],
                ]);
            }


            $this->postcode = preg_replace('/[^0-9]/', '', $this->postcode);
            $this->Validate();

            $this->documentShip->save($validatedData);

            $this->addressShip->save();
            $this->contactForm->save();

            $this->saveDocument();
            $this->createOrder();
        } else {

            session()->flash('message', 'Corrija seu cep');
        }
    }



    //corrigir para acessar $this->addressShip->postcode e acrescentar ao component
    //a função updatedAddressShip->postcode para atualizar o frete automaticamente

    public function searchAddressShip()
    {


        $this->postcode = $this->addressShip->postcode;

        $postcode = preg_replace('/[^0-9]/', '', $this->postcode);

        if (strlen($postcode) == 8) {
            $response = Http::get('viacep.com.br/ws/' . $postcode . '/json')->json();
            //dd( $response );
            if ($response) {
                if (!empty($response['logradouro'])) {
                    $this->addressShip->postcode = $response['cep'];
                    $this->addressShip->street = $response['logradouro'];
                    $this->addressShip->neighborhood = $response['bairro'];
                    $localidade = $response['localidade'];
                    $uf = $response['uf'];
                    $ibge = $response['ibge'];
                    $ddd = $response['ddd'];
                    $cityResponse = City::with('state')->where('code', 'like', $ibge)->first();

                    //dd( $cityResponse);

                    $this->cityName = $cityResponse->name;
                    $this->cityState = $cityResponse->state->initials;

                    $this->addressShip->city_id = $cityResponse->id;
                } else {
                    $this->postcode = 'CEP não existe';
                }
            } else {
                $this->postcode = $postcode;
            }
        } else {
            $this->postcode = 'CEP com erro';
        }



        $this->totalShip();
    }


    public function removeItemCart($rowId)
    {
        Cart::remove($rowId);
        $this->totalShip();
    }

    public function increaseQty($rowId)
    {
        $line = $rowId;
        $item = Cart::get($line);
        $qty = $item->qty + 1;
        Cart::update($line, $qty);
        $this->totalShip();
    }

    public function decreaseQty($rowId)
    {
        $line = $rowId;
        $item = Cart::get($line);
        $qty = $item->qty - 1;
        Cart::update($line, $qty);
        $this->totalShip();
    }

    public function OtimizedCostShipCartFretado()
    {

        //Se houver mais de um produto no carrinho calcular peso total e ver se Fretado entrega
        //calcula o peso total

        $totalWeight = 0;
        foreach (Cart::content() as $item) {
            $totalWeight += $item->options->productWeight * $item->qty;
        }
        $calculateShip = new CalculateShipOtimized();
        $shipReturn = $calculateShip->calculate($this->postcode, $totalWeight);
        //dd( $shipReturn );
        if ($shipReturn) {
            $costShip = $shipReturn['costShip'];
            $deadlineShip = $shipReturn['deadlineShip'];
            $noShipMessage = $shipReturn['noShipMessage'];
            $carrier = $shipReturn['carrier'];
        }
        //dd( $costShip );
        return $costShipOtimized = ['costShip' => $costShip, 'deadlineShip' => $deadlineShip, 'noShipMessage' => $noShipMessage, 'carrier' => $carrier];
    }

    public function totalShip()
    {



        $costTotalNormal = null;
        $shipReturn = [];
        //calcular frete total com Fretado
        $costShipOtimized = $this->OtimizedCostShipCartFretado();
        //dd( $costShipOtimized['costShip'] . '-' . $costShipOtimized['deadlineShip'] . '-' . $costShipOtimized['noShipMessage']) ;
        //calcular frete total normal
        foreach (Cart::content() as $item) {
            $calculateShipment = new CalculateShipment();
            $shipReturn = $calculateShipment->calculate($this->postcode, $item->options->productWeight, $item->qty);
            //dd( $shipReturn );
            $costTotalNormal += $shipReturn['costShip'];
            $this->noShipMessage = $shipReturn['noShipMessage'];
            $this->deadlineship = $shipReturn['deadlineShip'];
            $this->carrier = $shipReturn['carrier'];
        }
        //ver melhor preço
        if ($this->noShipMessage != "Desculpe, no momento não entregamos em sua região") {
            if ($costShipOtimized['costShip'] <= $costTotalNormal) {
                $this->totalship = $costShipOtimized['costShip'] / 100;
                $this->noShipMessage = $costShipOtimized['noShipMessage'];
                $this->deadlineship = $costShipOtimized['deadlineShip'];
                $this->carrier = $costShipOtimized['carrier'];
            } else {
                $this->totalship = $costTotalNormal / 100;
                //dd( ' costTotalNormal ' .  $this->totalship );
            }
        } else {
            $this->totalship = $shipReturn['costShip'] / 100;

            session()->flash('message', $this->noShipMessage);
        }
    }







    public function createOrder()
    {

        $this->totalShip();

        if (Auth::check()) {

            $client = auth()->user()->client()->first();
            $client_id = $client->id;
            //$addressShip = $client->addresses()->where( 'type', 'entrega' )->first();
            if ($this->zip != null && ($this->doc_ssn != null || $this->doc_country != null)) {
                $order = new Order();
                $order->status = 'awaiting payment'; //aguardando confirmação de endereço

                if ($this->retira == 1) {

                    $order->ship_value = 0;
                    $order->ship_form = 'Retirar no local';
                } else {

                    $order->ship_value = $this->totalship * 100;
                    $order->ship_form = $this->carrier;
                }
                $order->ship_deadline = $this->deadlineship;
                $order->ship_zip = $this->zip;

                $tot = floatval(str_replace(',', '', Cart::total()));
                $order->total = $tot * 100;
                $order->coupon_code = 0;
                $order->discount = 0;
                $order->sub_total = $order->total - $order->discount;
                $order->grand_total = $order->ship_value + $order->total - $order->discount;
                if ($this->documentShip->is_company == 0) {

                    $order->doc_type = 'CPF';
                    $order->doc_number = preg_replace('/[^0-9]/', '', $this->doc_ssn);
                } else {
                    $order->doc_type = 'CNPJ';
                    $order->doc_number = preg_replace('/[^0-9]/', '', $this->doc_country);
                }
                $order->client_id  = $client_id;
                $order->save();

                foreach (Cart::content() as $cart) {
                    $product = Product::where('sku', 'like', $cart->id)->first();
                    $detail = new OrderProduct();
                    $detail->sku = $cart->id;
                    $detail->product_description = $cart->name;
                    $detail->unitary_price = $cart->price * 100;
                    $detail->amount = $cart->qty;
                    $detail->base_total =  $cart->price * $cart->qty * 100;
                    $detail->discount_percent = 0;
                    $detail->additional = "";
                    $detail->order_id  = $order->id;
                    $detail->product_id  = $product->id;
                    $detail->save();
                }


                //dd($order);


                $shipment = new Shipment();
                $shipment->create([

                    "status" => 'Preparing Shipment',
                    "sku" => '1',
                    "nome" => 'teste',
                    "base_currency" => 'R$',
                    "postcode" => $this->addressShip->postcode,
                    "address" => $this->addressShip->address,
                    "number" => $this->addressShip->number,
                    "neighborhood" => $this->addressShip->neighborhood,
                    "complement" =>  $this->addressShip->complement,
                    "order_id" => $order->id,
                    "packing_width" => '0',
                    "packing_height" => '0',
                    "packing_lenght" => '0',
                    "total_weight" => '0',
                    "total_qty" => '0',
                    "price_prod" => $order->ship_value + $order->total - $order->discount,
                    "carrier_id" => 1,

                ]);

                //dd($shipment);



                session()->flash('pedidoSuccess', 'Pedido relizado com sucesso!');
                return redirect()->route('front.checkout', ['order_id' => $order->id]);
            } else {
                session()->flash('message', 'É preciso completar os dados de entrega para continuar.');
            }
        }

        session()->flash('message', 'É necessário realizar o login ou se cadastrar para prosseguir');
        $this->modalLoginOpen = true;
    }

    public function modifyRadioDoc()
    {
        $this->radiodoc = 0;
        $this->radioend = 1;
    }

    public function modifyRadioEnd()
    {
        $this->radiodoc = 1;
        $this->radioend = 0;
    }

    public function editDocument()
    {
        $this->editedDoc = 1;
    }

    public function editAddress()
    {
        $this->editedEnd = 1;
    }



    public function confirmInfo()
    {

        if (Auth::check()) {

            $user = Auth::user();
            $this->contactForm = $user->client()->first()->contacts()->first();

            //dd( $this->contactForm);
            $this->cityName = $this->addressShip->city->name ?? '';
            $this->cityState = $this->addressShip->city->state->initials ?? '';
            $this->formConfirmAd = true;
        } else {


            session()->flash('message', 'É necessário realizar o login ou se cadastrar para prosseguir');
            $this->modalLoginOpen = true;
        }
    }



    public function findCity(Address $address)
    {
        //$this->adShip = $address;
        //dd($this->adShips->type );
        $this->editCityModal = true;
        //$this->clearValidation();
    }




    public function render()
    {
        return view('livewire.front.cart.carts');
    }
}
