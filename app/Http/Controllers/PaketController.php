<?php

namespace App\Http\Controllers;


use App\Paket;
use Dotenv\Validator;
use http\Message;
use Illuminate\Http\Request;


class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::all();
        return response()->json($pakets);
    }
    public  function create(Request $request)
    {

    }
    public function store(Request $request)
    {
        return Paket::create($request->all());
    }
    public function show($pakets)
    {
        $data = Paket::where('id', $pakets)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['message' => 'data tidak ditemukan'], 404);
    }
    public function destroy($pakets)
    {
        $data = Paket::where('id', $pakets)->first();
        if (empty($data)) {
            return response()->json([
                'message' => 'Data tidak di temukan'], 404);
        }
        $data->delete();
        return response()->json([
            'message' => 'data telah dihapus'
        ]);
    }
    public function update(Request $request, Paket $paket)
    {
        $paket->update($request->all());
        return response()->json([
            'message'=>'data berhasil di update',
            'data'=>$paket
        ]);
    }
}

