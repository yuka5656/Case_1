<?php

namespace App\Http\Controllers;
// require '../vender/autoload.php';

use Illuminate\Http\Request;
// use Carbon\Carbon;


class RegisteredUserController extends Controller
{

    public function create(Request $request)
   {
    $timestamp = new DateTime();
    // Timestamp::create($timestamp);

    return redirect('/');
   }

    public function register()
   {
    return view('register');
   }
}
