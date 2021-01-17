<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visimisi;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $visimisi = Visimisi::latest()->paginate(10);

        return view('visimisi.index',compact('visimisi'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visimisi.create');
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
            'visimisi'=> 'required',
 

        ]);

        Visimisi::create($request->all());
        return redirect()->route('visimisi.index')
                        ->with('berhasil','datadisimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Visimisi $visimisi)
    {
        return view('visimisi.show', compact('visimisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visimisi $visimisi)
    {
        return view ('visimisi.edit', compact('visimisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visimisi $visimisi)
    {
        $request-> validate([
            'visimisi'=> 'required',


        ]);

        $visimisi->update($request->all());

        return redirect()->route('visimisi.index')
                        ->with('berhasil','data sudah datadisimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();
        return redirect()->route('visimisi.index')
                        ->with('berhasil','data sudah dihapus');
    }
}
