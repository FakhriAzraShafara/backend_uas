<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class User42Controller extends Controller
{
    public function profile()
    {
        $agama = Http::get('http://localhost:8000/api/agama42')['data'];
        return view('user.profile', [
            'agamas' => $agama
        ]);
    }

    public function editimage(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->foto = $request->foto;

        if ($request->hasFile('foto')) {
            $foto_name = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
        }

        Http::put('http://localhost:8000/api/user42/UpdateFoto42/' . $id, [
            'foto' => $foto_name
        ]);

        return redirect('/profile42');
    }

    public function editpassword(Request $request, $id)
    {
        Http::put('http://localhost:8000/api/user42/UpdatePassword42/' . $id, [
            'password' => $request->password
        ]);

        return redirect('/profile42');
    }

    public function index()
    {
        $user = Http::get('http://localhost:8000/api/user42')['data'];
        return view('user.user', [
            'users' => $user,
            'no' => 1,
            'page' => "List user"
        ]);
    }

    public function show($id)
    {
        $user = Http::get('http://localhost:8000/api/user42/' . $id)['data'];

        // dd($user);
        return view('user.userdetail', [
            'user' => $user,
            'page' => "Detail user"
        ]);
    }

    public function destroy($id)
    {
        Http::delete('http://localhost:8000/api/user42/' . $id);
        return redirect('/user42');
    }

    public function update($id)
    {
        Http::put('http://localhost:8000/api/user42/' . $id);
        return redirect('/user42');
    }
}
