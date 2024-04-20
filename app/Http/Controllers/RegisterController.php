<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\role;
use Faker\Provider\Uuid;
use Session;

class RegisterController extends Controller
{
    public function __construct(){
        $this->role = new Role();
    }
    public function register()
    {
        return view('backend.component.register');
    }

    public function actionregister(Request $request)
    {
        $role = Role::where('name', 'user')->first();
        $user = User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $role->id,
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/');
    }
}
