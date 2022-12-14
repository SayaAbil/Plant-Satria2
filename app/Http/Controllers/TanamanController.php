<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanaman = Tanaman::all();
        return  view('dashboard', compact('tanaman'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'code'=>'required|max:5',
            'name'=>'required|min:2',
            'type'=>'required',
            'note'=>'required|min:4',
        ]);

        Tanaman::create([
            'code' => $request->code,
            'name' => $request->name,
            'type' => $request->type,
            'note' => $request->note
        ]);

        return redirect('/')->with('addPlant','Berhasil menambahkan data Plant!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function show(Tanaman $tanaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanaman $tanaman)
    {
        return view('edit', compact('tanaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanaman $tanaman)
    {
        $tanaman = Tanaman::where('id', $tanaman->id)->update([
            'growth' => $request->pertumbuhan,
            'code' => $request->code,
            'name' => $request->name,
            'type' => $request->type,
            'note' => $request->note
        ]);

        return redirect('/')->with('editPlant','Berhasil menambahkan data Plant!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanaman  $tanaman
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Tanaman::where('id',$id)->delete();
        return redirect()->route('index')->with('deletePlant','Berhasil Menghapus Data Tanaman!');
    }
}
