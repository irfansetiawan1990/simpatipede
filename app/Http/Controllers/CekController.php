<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cek;

class CekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
        $data= Cek::latest()->paginate(10);

        return view('Cek.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('Cek.create');
    }


    public function store(Request $request)
    {
        $request->validate([
      
       			'nama' => 'required',
		        'barang' => 'required'
		        
        ]);

        Cek::create($request->all());
        return redirect()->route('Cek.index')
                        ->with('berhasil','datadisimpan');
    }


    public function show(Cek $data)
    {
        return view('Cek.show', compact('data'));
    }

   
    public function edit(Cek $data)
    {
        return view ('Cek.edit', compact('data'));
    }

  
    public function update(Request $request, Cek $data)
    {
        $request -> validate([
                'nama' => 'required',
                'barang' => 'required'

        ]);

        $data->update($request->all());

        return redirect()->route('Cek.index')
                        ->with('berhasil','data sudah datadisimpan');
    }


    public function destroy(Cek $data)
    {
        $data->delete();
        return redirect()->route('Cek.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
