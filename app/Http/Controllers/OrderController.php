<?php

namespace App\Http\Controllers;


use Exception;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Classes\Validators\ValidateRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Validation\ValidationException;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public $endpointRules = [

        "status" => 'required|string',
        //"timePeriod" => 'required',
        "idOrder" => ''

    ];

    public $messages = [

        "*.required" => 'Um status válido deve ser informado'

    ];


    public function getOrders(Request $request)
    {



        $validator = $this->check($request);

        if ($validator->fails()) {


            $errors = [

                "errors" => $validator->errors(),

            ];

            return response($errors, '400');
        } else {

            $params = $request->all();

            $response = Order::where('status', $params['status'])
                ->when(isset($params['idOrder']), function ($query) use ($params) {
                    return $query->where('id', $params['idOrder']);
                })
                ->RelationsJson()
                ->get()
                ->toJson();


            /*
            $orders['data'] = $jsonResults->data;
            $orders['pages'] = [

                "current_page" => $jsonResults->current_page,
                "last_page" => $jsonResults->last_page,
                "last_page_url" => $jsonResults->last_page_url,

            ]; */



            return response($response, 200);
        }
    }












    public function updateOrders(Request $request)
    {
    }




    public  function check(Request $request)
    {


        $endpoint = str_replace('/api/', '', $request->getPathInfo());

        $validator = Validator::make(
            $request->all(),
            $this->endpointRules,
            $this->messages
        );


        return $validator;
    }
}
