<?php

namespace App\Http\Controllers;
// require '../vender/autoload.php';

use Illuminate\Http\Request;
use App\Models\Timestamp;
use App\Models\User;
// use Carbon\Carbon;


class RegisteredUserController extends Controller
{

    public function create(Request $request)
   {
    $timestamp = $request->all();
    Timestamp::create($timestamp);

    return redirect('/');
   }

    public function register()
   {
    return view('register');
   }
}
