<?php

namespace App\Http\Controllers;

use App\Models\StudentPayment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $current_year_collection = StudentPayment::whereYear('payment_date',now())->sum('amount');
        $current_month_collection = StudentPayment::whereMonth('payment_date',now())->sum('amount');
        return view('backend.report.profit.fee_collection',compact('current_year_collection','current_month_collection'));
    }
    
    public function getReport(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $collection = StudentPayment::whereBetween('payment_date', [$start_date, $end_date])->sum('amount');
        $current_year_collection = StudentPayment::whereYear('payment_date',now())->sum('amount');
        return response()->json([
            'collection' => $collection,
            'currentYearCollection' => $current_year_collection
        ]);
    }
}
