<?php

namespace App\Http\Controllers;

use App\Code;
use App\Part;
use Illuminate\Http\Request;
use Auth;

class PartController extends Controller
{
    public function check(Request $r){

        $r->validate([
            'qrcode' => 'required'
        ]);

        $code_id = Code::where('sn', $r->qrcode)->first();

        $parts = Part::orderBy('created_at', 'desc')->take(5)->get();

        if($r->qrcode == $r->cookie('part_num')){
            // qrcode status userid code id

            $this->updatePart($r->qrcode, Auth::user()->id, $code_id->id, 'PASS');

            return redirect()->back()->with('status', 'PASS')->with('parts', $parts)->with('counter', 1);
        }else{

            if($code_id != null){
                $this->updatePart($r->qrcode, Auth::user()->id, $code_id->id, 'FAIL');
            }else{
                $this->updatePart($r->qrcode, Auth::user()->id, 1, 'FAIL');
            }

            return redirect()->back()->with('alert', 'FAIL')->with('parts', $parts)->with('counter', 1);
        }
    }

    private function updatePart($qrcode, $user, $code_id, $status){
        Part::create([
            'qrcode' => $qrcode,
            'status' => $status,
            'user_id' => $user,
            'code_id' => $code_id
        ]);
    }

}
