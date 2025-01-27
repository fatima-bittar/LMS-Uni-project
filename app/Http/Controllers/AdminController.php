<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
{
    $grades = Grade::all();
    $grade= Grade::first();
    return view('admin.dashboard', compact('grade'));
}

}
