<?php

namespace App\Classes;


class CalculateCorreios
{


    public function calculate($zip, $productWeight, $productQty)
    {
        $costShip = 10000;
        $deadlineShip = 100;
        $noShipMessage = '';

        $zip = preg_replace('/[^0-9]/', '', $zip);
        $shipArray = [
            'costShip' => $costShip,
            'deadlineShip' => $deadlineShip,
            'noShipMessage' => $noShipMessage,
            'carrier' => 'Correio',
        ];
        return $shipArray;
        
    }

}