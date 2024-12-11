<?php

namespace Tenants\Http\Controllers;

use App\Http\Controllers\Controller;
use PragmaRX\Google2FA\Google2FA;

class TenantsController extends Controller
{
    public function index () {
        return view('google_otp');
    }

    public function otpVerification () {
        return view('firebase_otp');
    }

}
