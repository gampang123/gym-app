<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Program;
class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $programs = Program::all();
        return view('user.dashboard', compact('products','programs'));
    }
}
