<?php

namespace App\Http\Controllers;

use App\Part;
use PDF;

class ReportController extends Controller
{
    public function generate(){
        $report = Part::all();
        return view('report-create')->with('reports', $report);
    }

    public function pdf(){
        $reports = Part::all();
        $data = [
            'data' => $reports
        ];
        $pdf = PDF::loadView('pdf', $data);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('ptsb-daikin-'. \Carbon\Carbon::now()->format('d\m\Y-H:i:s') . '.pdf');

        // return view('pdf')->with('reports', $report);
    }
}
