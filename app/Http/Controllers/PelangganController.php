<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    public function login(){
return view('login');
    }
    public function daftar(){
return view('daftar');
    }
    public function aksi_register(Request $request)
    {

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);

        $pelanggan = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('pelanggan.login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    public function update_profil(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email,' . auth()->id(),
        //     'no_hp' => 'required|string|max:15',
        //     'alamat' => 'required|string|max:255',
        // ]);

        $pelanggan = auth()->user();
        $pelanggan->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.profil')->with('success', 'Update profil berhasil.');
    }


    // Login pelanggan
    public function aksi_login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['email' => 'Login gagal, periksa kembali kredensial Anda']);
        }

        return redirect()->route('pelanggan.profil');
    }

    // Profil pelanggan
    public function profil()
    {
        $pelanggan = Auth::user();
        return view('profil', compact('pelanggan'));
    }
}
