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

   public function workStart(Request $request)
   {
      $user_id = $request->input('user_id');
      $work_start = Carbon::now();

      timestamp::create([
         'user_id' => $user_id,
         'work_Start' => $work_start,
      ]);

      
      return redirect('/');
   }

   public function workEnd(Request $request)
   {
      $user_id = $request->input('user_id');

      $work_end = timestamp::where('user_id', $user_id)->latest()->first();

      $work_end->update([
         'work_End' => Carbon::now(),
      ]);

      return redirect('/');
   }

   public function breakStart(Request $request)
   {
      $user_id = $request->input('user_id');
      $break_start = Carbon::now();

      breaktime::create([
         'user_id' => $user_id,
         'break_Start' => $break_start,
      ]);

      return redirect('/');
   }

   public function breakEnd(Request $request)
   {
      $user_id = $request->input('user_id');

      $break_end = breaktime::where('user_id', $user_id)->latest()->first();

      $break_end->update([
         'break_End' => Carbon::now(),
      ]);

      return redirect('/');
   }

   public function attendance(Request $request)
   {
      dd($request->date);
    return view('attendance');
   }
}
