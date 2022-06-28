<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use Illuminate\Http\Request;
use PDF;





class CetakPdf extends Controller
{
    //
    public function generatePdf()
    {
        $inventaris = inventaris::whereHas('verifikasi', function ($query) {
            $query->where('status', 'Terverifikasi');
        })->get();

        $pdf = PDF::loadView('inventaris.cetak', compact(['inventaris']))->setPaper('a4');
        // return view('commodities.pdf', compact(['commodities', 'sekolah']));
        return $pdf->stream('print.pdf');
    }

    //
    public function generatePdfOne($id)
    {

        $inventaris = inventaris::find($id);
        $pdf = PDF::loadView('inventaris.cetakone', compact(['inventaris']))->setPaper('a4');
        // return view('commodities.pdf', compact(['commodities', 'sekolah']));
        return $pdf->stream('print.pdf');
    }
}
