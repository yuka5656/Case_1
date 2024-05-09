<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timestamp;
use App\Models\User;


class RegisteredUserController extends Controller
{
    public function register()
   {
    return view('register');
   }
}
