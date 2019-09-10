<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Code;
use Illuminate\Support\Facades\Cookie;

class CodeController extends Controller
{

    public function clear(){
        return redirect()->back()->with('ok', 'Part verification code has been cleared. Please choose part')->cookie('part_num', '', 0);
    }

    public function create(){
        $code = Code::all();
        return view('code-create')
            ->with('codes', $code)
            ->with('counter', 1);
    }

    public function store(Request $r){

        $code = Code::all();

        $r->validate([
            'sn' => 'required',
            'description' => 'required'
        ]);

        Code::create([
            'sn' => $r->sn,
            'description' => $r->description
        ]);

        return redirect()->back()
            ->with('status', 'Added Part Code')
            ->with('codes', $code)
            ->with('counter', 1);
    }

    public function setCode(Request $r){
        $r->validate(['code' => 'required']);

        $part_code = Code::find($r->code);

        return redirect()->back()
            ->with('ok', 'PART QR CODE : '. $part_code->sn . ' has been set')
            ->cookie('part_num', $part_code->sn, 3600);
    }
}
