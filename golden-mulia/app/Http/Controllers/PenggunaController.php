<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10); 
        $pengguna = Pengguna::paginate($limit);
        if(isset($request['query']) && $request['query'] !== '' && $request['query'] !== 'undefined'){
            $pengguna = Pengguna::where('nama_pengguna', 'like', '%'.$request['query'].'%')
            ->orWhere('alamat', 'like', '%'.$request['query'].'%')
            ->paginate($limit);
        }
        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengguna = new Pengguna();
        $pengguna->nama_pengguna = $request->nama_pengguna;
        $pengguna->alamat = $request->alamat;
        $pengguna->save();
        return redirect()->route('pengguna');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengguna $pengguna, $id)
    {
        $data = $pengguna->find($id);
        return view('pengguna.add', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengguna $pengguna, $id)
    {
        $data = $request->all();
        $pengguna = $pengguna->find($id);
        $pengguna->update($data);
        return redirect()->route('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Pengguna::find($id);
        $data->delete();
        return redirect()->route('pengguna');
    }
}