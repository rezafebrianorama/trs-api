<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukRequest;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $produk = Produk::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $produk], 200);
        } else {
            $produk = Produk::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $produk], 200);
        }
    }

    function store(ProdukRequest $request)
    {
        $produk = Produk::create($request->all());
        return response()->json(['msg' => 'Data created', 'data' => $produk], 201);
    }

    function update($id, ProdukRequest $request)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $produk], 200);
    }

    function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
