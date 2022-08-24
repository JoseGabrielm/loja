<?php

namespace App\Http\Relatorios;

use App\Classes\Fpdf\Fpdf;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;

class printOrder extends Controller
{

    function print() {

        $orders = Order::with('client', 'order_products')->where('status', '=', 'payment confirmed')->get();

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);
        $pdf->SetTopMargin(10);
        $pdf->SetAutoPageBreak(true, 20);

        foreach ($orders as $key => $order) {

            if (($key % 1) == 0 && $key != 0) {

                $pdf->AddPage();

            }

            $this->addOrder($pdf, $order);
            $this->addEnd($pdf, $order);

        }

        return $pdf->Output('D', 'true.pdf', 'true');

    }

    private function addOrder($pdf, $order)
    {

        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 45, 'N. pedido: ' . $order->id, 0, 0, 'R');
        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 14);

        $pdf->Cell(0, 35, 'Cliente: ' . utf8_decode($order->client->name ?? ''), 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);


        if($order->client->doc_state){
        $pdf->Cell(0, 30, 'CNPJ: ' . utf8_decode($order->client->doc_country ?? ''), 0, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(0, 30, 'I.E.: ' . utf8_decode($order->client->doc_state ?? ''), 0, 0, 'L');
        $pdf->Ln(8);

        }else{

        $pdf->Cell(0, 30, 'CPF: ' . utf8_decode($order->client->doc_ssn ?? ''), 0, 0, 'L');
        $pdf->Ln(8);

        }

        $pdf->Cell(0, 30, 'Telefone: ' . utf8_decode($order->client->fantasy ?? ''), 0, 0, 'L');
        $pdf->Ln(8);
        $pdf->Cell(0, 30, 'Email: ' . utf8_decode($order->client->contact ?? ''), 0, 0, 'L');
        $pdf->Ln(8);




        $pdf->SetFont('Arial', 'B', 12);


        $this->addItems($pdf, $order);

        $pdf->Ln(25);

    }

    private function addItems($pdf, $order)
    {

        $items = $order->order_products;

        foreach ($items as $item) {

            $pdf->SetFont('Arial', '', 12);

            $pdf->Cell(0, 65, utf8_decode($item->product_description), 0, 0, 'L');
            $pdf->Ln(8);

            $pdf->SetFont('Arial', 'B', 12);

            $pdf->Cell(0, 65, ' x ' . utf8_decode($item->amount), 0, 0, 'L');

            $pdf->Cell(0, 50, '     R$ ' . number_format(($item->unitary_price / 100), 2, ',', '.'), 0, 0, 'R');

            $pdf->Ln(10);

        }

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 65, 'subtotal: R$ ' . number_format(($items->sum('base_total') / 100), 2, ',', '.'), 0, 0, 'R');
        $pdf->Ln(8);
        $pdf->Cell(0, 65, 'frete: R$ ' . number_format(($order->ship_value / 100), 2, ',', '.'), 0, 0, 'R');
        $pdf->Ln(8);
        $pdf->Cell(0, 65, 'TOTAL: R$ ' . number_format(($order->ship_value + $items->sum('base_total')) / 100, 2, ',', '.'), 0, 0, 'R');
        $pdf->Ln(8);
        $pdf->Cell(0, 65, $order->ship_form, 0, 0, 'R');

    }

    private function addEnd($pdf, $order)
    {


        if($order->ship_form !== 'Retirar no local'){


        $address = Address::with('city')
            ->where('type', 'entrega')
            ->where('client_id', $order->client_id)
            ->first();

        $pdf->Ln(15);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 20, '', 'T', 0, 'L');
        $pdf->Ln(5);
        $pdf->MultiCell(0, 0, utf8_decode('Endereço: ' . '(' . $address->type . ')'), 0, 'j', false);

        $pdf->Ln(5);

        $pdf->SetFont('Arial', '', 11);

        $pdf->MultiCell(0, 8, utf8_decode($address->street . ' - ' . $address->number . ' - ' . $address->complement), 0, 'j', false);
        $pdf->Ln(2);

        $pdf->Cell(0, 8, utf8_decode($address->postcode ?? '' . ' - ' . $address->neighborhood ?? '' . ' - ' . $address->city->name ?? ''), 0, 0, 'L');
        $pdf->Ln(2);

        if (Address::where('type', 'faturamento')->where('client_id', $order->client_id)->exists()) {

            $address = Address::with('city')
                ->where('type', 'faturamento')
                ->where('client_id', $order->client_id)
                ->first();

            $pdf->Ln(10);

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 20, '', 'T', 0, 'L');
            $pdf->Ln(5);
            $pdf->MultiCell(0, 0, utf8_decode('Endereço: ' . '(' . $address->type . ')'), 0, 'j', false);

            $pdf->Ln(5);

            $pdf->SetFont('Arial', '', 11);

            $pdf->MultiCell(0, 8, utf8_decode($address->street . ' - ' . $address->number . ' - ' . $address->complement), 0, 'j', false);
            $pdf->Ln(2);

            $pdf->Cell(0, 8, utf8_decode($address->postcode . ' - ' . $address->neighborhood . ' - ' . $address->city->name), 0, 0, 'L');
            $pdf->Ln(2);

        }

    }else{

        $pdf->Ln(15);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 20, '', 'T', 0, 'L');
        $pdf->Ln(8);
        $pdf->MultiCell(0, 0, 'RETIRA', 0, 'j', false);


    }

    }

}
