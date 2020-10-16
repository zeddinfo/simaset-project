<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function index(){
        $title = 'Login Administrator';
        return view('auth.login', compact('title'));
    }

    public function auth(Request $request){
        if(Session::get('login')){
            return redirect('/home');
        }

        if($request->isMethod('post')){
            $data = DB::select("
                select username, password as password, name from users where username = '$request->username' 
            ");

            if($data && $data[0]->password == md5($request->password)){
                Session::put('username', $data[0]->username);
                Session::put('name', $data[0]->name);
                toastr()->success('Authentikasi Berhasil');
                return redirect('/dashboard');
            }
            toastr()->warning('Username atau Password Salah');
            return redirect('/');
        }
        return view('/');
    }
}
