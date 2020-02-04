<?php

namespace App\Http\Controllers\InscritAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ResetsPasswords;
//Auth Facade
use Illuminate\Support\Facades\Auth;

//Password Broker Facade
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{

	 protected $redirectTo = '/inscriptions/login';
   use ResetsPasswords;

    //Show form to seller where they can reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('website.inscriptions.password.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


public function broker()
    {
        return Password::broker('inscrits');
    }

    //returns authentication guard of seller
    protected function guard()
    {
        return Auth::guard('inscrit');
    }

}
