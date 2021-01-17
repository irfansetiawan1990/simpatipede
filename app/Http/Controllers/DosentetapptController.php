<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Dosentetappt;

class DosentetapptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Dosentetappt = Dosentetappt::latest()->paginate(10);

        return view('Dosentetappt.index',compact('Dosentetappt'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dosentetappt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'nama_dosen'=> 'required',
                'nidn'=> 'required',
                'pendidikan_pasca_sarjana',
                'bidang_keahlian',
                'kesesuaian_inti_ps',
                'jabatan_akademik',
                'sertifikat_pendik_prof',
                'sertifikat_kompetensi_prof',
                'matkul_ps_akre',
                'kesesuaian_bid_keahlian',
                'matkul_diampu_pslain'
        ]);

        Dosentetappt::create($request->all());
        return redirect()->route('Dosentetappt.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_dosen_tetap_pt)
    {
        $Dosentetappt = Dosentetappt::find($id_dosen_tetap_pt);
        return view('Dosentetappt.show', compact('Dosentetappt'));
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id_dosen_tetap_pt)
    {
        $Dosentetappt=Dosentetappt::find($id_dosen_tetap_pt);
        return view ('Dosentetappt.edit', compact('Dosentetappt'));
    }

    /**
  
     */
    public function update(Request $request, $id_dosen_tetap_pt)
    {
        $request -> validate([
                'nama_dosen'=> 'required',
                'nidn'=> 'required',
                'pendidikan_pasca_sarjana',
                'bidang_keahlian',
                'kesesuaian_inti_ps',
                'jabatan_akademik',
                'sertifikat_pendik_prof',
                'sertifikat_kompetensi_prof',
                'matkul_ps_akre',
                'kesesuaian_bid_keahlian',
                'matkul_diampu_pslain'
                ]);

       $Dosentetappt = Dosentetappt::find($id_dosen_tetap_pt)->update($request->all());

        return redirect()->route('Dosentetappt.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dosen_tetap_pt)
    {
        $Dosentetappt = Dosentetappt::find($id_dosen_tetap_pt)->delete();
        return redirect()->route('Dosentetappt.index')
                        ->with('berhasil','data sudah dihapus');
    }
}