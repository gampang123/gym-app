<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;

class UserdasboardController extends Controller
{
    public function index()
    {
        return view('user.layouts.index');
    }

    public function schedule()
    {
        $classes = Classes::with('trainer')->get();
        $groupedClasses = $classes->groupBy('day');
        return view('user.schedule', compact('classes','groupedClasses'));
    }
}
