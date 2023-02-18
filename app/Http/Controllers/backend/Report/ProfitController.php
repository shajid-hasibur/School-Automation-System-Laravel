<?php

namespace App\Http\Controllers\backend\Report;

use App\Http\Controllers\Controller;
use App\Models\AccountStudentFee;
use App\Models\OtherAccountCost;
use App\Models\AccountEmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class ProfitController extends Controller
{
    //
    public function MonthlyProfitView()
    {
        return view('backend.report.profit.monthly_profit_view');
    }

    //
    public function MonthlyProfitDatewise(Request $request)
    {
        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));

        $student_fee = AccountStudentFee::whereBetween('date', [$start_date, $end_date])->sum('amount');
        $other_cost = OtherAccountCost::whereBetween('date', [$sdate, $edate])->sum('amount');
        $employee_salary = AccountEmployeeSalary::whereBetween('date', [$sdate, $edate])->sum('amount');
        $totalcost = $other_cost + $employee_salary;
        $profit = $student_fee - $totalcost;

        $html['thsource'] = '<th>Student Fee Collected</th>';
        $html['thsource'] .= '<th>Others Cost</th>';
        $html['thsource'] .= '<th>Salary Cost</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit</th>';
        $html['thsource'] .= '<th>Action</th>';
        $color = 'success';
        $html['tdsource'] = '<td>' . round($student_fee ). '</td>';
        $html['tdsource'] .= '<td>' . round($other_cost ). '</td>';
        $html['tdsource'] .= '<td>' . round($employee_salary ). '</td>';
        $html['tdsource'] .= '<td>' .round( $totalcost) . '</td>';
        $html['tdsource'] .= '<td>' . round($profit) . '</td>';
        $html['tdsource'] .= '<td>';
        $html['tdsource'] .= '<a class="btn btn-' . $color . '" title="Print" target="_blank" href="' . route("report.profit.detail.view").'?start_date='.$sdate.'&end_date='.$edate.'">Download</a>';
        $html['tdsource'] .= '</td>';
        return response()->json(@$html);
    }

    //
    public function MonthlyProfitDetailView(Request $request)
    {
        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));
        $data['sdate'] = date('Y-m-d', strtotime($request->start_date));
        $data['edate'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('backend.report.profit.profit_detail_view', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('profit_detail_view.pdf');
    }
}
