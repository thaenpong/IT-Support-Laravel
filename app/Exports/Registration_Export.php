<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Models\registration;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class Registration_Export implements WithMultipleSheets
{
    public function sheets(): array
    {
        // Get all unique property IDs from the database
        $propertyIds = registration::distinct()->pluck('property_id');

        $sheets = [];

        // Loop through each property ID and create a new sheet for it
        foreach ($propertyIds as $propertyId) {
            $sheets[] = new class($propertyId) implements FromView
            {
                private $propertyId;

                public function __construct($propertyId)
                {
                    $this->propertyId = $propertyId;
                }

                public function view(): View
                {
                    $data = registration::where('property_id', $this->propertyId)
                        ->withTrashed()
                        ->get();
                    return view('registration.export.regisexport')->with('data', $data);
                }

                public function title(): string
                {
                    // Set the sheet title to the property ID
                    return 'Property ' . $this->propertyId;
                }
            };
        }

        return $sheets;
    }
}
