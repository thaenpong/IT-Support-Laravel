<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class Registration_Export implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new regis_ms_export(),
            new regis_mt_export(),
        ];
    }
}
