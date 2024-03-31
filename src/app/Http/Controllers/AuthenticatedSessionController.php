<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timestamp;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{

   public function index()
   {
    return view('index');
   }

   public function create(Request $request)
   {
    $timestamp = $request->all();
    Timestamp::create($timestamp);

    return redirect('/');
   }

   public function attendance()
   {

    return view('attendance');
   }
}
