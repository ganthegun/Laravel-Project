<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PlatinumController extends Controller
{
   // list all platinum and crmp
   public function list()
   {
       return view('platinum.list', [
           'users' => User::whereIn('role', ['platinum', 'crmp'])->get()
       ]);
   }
}
