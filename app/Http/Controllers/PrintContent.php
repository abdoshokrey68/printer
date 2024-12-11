<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use COM;
use Exception;
use Illuminate\Http\Request;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class PrintContent extends Controller
{
    // public function print () {
    //     try {
    //         $data = ['title' => 'Print Example', 'content' => 'This is the content to print'];

    //         $pdf = Pdf::loadView('print-template', $data);
    //         $filePath = storage_path('app/print-template.pdf');
    //         $pdf->save($filePath);
    //         // Send the PDF to the printer
    //         exec('print /d:"HP LaserJet Professional P1102" "' . $filePath . '"');

    //         return 'PDF sent to printer successfully!';
    //     } catch (Exception $e) {
    //         return 'Printing failed: ' . $e->getMessage();
    //     }
    // }


    // This method working on thermal ESC/POS printers
    public function print () {
        try {
            // Use SP2000 To enable the thermal ESC/POS
            $profile = CapabilityProfile::load("SP2000");

            $connector = new NetworkPrintConnector("10.x.x.x", 9100);
            // $connector = new WindowsPrintConnector("HP LaserJet Professional P1102");
            $connector = new FilePrintConnector("/dev/usb/");

            $printer = new Printer($connector, $profile);
            $printer->text("Hello World!\n");
            $printer->cut();
            $printer->close();
            dd('done');
        } catch (Exception $e) {
            dd('Printing failed: ' . $e->getMessage());
        }
    }

}

