<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;

class FakeService {
    
    public static function generate()
    {
        $pdf = Pdf::loadView('templates.rabbitmaid.index', [
            'name' => 'John Doe'
        ])->setPaper('a4', 'landscape');

        return $pdf->download('attest.pdf');
    }

}