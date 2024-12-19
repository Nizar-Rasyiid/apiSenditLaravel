<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Validator;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return response()->json($pemesanans);
    }

    public function show($id_pemesanan)
    {
        $pemesanan = Pemesanan::find($id_pemesanan);
        if (is_null($pemesanan)) {
            return response()->json(['message' => 'Pemesanan not found'], 404);
        }
        return response()->json($pemesanan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:users,id_user',
            'jarak' => 'required|integer|numeric',
            'lokasi_jemput' => 'required|string|string',
            'lokasi_tujuan' => 'required|string|string',
            'status' => 'required|in:On Progress,Selesai|string',
            'nama_penerima' => 'required|string|string',
            'id_kurir' => 'required|exists:users,id_user',
            'no_hp_penerima' => 'string',
            'jenis_paket' => 'string',
            'keterangan' => 'string',
            'nama_pengirim' => 'string',
            'no_hp_pengirim' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $pemesanan = Pemesanan::create($request->all());
        return response()->json($pemesanan, 201);
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::find($id);
        if (is_null($pemesanan)) {
            return response()->json(['message' => 'Pemesanan not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_user' => 'required|exists:users,id_user',
            'jarak' => 'required|integer',
            'lokasi_jemput' => 'required|string',
            'lokasi_tujuan' => 'required|string',
            'status' => 'required|in:On Progress,Selesai',
            'nama_penerima' => 'required|string',
            'id_kurir' => 'required|exists:users,id_user',
            'no_hp_penerima' => 'string',
            'jenis_paket' => 'string',
            'keterangan' => 'string',
            'nama_pengirim' => 'string',
            'no_hp_pengirim' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $pemesanan->update($request->all());
        return response()->json($pemesanan);
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::find($id);
        if (is_null($pemesanan)) {
            return response()->json(['message' => 'Pemesanan not found'], 404);
        }

        $pemesanan->delete();
        return response()->json(['message' => 'Pemesanan deleted successfully']);
    }
}
