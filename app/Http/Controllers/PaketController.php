<?php

namespace App\Http\Controllers;


use App\Paket;
//use Dotenv\Validator;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;


class PaketController extends Controller
{
    public function index()
    {
//        $pakets = Paket::all();
        $pakets = Paket::with('tujuan')->get();

        return response()->json([$pakets]);
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'paket' => 'required',
            'id_tujuan' => 'required',
            'car' => 'required',
            'hotel' => 'required',
            'bonus' => 'required'

        ]);
//        dd($validate);
        if ($validate->passes()) {
            $paket=Paket::create($request->all());
            return response()->json([
                'message' => 'data berhasil disimpan',
                'data' => $paket
            ]);
        } else {
            return response()->json([
                'message' => 'data gagal disimpan',
                'data' => $validate->errors()->all()
            ]);
        }

//        return Paket::create($request->all());
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
    public function update(Request $request,  $paket)
    {
        $data = Paket::where('id', $paket)->first();
        if (!empty($data)){
            $validate= Validator::make($request->all(),[
                'paket'=>    'required',
                'id_tujuan'=>'required',
                'car'=>      'required',
                'hotel'=>    'required',
                'bonus'=>    'required'

            ]);

            if ($validate->passes()){
                $data->update($request->all());
                return response()->json([
                    'message'=> 'data berhasil disimpan',
                    'data'=>$data
                ]);
            } else{
                return response()->json([
                    'message'=> 'data gagal disimpan',
                    'status'=>$validate->errors()->all()
                ]);
            }
        }
        return response()->json(['message'=> 'data tidak ditemukan'], 404);
//        $paket->update($request->all());
//        return response()->json([
//            'message'=>'data berhasil di update',
//            'data'=>$paket
//        ]);
    }
}

