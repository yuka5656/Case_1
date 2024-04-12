<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Timestamp;
use App\Models\User;
use App\Models\Breaktime;

class AuthenticatedSessionController extends Controller
{

   public function index()
   {
    return view('index');
   }

   public function create(Request $request)
   {
      $user_id = $request->only(['user_id', 'work_End']);
      $timestamp = Carbon::now();
      // dd($user_id, $timestamp);

      Timestamp::create([
         'user_id' => $user_id,
         'work_Start' => $timestamp,
      ]);

      return redirect('/');
   }

   public function attendance()
   {

    return view('attendance');
   }
}
