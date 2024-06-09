<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Classes;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $trainers = Trainer::all();
        $classes = Classes::all();
        return view('admin.layouts.index', compact('users','trainers','classes'));
    }
}
