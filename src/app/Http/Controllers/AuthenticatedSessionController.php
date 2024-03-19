<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{

   public function index()
   {
    return view('index');
   }

   public function Timestamps(Request $request)
   {
    $timestamp = timestamp::all();
    timestamp::create($timestamp);

    return redirect('/');
   }

   public function attendance()
   {

    return view('attendance');
   }
}
