<?php

namespace App\Http\Controllers\Web\App\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return redirect()->route('login');
    }
}
