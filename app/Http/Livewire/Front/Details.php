<?php

namespace App\Http\Livewire\Front;

use Cart;
use App\Models\Group;
use App\Models\Client;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Classes\CalculateShipment;
use Illuminate\Support\Facades\Auth;

class Details extends Component {

    public $colorProduct = 'Cinza';
    public $group = '';
    public $images = "";
    public $products = '';
    public $prod;
    public $zip;
    public $qty = 1;
    public $costShip;
    public $deadlineShip;
    public $noShipMessage = '';
    public $carrier = '';

    public $messageNoAuth = '';

    public function mount( Request $request ) {
        //dd( $request->slug );
        $this->zip = session( 'zipSimulador' );
        if ( $request->slug ) {
            $this->group = Group::where( 'slug', $request->slug )->first();

            $this->images = $this->group->images()->where( 'type', 'Detalhe' )->limit(4)->get();

            $this->products = Product::where( 'group_id', $this->group->id )->where( 'active', 1 )->orderBy('order')->get();



            if ( $this->products ) {
                $this->prod = $this->products->first();
                $user = auth()->user();
                if ( $user ) {
                    $this->documentShip = $user->client()->first();
                    if ( !$this->documentShip ) {
                        $client = new Client;
                        $client->name = $user->name;
                        $client->user_id = $user->id;
                        $client->save();
                        $this->documentShip = $user->client()->first();
                    }
                    $client_id = $this->documentShip->id;
                    $this->addressShip = $this->documentShip->addresses->first();
                    if ( !$this->addressShip ) {
                        $address = new Address;
                        $address->type = 'entrega';
                        $address->postcode = session( 'zipSimulador' );
                        $address->client_id = $client_id;
                        $address->save();
                        $this->addressShip = $this->documentShip->addresses->first();
                    }
                    $this->contact = $this->documentShip->contacts()->first();
                    if ( !$this->contact ) {
                        $contact = new Contact;
                        $contact->type = 'email';
                        $contact->contact =  $user->name;
                        $contact->description =  $user->email;
                        $contact->client_id = $client_id;
                        $contact->save();
                    }
                    $address = $this->documentShip->addresses->where( 'type', 'like', 'entrega' )->first();
                    if ( $address ) {
                        if ( $address->postcode == null ) {
                            $address->postcode = session( 'zipSimulador' );
                            $address->save();
                        }
                        $this->zip = $address->postcode;
                    }
                }
            }
        } else {
            return redirect()->route( 'front.shop' );
        }
    }

    public function updatedColorProduct() {
        $this->prod = $this->products->where( 'color', $this->colorProduct )->first();
    }

    public function addCart() {



            if ( $this->zip ) {
                $this->calculateShipping();
                //dd( 'com zip' );
                if ( $this->costShip ) {
                    $this->messageNoAuth = '';
                    $productWeight = $this->group->grossweight / 1000;
                    $this->productWeight = $productWeight;
                    //   id, name, qty, price, options, tax
                    Cart::add( $this->prod->sku, $this->prod->name, $this->qty, $this->prod->price, ['image' => $this->prod->image, 'zip' => $this->zip, 'costShip' => $this->costShip, 'carrier' => $this->carrier, 'productWeight' => $productWeight], 0 );
                    //session()->put( 'zipSimulador', $this->zip );
                    session( ['zipSimulador' => $this->zip] );
                    //session()->flash( 'success_messasge', 'Produto adicionado com sucesso' );
                    return redirect()->route( 'front.cart' );
                    //Cart::destroy();
                } else {
                    //dd( 'sem costShip' );
                    $this->messageNoAuth = 'Custo de entrega não encontrado';
                    //return redirect()->back();
                }
            } else {
                //dd( 'sem zip' );
                $this->messageNoAuth = 'Desculpe mas voce precisa digitar o CEP para prosseguir';
            }
            //return redirect()->back();

            //dd( 'sem auth' );


            //pedir login assim q o usuário finalizar a compra
            //depois de logado e recebe id para identificação antes ou depois da confirmação?


    }

    public function calculateShipping() {
        $this->noShipMessage = '';
        $zip = preg_replace( '/[^0-9]/', '', $this->zip );
        if ( strlen( $zip ) !== 8 ) {
            $this->costShip = null;
            $this->noShipMessage = 'Por favor, corriga o CEP digitado';
            return redirect()->back();
        }
        //$this->zip = substr( $zip, 0, 5 ) . '-' . substr( $zip, 5, 8 );
        $productWeight = $this->group->grossweight / 1000;
        $productQty = ( $this->qty > 0 ? $this->qty : $this->qty = 1 );
        $calculateShipment = new CalculateShipment();
        $shipReturn = $calculateShipment->calculate( $zip, $productWeight, $productQty );
        session( ['zipSimulador' => $this->zip] );
        //dd( $shipReturn );
        $this->costShip = $shipReturn['costShip']?? '';
        $this->deadlineShip = $shipReturn['deadlineShip']?? '';
        $this->noShipMessa11ge = $shipReturn['noShipMessage']?? 'Cep não encontrado';
        $this->carrier = $shipReturn['carrier']?? '';
        if ( $this->costShip == null ) {
            $this->noShipMessage = 'Desculpe, no momento não entregamos neste CEP';
        }
    }

    public function updatedQty($qty)
    {
        if ( $this->zip != null ) {
            $this->calculateShipping();
        }
    }

    public function render() {
        if ( Auth::user() ) {
            return view( 'livewire.front.detail.details' )->layout( 'layouts.app' );
        } else {
            return view( 'livewire.front.detail.details' )->layout( 'layouts.front' );
        }

    }

}
