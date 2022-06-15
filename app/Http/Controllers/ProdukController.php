<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();

        return view('produk.index',compact('produks'));

    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        Produk::create($request->all());

        return redirect()->route('produks.index')
                        ->with('success','Produk berhasil ditambahkan!');
    }

    public function show(Produk $produk)
    {
        return view('produk.show',compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit',compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
        ]);

        $produk->update($request->all());

        return redirect()->route('produks.index')
                        ->with('success','Produk berhasil diubah!');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produks.index')
                        ->with('success','Produk berhasil dihapus!');
    }
}
