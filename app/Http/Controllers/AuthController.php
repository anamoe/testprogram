<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('login');
    }

    public function postlogin(Request $request)
    {

        $input = $request->all();



        if (User::where('username', '=', $input['username'])->first() == true) {
            if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            
                   
                switch (Auth::user()->role) {
                    case 'admin':
                        return redirect('/akun');
                        break;
                    case 'author':
                        return redirect('/');
                        break;
                    default:
                        return redirect('/login');
                        break;
                }
            } else {
                return redirect()->back()
                    ->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()
                ->with('error', 'Username tidak ada atau belum terdaftar');
     
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login')
        ->with('message', 'Berhasil Logout');
    }
}
