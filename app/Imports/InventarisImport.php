<?php

namespace App\Imports;

use App\Models\inventaris;
use App\Models\Ruangan;
use App\Models\Verifikasi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class InventarisImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        Validator::make($rows->toArray(), [
            '*id_ruangan' => 'required',
            '*kode_barang' => 'required|unique:inventaris,kode_barang',
            '*keterangan' => 'required',
            '*jenis_mutasi' => 'required',
            '*harga' => 'required',
            '*tahun_perolehan' => 'required',
            '*kondisi' => 'required',
            '*tag' => 'required',
            '*uraian' => 'required'
        ])->validate();

        foreach ($rows as $row) {



            $ruangan = Ruangan::where('nama_ruangan', $row['id_ruangan'])->first();

            $inventaris = inventaris::create([
                //
                'kode_barang' => $row['kode_barang'],
                'id_ruangan' => $ruangan->id,
                'keterangan' => $row['keterangan'],
                'jenis_mutasi' => $row['jenis_mutasi'],
                'harga' => $row['harga'],
                'tahun_perolehan' => $row['tahun_perolehan'],
                'kondisi' => $row['kondisi'],
                'tag' => $row['tag'],
                'uraian' => $row['uraian']
            ]);
            Verifikasi::create([
                'id_inventaris' => $inventaris->id
            ]);
        }
    }
}
