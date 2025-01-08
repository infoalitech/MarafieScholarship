<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\FreshExport;

use App\Exports\AbshaarFresh;
use App\Exports\AbshaarRenewal;

use App\Exports\GeneralFresh;
use App\Exports\GeneralRenewal;

use App\Exports\SadaatFresh;
use App\Exports\SadaatRenewal;

use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
    //

    public function fresh()
    {
        return Excel::download(new FreshExport, 'FreshExport.xlsx');
    }
    public function renewal()
    {
        return Excel::download(new RenewalExport, 'RenewalExport.xlsx');
    }
    public function freshGeneral()
    {
        return Excel::download(new GeneralFresh, 'GeneralFresh.xlsx');
    }
    public function renewalGeneral()
    {
        return Excel::download(new GeneralRenewal, 'GeneralRenewal.xlsx');
    }
    public function freshSadaat()
    {
        return Excel::download(new SadaatFresh, 'SadaatFresh.xlsx');
    }
    public function renewalSadaat()
    {
        return Excel::download(new SadaatRenewal, 'SadaatRenewal.xlsx');
    }
    public function freshAbshaar()
    {
        return Excel::download(new AbshaarFresh, 'AbshaarFresh.xlsx');
    }
    public function renewalAbshaar()
    {
        return Excel::download(new AbshaarRenewal, 'AbshaarRenewal.xlsx');
    }
}
