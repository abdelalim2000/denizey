<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Report;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('instructors')->paginate(6);
        return view('home')->with(['batches' => $batches]);
    }

    public function show($id)
    {
        $batch = Batch::where('id', $id)->with('instructors')->firstOrFail();
        $reports = Report::select('id', 'title', 'started_at', 'ended_at', 'day_date')->with('attendance')->where('batch_id', $id)->paginate(6);

        return view('reports')->with(['batch' => $batch, 'reports' => $reports]);
    }

    public function export($id): BinaryFileResponse
    {
        $report = Attendance::select('date')->where('id', $id)->firstOrFail();
        $date = Carbon::make($report->date)->format('dM y');
        return Excel::download(new AttendanceExport($id), 'attendance_' . $date . '.xlsx');
    }

    public function showReport($id)
    {
        $report = Report::query()->where('id', $id)->with('instructor')->firstOrFail();
        return view('report-detail')->with(['report' => $report]);
    }

    public function reportPDF($id)
    {
        $report = Report::query()->where('id', $id)->with('instructor')->firstOrFail();
        $pdf = PDF::loadView('report-detail', compact('report'));
        return $pdf->download($report->title . '_' . Carbon::make($report->day_date)->format('dM Y') . '.pdf');
    }

}
