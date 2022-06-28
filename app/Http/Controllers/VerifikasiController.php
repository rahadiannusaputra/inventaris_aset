<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use App\Models\Ruangan;
use App\Models\Verifikasi;
use Illuminate\Http\Request;


class VerifikasiController extends Controller
{
    public function verification()
    {
        $this->authorize('verif');
        $data = [
            'dataInventaris' => Verifikasi::with('inventaris')->where('verifikasis.status', 'Menunggu')->orWhere('verifikasis.status', 'Ditolak')->get()
        ];
        return view('verifikasi.index', $data);
    }

    public function detail(inventaris $inventaris)
    {
        $this->authorize('verif');
        $data = [
            'dataInventaris' => $inventaris->load('verifikasi'),
            'ruangan' => Ruangan::all()
        ];


        return view('verifikasi.detail', $data);
    }
    public function confirm(inventaris $inventaris)
    {
        $this->authorize('verif');
        if ($inventaris->verifikasi->status === 'Terverifikasi') {
            return redirect()->route('verifikasi.detail', $inventaris->id)->with('alreadyVerificated', "Data Sudah Terverifikasi!");
        }

        $inventaris->verifikasi()->update([
            'status' => 'Terverifikasi',
            'alasan' => null
        ]);

        return redirect()->route('verifikasi.index')->with('success', "Data berhasil disetujui");
    }

    public function decline(inventaris $inventaris, Request $request)
    {
        $this->authorize('verif');

        if ($inventaris->verifikasi->status === 'Ditolak') {
            return redirect()->route('verifikasi.detail', $inventaris->id)->with('alreadyDeclined', "Data sudah ditolak!");
        }

        $inventaris->verifikasi()->update([
            'status' => 'Ditolak',
            'alasan' => $request->alasan
        ]);



        return redirect()->route('verifikasi.index')->with('error', "Data berhasil ditolak");
    }
}
