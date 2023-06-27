<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ZohoLoginController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view('loginZoho');
    }

    public function login(Request $request)
    {
        $email = bin2hex($request->input('email'));
        $password = bin2hex($request->input('password'));
        //dd($email, $password);
        //staging/testing
        $response = Http::get("http://43.252.214.183/rest/zoho/login/u/{$email}/p/{$password}");
        //zoho prod url
        // $response = Http::get("http://127.0.01:8080/rest/zoho/login/u/{$email}/p/{$password}");
        $result = $response->body();
        if ($result == 1) {
            $user = User::where('email', $request->input('email'))->first();
            Auth::login($user);
            return redirect('/index');
        } else {
            return redirect()->route('zoho-login')->withErrors('These credentials do not match our records.');

        }
    }
        
    public function logout(Request $request)
    {
        // Clear the session data
        Session::forget('username');
        Session::flush();
        return redirect('/loginZoho');
    }
}
