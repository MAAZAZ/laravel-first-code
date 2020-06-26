<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UsersController extends Controller
{
 public function showUserName(){
     return 'maazaz zakaria';
 }
}
