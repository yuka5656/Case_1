<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Timestamp;
use App\Models\User;
use App\Models\Breaktime;
use Illuminate\Support\Facades\DB;

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

      $oldTimeIn = timestamp::where('user_id', $user_id)->latest()->first();

      $oldDay = '';

      if($oldTimeIn) {
         $oldTimeWorkStart = new Carbon($oldTimeIn->work_Start);
         $oldDay = $oldTimeWorkStart->today();
      }

      $today = Carbon::today();

      if(($oldDay == $today) && (empty($oldTimeIn-> work_End))) {
         return redirect('/')->with('message', '出勤済みです');
      }

      timestamp::create([
         'user_id' => $user_id,
         'today' => $today,
         'work_Start' => $work_start,
      ]);

      return redirect('/')->with('message', '出勤を開始しました');
   }

   public function workEnd(Request $request)
   {
      $user_id = $request->input('user_id');

      $work_end = timestamp::where('user_id', $user_id)->latest()->first();

      $work_end->update([
         'work_End' => Carbon::now(),
      ]);

      return redirect('/')->with('message', 'お疲れさまでした');
   }

   public function breakStart(Request $request)
   {
      $user_id = $request->input('user_id');
      $break_start = Carbon::now();

      $oldBreakIn = breaktime::where('user_id', $user_id)->latest()->first();

      $oldDay = '';

      if($oldBreakIn) {
         $oldBreakTimeStart = new Carbon($oldBreakIn->break_Start);
         $oldDay = $oldBreakTimeStart->today();
      }

      $today = Carbon::today();

      if(($oldDay == $today) && (empty($oldBreakIn-> break_End))) {
         return redirect('/')->with('message', '休憩開始してます');
      }

      breaktime::create([
         'user_id' => $user_id,
         'break_Start' => $break_start,
      ]);

      return redirect('/')->with('message', '休憩を開始します');
   }

   public function breakEnd(Request $request)
   {
      $user_id = $request->input('user_id');

      $break_end = breaktime::where('user_id', $user_id)->latest()->first();

      $break_end->update([
         'break_End' => Carbon::now(),
      ]);

      return redirect('/')->with('message', '休憩時間を終了しました');
   }

   public function attendance()
   {

      $users = User::Paginate(2);

      return view('attendance', ['users' => $users]);
   }

   private $user;

   public function __construct(User $user)
   {

      $this->user = $user;

      $attendances = $this->user->getDailyAttendance();

      // dd($attendance,$users);
      var_dump($attendances);

      return view('attendance', compact('attendances', 'user',  ));
   }

   public function getPaginate(){

      
   }
}
