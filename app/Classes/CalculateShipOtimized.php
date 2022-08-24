<?php

namespace App\Classes;

use App\Models\Fretado;


class CalculateShipOtimized
{


    public function calculate($zip, $productWeight)
    {
        $productWeightTotalMax = 600;
        $costShip = 0;
        
        $zip = preg_replace('/[^0-9]/', '', $zip);
        if ($productWeight <= $productWeightTotalMax) {
            //calculo simples
            $shipReturn = $this->calculateBasic($zip, $productWeight);
            //dd($shipReturn);
            return $shipReturn;
        } else {
            //calculo complicado
            //mácximo de produtos em cada calculo
            $parcialQty  = intdiv($productWeight, $productWeightTotalMax);
            //quantas vezer vai calcular repetidamente
            $shipReturn = $this->calculateBasic($zip, $productWeightTotalMax);
            $costShip = $shipReturn['costShip'] * $parcialQty;
            $deadlineShip = $shipReturn['deadlineShip'];
            $noShipMessage = $shipReturn['noShipMessage'];
            //dd($costShip . ' - ' . $deadlineShip . ' - ' .  $parcialQty . ' - ' .  $noShipMessage );
            $remainWeight = $productWeight - ($parcialQty * $productWeightTotalMax);
            if($remainWeight > 0){
                $shipReturn2 = $this->calculateBasic($zip, $remainWeight);
                $costShip += $shipReturn2['costShip'];
            }
            $shipArray = [
                'costShip' => $costShip,
                'deadlineShip' => $deadlineShip,
                'noShipMessage' => $noShipMessage,
                'carrier' => 'Fretado',
            ];
            return $shipArray;
        }
    }


    public function calculateBasic($zip, $productWeightTotal)
    {
        $zip = preg_replace('/[^0-9]/', '', $zip);
        $ship = Fretado::where('zipini', '<=', $zip)
            ->where('zipfin', '>=', $zip)
            ->where('wini', '<=', $productWeightTotal)
            ->where('wfin', '>=', $productWeightTotal)
            ->first();
        //dd($ship);
        if ($ship) {
            $costShip = $ship->value;
            $deadlineShip = $ship->deadline;
            $noShipMessage = '';
        } else {
            $costShip = null;
            $deadlineShip = null;
            $noShipMessage = 'Desculpe, no momento não entregamos em sua região';
        }
        $shipArray = [
            'costShip' => $costShip,
            'deadlineShip' => $deadlineShip,
            'noShipMessage' => $noShipMessage,
            'carrier' => 'Fretado',
        ];

        return $shipArray;
    }

}