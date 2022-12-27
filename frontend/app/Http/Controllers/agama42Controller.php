<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Agama42Controller extends Controller
{
    public function index()
    {
        # code...
        //
        $clients = new Client();
        $response = $clients->request('GET', 'http://localhost:8000/api/agama42/');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody();

        $data = json_decode($body,true);

        // dd($data);
        return view('agama.agama',[
            'data' => $data['data'],
            'no' => 1
        ]);
    }
    public function store(Request $request)
    {
        # code...
        $request -> validate([
            'nama_agama'=>'required',
        ]);
        $clients = new Client();
        $response = $clients->request('POST', 'http://localhost:8000/api/agama42/',
        [
            'json' => [
                'nama_agama' => $request -> nama_agama,
            ]
        ]
    );
        return redirect('/agama42')->with('success','tambah agama berhasil');

    }

    public function update(Request $request, $id)
    {
        # code...
        $request->validate([
            'nama_agama' => 'required',
        ]);

        $client = new Client;
        $response = $client->request('PUT', 'http://localhost:8000/api/agama42/' . $id, [
            'json' => [
                'nama_agama' => $request->nama_agama,
            ]
        ]);

        return redirect('/agama42')->with('success', 'Agama berhasil diupdate');

    }

    public function destroy($id)
    {
        # code...
        $client = new Client();
        $response = $client->request('delete', 'http://localhost:8000/api/agama42/' . $id);
        return redirect('/agama42')->with('success', 'Berhasil Menghapus');
    }
}
