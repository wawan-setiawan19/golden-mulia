<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10); 
        $produk = Produk::paginate($limit);
        if(isset($request['query']) && $request['query'] !== '' && $request['query'] !== 'undefined'){
            $produk = Produk::where('nama_produk', 'like', '%'.$request['query'].'%')
            ->paginate($limit);
        }
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->save();
        return redirect()->route('produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk, $id)
    {
        $data = $produk->find($id);
        return view('produk.add', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk, $id)
    {
        $data = $request->all();
        $produk = $produk->find($id);
        $produk->update($data);
        return redirect()->route('produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect()->route('produk');
    }
}