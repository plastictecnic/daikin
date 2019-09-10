<?php

namespace App\Http\Controllers;

use App\Code;
use App\Part;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $parts = Part::orderBy('created_at', 'desc')->take(5)->get();
        $codes = Code::all();
        return view('home')
            ->with('codes', $codes)
            ->with('parts', $parts)
            ->with('counter', 1);
    }
}
