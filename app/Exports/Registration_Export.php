<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class Registration_Export implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'Worksheet 1' => new regis_ms_export(),
            'Worksheet 2' => new regis_mt_export(),
            'Worksheet 3' => new regis_ms_export(),
        ];
    }
}
