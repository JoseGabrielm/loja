<?php

namespace App\Classes;

use App\Models\Fretado;

class CalculateFretado
{


    public function calculate($zip, $productWeight, $productQty)
    {
        $productWeightTotal = $productWeight * $productQty;
        $productWeightTotalMax = 600;
        $costFretado = 0;
        
        $zip = preg_replace('/[^0-9]/', '', $zip);
        if ($productWeightTotal <= $productWeightTotalMax) {
            //calculo simples
            $shipReturn = $this->calculateBasic($zip, $productWeightTotal);
            //dd($shipReturn);
            return $shipReturn;
        } else {
            //calculo complicado
            //mácximo de produtos em cada calculo
            $numberMaxProdCalc = intdiv($productWeightTotalMax, $productWeight);
            //quantas vezer vai calcular repetidamente
            $parcialQty =  intdiv($productQty, $numberMaxProdCalc);
            $shipReturn = $this->calculateBasic($zip, $productWeight * $numberMaxProdCalc);
            $costFretado = $shipReturn['costShip'] * $parcialQty;
            $deadlineFretado = $shipReturn['deadlineShip'];
            $noShipMessage = $shipReturn['noShipMessage'];
            //dd($costFretado . ' - ' . $deadlineFretado . ' - ' .  $parcialQty . ' - ' .  $noShipMessage );
            $remainQty = $productQty - ($parcialQty * $numberMaxProdCalc);
            if($remainQty > 0){
                $shipReturn2 = $this->calculateBasic($zip, $remainQty * $productWeight);
                $costFretado += $shipReturn2['costShip'];
            }
            $shipArray = [
                'costShip' => $costFretado,
                'deadlineShip' => $deadlineFretado,
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
            $costFretado = $ship->value;
            $deadlineFretado = $ship->deadline;
            $noShipMessage = '';
        } else {
            $costFretado = null;
            $deadlineFretado = null;
            $noShipMessage = 'Desculpe, no momento não entregamos em sua região';
        }
        $shipArray = [
            'costShip' => $costFretado,
            'deadlineShip' => $deadlineFretado,
            'noShipMessage' => $noShipMessage,
            'carrier' => 'Fretado',
        ];

        return $shipArray;
    }

}
