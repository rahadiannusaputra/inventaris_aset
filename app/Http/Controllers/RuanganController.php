<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $b = [
            'dataRuangan' => Ruangan::with('bidang')->withCount('inventaris')->get(),
            'bidang' => Bidang::all()

        ];

        // dd($b);

        return view('ruangan.tables', $b);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //






        return view('ruangan.tables');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $validatedata = $request->validate([
            'id_bidang' => 'required',
            'nama_ruangan' => 'required',

        ]);

       

        Ruangan::create($validatedata);


        return redirect()->route('ruangan.index')->with('success', 'Data Berhasil dimasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedata = $request->validate([
            'id_bidang' => 'required',
            'nama_ruangan' => 'required',

        ]);



        Ruangan::where('id', $id)->update($validatedata);


        return redirect()->route('ruangan.index')->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            Ruangan::where('id', $id)->delete();
        } catch (\Throwable $th) {
            //throw $th;
            abort(500);
        }



        return redirect()->route('ruangan.index')->with('delete', 'Ruangan Berhasil dihapus');
    }
}
