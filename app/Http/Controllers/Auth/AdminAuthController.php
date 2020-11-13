<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('postLogout');
    }

    public function getLogin()
    {
        return view('admin.loginAdmin');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
         ]);
          if(!Auth::guard('admin')->attempt(['email' => $request->email,
                                             'password' =>$request->password]))
         {
              return redirect()->route('admin.login')
                               ->with('gagal','email and password you entered are incorrect');
         }
         else
         {
              return  redirect()->route('home');
         }
  
      
    }

    public function postLogout()
    {
        auth()->guard('admin')->logout();
        session()->flush();

        return redirect()->route('admin.login');
    }
}
