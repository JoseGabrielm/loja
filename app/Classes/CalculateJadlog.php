<?php

namespace App\Classes;

use App\Models\Jadlog;


class CalculateJadlog
{



    public function calculate($zip, $productWeight, $productQty)
    {
        $productWeightTotal = $productWeight * $productQty;
        $productWeightTotalMax = 30;
        $costShip = 0;
        $zip = preg_replace('/[^0-9]/', '', $zip);
        
        if ($productWeightTotal <= $productWeightTotalMax) {
            //calculo simples
            $shipReturn = $this->calculateBasic($zip, $productWeightTotal);
            //dd($shipReturn);
            return $shipReturn;
        } else {
            //calculo complicado
            //máximo de produtos em cada calculo
            $numberMaxProdCalc = intdiv($productWeightTotalMax, $productWeight);
            //quantas vezer vai calcular repetidamente
            $parcialQty =  intdiv($productQty, $numberMaxProdCalc);
            $shipReturn = $this->calculateBasic($zip, $productWeight * $numberMaxProdCalc);
            $costShip = $shipReturn['costShip'] * $parcialQty;
            $deadlineShip = $shipReturn['deadlineShip'];
            $noShipMessage = $shipReturn['noShipMessage'];
            //dd($costShip . ' - ' . $deadlineShip . ' - ' .  $parcialQty . ' - ' .  $noShipMessage );
            $remainQty = $productQty - ($parcialQty * $numberMaxProdCalc);
            if($remainQty > 0){
                $shipReturn2 = $this->calculateBasic($zip, $remainQty * $productWeight);
                $costShip = $shipReturn2['costShip'] + $costShip;
            }
            $shipArray = [
                'costShip' => $costShip,
                'deadlineShip' => $deadlineShip,
                'noShipMessage' => $noShipMessage,
                'carrier' => 'Jadlog',
            ];
            return $shipArray;
        }
    }


    public function calculateBasic($zip, $productWeightTotal)
    {
        $zip = preg_replace('/[^0-9]/', '', $zip);
        $ship = Jadlog::where('zipini', '<=', $zip)
            ->where('zipfin', '>=', $zip)
            ->where('wini', '<=', $productWeightTotal)
            ->where('wfin', '>=', $productWeightTotal)
            ->first();
        //dd($costShip);
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
            'carrier' => 'Jadlog',
        ];

        return $shipArray;
    }

}