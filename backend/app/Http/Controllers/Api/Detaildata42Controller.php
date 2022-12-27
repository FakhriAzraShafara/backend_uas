<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatResource;
use App\Models\Detaildata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Detaildata42Controller extends Controller
{
    public function show($id)
    {
        $detail = Detaildata::findOrFail($id);
        return new FormatResource(true, 'Get succcess', $detail);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_agama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'foto_ktp' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatResource(false, 'Validation failed', $validator->errors());
        }

        $detail = Detaildata::create([
            'id_user' => $request->id_user,
            'id_agama' => $request->id_agama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'umur' => $request->umur,
            'foto_ktp' => $request->foto_ktp,
        ]);
        $detail->save();

        if ($detail) {
            return new FormatResource(true, 'Create success', $detail);
        }
        return new FormatResource(false, 'Create failed', null);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required',
            'id_agama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'foto_ktp' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatResource(false, 'Validation failed', $validator->errors());
        }

        $detail = Detaildata::findOrFail($id);
        $detail->id_user = $request->id_user;
        $detail->id_agama = $request->id_agama;
        $detail->alamat = $request->alamat;
        $detail->tempat_lahir = $request->tempat_lahir;
        $detail->tanggal_lahir = $request->tanggal_lahir;
        $detail->umur = $request->umur;
        $detail->foto_ktp = $request->foto_ktp;
        $detail->save();

        if ($detail) {
            return new FormatResource(true, 'Update success', $detail);
        }
        return new FormatResource(false, 'Update failed', null);
    }
}
