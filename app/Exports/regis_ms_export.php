<?php

namespace App\Exports;

use App\Models\registration;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class regis_ms_export implements FromView
{
    public function view(): View
    {
        $data = registration::where('property_id', '3')->withTrashed()->get();
        return view('registration.export.regisexport')->with('data', $data);
    }
}
