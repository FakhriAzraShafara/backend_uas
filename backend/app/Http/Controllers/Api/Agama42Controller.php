<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatResource;
use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Agama42Controller extends Controller
{
    //
    public function index()
    {
        # code...
        $agama = Agama::all();
        return new FormatResource(true, 'Berhasil', $agama);
    }
    public function store(Request $request)
    {
        # code...
        $validator = Validator::make($request->all(),[
            "nama_agama" => 'required'
        ]);
        if ($validator->fails()) {
            # code...
            return new FormatResource(false, 'error', $validator->errors());
        }
        $agama = Agama::create([
            'nama_agama' => $request->nama_agama,
        ]);
         if ($agama) {
            # code...
            return new FormatResource(true, 'berhasil', $agama);
         }
    }

    public function update(Request $request, $id)
    {
        # code...
        $validator = Validator::make($request->all(),[
            "nama_agama" => 'required'
        ]);
        if ($validator->fails()) {
            # code...
            return new FormatResource(false, 'error', $validator->errors());
        }
        $agama = Agama::findOrFail($id);
        $agama -> nama_agama=$request->nama_agama;
        $agama -> save();
         if ($agama) {
            # code...
            return new FormatResource(true, 'berhasil', $agama);
         }
    }
    public function destroy($id)
    {
        # code...
        $agama = Agama::findOrFail($id);
        $agama->delete();
        if ($agama) {
            return new FormatResource(true, 'berhasil', $agama);
        }
    }
}
