<?php

namespace App\Http\Livewire\Front;

use Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\State;
use App\Models\Address;
use Livewire\Component;
use App\Models\Shipment;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Classes\CreatePayCard;
use App\Classes\CreatePayBillet;
use Illuminate\Support\Facades\Log;

class Checkouts extends Component
{

    protected $rules = [
        'address.postcode' => '',
        'address.street' => '',
        'address.number' => '',
        'address.neighborhood' => '',
        'address.complement' => '',
        'address.client_id' => '',
        'address.city_id' => '',
    ];

    public $order;
    public $details;
    public $client;
    public $discount;
    public $products;
    public $frete;
    public $orderId;

    public Shipment $shipment;
    public Address $address;
    public $states;
    public $cities;
    public $cityName;
    public $cityState;
    public $selectedState = null;
    public $selectedCity = null;

    public $radioCard = 0;
    public $radioDeposit = 1;
    public $radioBillet = 1;
    public $zip;
    public $totalship;
    public $deadlineship;
    public $codeCardPagseguro;
    public $editShippingModal = false;
    public $editCityModal = false;

    public function mount(Request $request)
    {
        $user = auth()->user();
        $this->client = $user->client;

        $this->address = $this->client->addresses->where('type', 'like', 'entrega')->first();
        $this->order = $this->client->orders->where('id', $request->order_id)->first();

        if ($this->order) {
            $this->details = $this->order->order_products;

        } else {
            return redirect()->route('front.shop');
        }

        $this->states = State::all();
        $this->cities = collect();
        $this->frete = $this->order->ship_value;
        $this->products = $this->getItemsCart();
        $this->orderId = $request->order_id;


        if ($this->order->url_pay and $this->order->payby == 'billet'){

            session()->flash('billetExists', 'Essa compra já possui um boleto associado. Você pode visualiza-lo em:'  );
            $this->modifyRadioBillet();

        }elseif($this->order->payby == 'deposit'){

            session()->flash('depositExists', 'Essa compra foi marcado com pagamento via deposito'  );
            $this->modifyRadioDeposit();


        }elseif($this->order->payby == 'credit_card' or $this->order->payby == 'link'){

            session()->flash('creditcardExists', 'Essa compra foi marcado com pagamento via cartão de crédito'  );
            $this->modifyRadioCard();


        }
    }

    public function payDeposit()
    {
        $this->order->payby = 'deposit';
        $this->order->discount = $this->discount;
        $this->order->update();
        session()->flash('message', 'Obrigado pela compra. Prepararemos seu pedido enquanto aguardamos a confirmação do pagamento.');
    }



    public function payBillet()
    {
        if ($this->order->payby == 'billet' && $this->order->url_pay) {
            //redirecione para uma nova pagina recuperando o boleto salvo
            //dd($this->order->url_pay);
            //abrir boleto em uma nova pagina com javascript
            $this->dispatchBrowserEvent('billet-page', ['url' => $this->order->url_pay]);

            // ou abrir boleto na mesma pagina
            //return redirect()->away();
            //header('Location: endereço_da_nova_página');
        } else {
            //gera um novo boleto
            $this->order->payby = 'billet';
            $this->order->discount = $this->discount;
            $this->order->update();
            $createBillet = new CreatePayBillet();
            $response = $createBillet->index($this->order, $this->client, $this->details);

            //dd($response);


            if ($response['code'] == 200) {
                //dd($response);
                $this->order->url_pay = $response['data']['link'];
                $this->order->payment_code = $response['data']['charge_id'];
                $this->order->update();
                //abrir boleto em uma nova pagina com javascript
                $this->dispatchBrowserEvent('billet-page', ['url' => $response['data']['link']]);
                session()->flash('message','Boleto gerado com sucesso!');

                //ou abrir boleto na mesma pagina
                //return redirect()->to($response);
            } else {
                dd('erro' . $response);
                session()->flash('message', $response['error_description'] . ' - Corrija seus dados no menu: MEUS DADOS');
            }

            Cart::destroy();

        }
    }

     public function payCard()
    {

        $cobrancaCard = new CreatePayCard();
        $response = $cobrancaCard->index($this->order, $this->details);

        //verifica se response é nula antes de prosseguir
        //se for não fara nada e exibira o erro atribuido a sessão dentro da classe paycard

        if($response !== null && is_array($response)){


            if($response['code'] == 200){



                $this->order->payby = 'link';
                $this->order->payment_code = $response['data']['charge_id'];

                $this->order->url_pay = $response['data']['payment_url'];
                $this->order->update();

                Cart::destroy();

                session()->flash('message', 'Obrigado pela compra. Prepararemos seu pedido enquanto aguardamos a confirmação do pagamento.');
                $this->dispatchBrowserEvent('paymentLink-page', ['url' => $response['data']['payment_url']]);


            }else{


                session()->flash(
                    'error',
                    'Ocorreu um erro inesperado.
                     Verifique se seus dados estão corretos na aba "Meus Dados".
                     Caso o erro persista, entre em contato com nosso suporte'

                );

                Log::channel('gerenciaNet')->info('Pedido: ' . $this->order->id . ' > ' . json_encode($response));

            }

        }else{




            session()->flash(
                'error', 'Esse link já foi acessado e pago por alguém.
                Se deseja fazer alguma alteração a respeito do pagamento via cartão, favor contatar nossa equipe de vendas.');

            Log::channel('gerenciaNet')->info('Pedido: ' . $this->order->id . ' > ' . $response);




        }

    }



    private function getItemsCart()
    {

        $items = [];

        //dd(Cart::content());

        foreach ($this->details as $key => $item) {

            //dd($item);

            $items[$key]['name'] = $item->product->name;
            $items[$key]['value'] = $item->unitary_price;
            $items[$key]['amount'] = $item->amount;

        }

        return $items;

    }





    public function modifyRadioDeposit()
    {
        $this->discount = (int) ($this->order->grand_total * 10 / 100);
        $this->radioCard = 1;
        $this->radioDeposit = 0;
        $this->radioBillet = 1;
    }

    public function modifyRadioBillet()
    {
        $this->discount = (int) ($this->order->grand_total * 10 / 100);
        $this->radioCard = 1;
        $this->radioDeposit = 1;
        $this->radioBillet = 0;
    }


    public function modifyRadioCard()
    {
        $this->discount = 0;
        $this->radioCard = 0;
        $this->radioDeposit = 1;
        $this->radioBillet = 1;
    }

    public function editShipping()
    {

        $this->editShippingModal = true;
        //dd($this->adShip);
    }

    public function newShipping()
    {

        $this->address = new Address;
        $this->address->client_id = $this->client->id;
        $this->editShippingModal = true;

        //dd($this->adShip);
    }

    public function saveShipping()
    {

        $this->Validate();
        //dd($this->form->toArray());
        $this->address->save();
        $this->editShippingModal = false;
        $this->clearValidation();

    }

    public function finishOrder()
    {

    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::with('state')->where('state_id', $state)->get();
        }
    }

    public function selectCity()
    {

        //destroi o banco de dados

        //dd($this->selectedCity);
        $city = City::with('state')->where('code', $this->selectedCity)->first();
        //dd($city);
        $this->address->city_id = $city->id;
        $this->cityName = $city->name;
        $this->cityState = $city->state->initials;
        $this->editCityModal = false;
    }

    public function render()
    {
        return view('livewire.front.checkout.checkouts');
    }
}
