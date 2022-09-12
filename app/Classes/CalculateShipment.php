<?php

namespace App\Classes;

class CalculateShipment
{

    public function calculate($zip, $productWeight, $productQty)
    {
        $zip = preg_replace('/[^0-9]/', '', $zip);
        $shipArray = [];


        if ($productWeight > 30) {
            //É um armario
            $calculateFretado = new CalculateFretado();
            $shipReturn = $calculateFretado->calculate($zip, $productWeight, $productQty);
            //dd($shipReturn);
            return $shipReturn;

        } else {
            //É uma estante
            $calculateJadlog = new CalculateJadlog();
            $shipReturnJadlog = $calculateJadlog->calculate($zip, $productWeight, $productQty);
            //dd($shipReturnJadlog);
            $costShipJadlog = $shipReturnJadlog['costShip'];
            $deadlineShipJadlog = $shipReturnJadlog['deadlineShip'];
            $noShipMessageJadlog = $shipReturnJadlog['noShipMessage'];

            $calculateFretado = new CalculateFretado();
            $shipReturnFretado = $calculateFretado->calculate($zip, $productWeight, $productQty);
            //dd($shipReturnFretado);
            $costShipFretado = $shipReturnFretado['costShip'];
            $deadlineShipFretado = $shipReturnFretado['deadlineShip'];
            $noShipMessageFretado = $shipReturnFretado['noShipMessage'];

            $calculateCorreios = new CalculateCorreios();
            $shipReturnCorreios = $calculateCorreios->calculate($zip, $productWeight, $productQty);
            //dd($shipReturnCorreios);
            $costShipCorreios = $shipReturnCorreios['costShip'];
            $deadlineShipCorreios = $shipReturnCorreios['deadlineShip'];
            $noShipMessageCorreios = $shipReturnCorreios['noShipMessage'];



            if ($costShipJadlog === null && $costShipFretado === null) {
                $shipArray = [
                    'costShip' => null,
                    'deadlineShip' => null,
                    'noShipMessage' => 'Desculpe, no momento não entregamos em sua região',
                    'carrier' => '',
                ];
                return $shipArray;
            }


            if ($costShipJadlog < $costShipFretado) {
                $shipArray = [
                    'costShip' => $costShipJadlog,
                    'deadlineShip' => $deadlineShipJadlog,
                    'noShipMessage' => $noShipMessageJadlog,
                    'carrier' => 'Jadlog',
                ];
                return $shipArray;
            } else if ($costShipFretado < $costShipJadlog) {
                $shipArray = [
                    'costShip' => $costShipFretado,
                    'deadlineShip' => $deadlineShipFretado,
                    'noShipMessage' => $noShipMessageFretado,
                    'carrier' => 'Fretado',
                ];
                return $shipArray;
            } else {

                $shipArray = [
                    'costShip' => $costShipFretado,
                    'deadlineShip' => $deadlineShipFretado,
                    'noShipMessage' => $noShipMessageFretado,
                    'carrier' => 'Fretado',
                ];



            }

        }


        return $shipArray;






    }

}
