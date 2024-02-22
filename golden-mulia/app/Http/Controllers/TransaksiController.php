<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10); 
        $transaksi = Transaksi::paginate($limit);
        if(isset($request['query']) && $request['query'] !== '' && $request['query'] !== 'undefined'){
            $transaksi = Transaksi::where('nama_pengguna', 'like', '%'.$request['query'].'%')
            ->orWhere('nama_produk', 'like', '%'.$request['query'].'%')
            ->paginate($limit);
        }
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = Pengguna::all();
        $produk = Produk::all();
        return view('transaksi.add', compact('produk', 'pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengguna = Pengguna::find($request->id_pengguna);
        $produk = Produk::find($request->id_produk);
        $transaksi = new Transaksi();
        $transaksi->id_produk = $request->id_produk;
        $transaksi->id_pengguna = $request->id_pengguna;
        $transaksi->nama_pengguna = $pengguna->nama_pengguna;
        $transaksi->nama_produk = $produk->nama_produk;
        $transaksi->qty = $request->jumlah;
        $transaksi->jumlah = $request->jumlah * $produk->harga;
        $transaksi->save();
        return redirect()->route('transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi, $id)
    {
        $pengguna = Pengguna::all();
        $produk = Produk::all();
        $data = $transaksi->find($id);
        return view('transaksi.add', compact('data', 'pengguna', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi, $id)
    {
        $pengguna = Pengguna::find($request->id_pengguna);
        $produk = Produk::find($request->id_produk);
        $data = $request->all();
        $transaksi = $transaksi->find($id);
        $data['nama_pengguna'] = $pengguna->nama_pengguna;
        $data['nama_produk'] = $produk->nama_produk;
        $data['jumlah'] = $produk->harga * $request->jumlah;
        $data['qty'] = $request->jumlah;
        $transaksi->update($data);
        return redirect()->route('transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Transaksi::find($id);
        $data->delete();
        return redirect()->route('transaksi');
    }
}