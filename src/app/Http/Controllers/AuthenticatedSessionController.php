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
      $user_id = $request->input('user_id');
      $work_start = Carbon::now();
      timestamp::create([
         'user_id' => $user_id,
         'work_Start' => $work_start,
      ]);

      if($work_start){

      }
      
      return redirect('/');
   }

   public function store(Request $request)
   {
      $user_id = $request->input('user_id');
      $work_end = timestamp::where('user_id', $user_id)->latest()->first();
      dd($user_id, $work_end);


      timestamp::update([
         'work_End' => Carbon::now(),
      ]);
      

      return redirect('/');

   }

   public function attendance()
   {

    return view('attendance');
   }
}
