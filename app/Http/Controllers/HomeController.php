<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

   
    public function index()
{
    if (Auth::id()) {
        $usertype = Auth::user()->userType;
        if ($usertype == 'user') {
            return redirect()->route('user');
        } else if ($usertype == 'admin') {
            return redirect()->route('admin');
        } else if ($usertype == 'member') {
            return view('member.dashboard');
        } else {
            return redirect()->back();
        }
    }
}

}
