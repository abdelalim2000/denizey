@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="display-1 my-3 text-black-50">{{ $batch->name }}</h1>
        @foreach($batch->instructors as $instructor)
            <h4 class="display-5">{{ $instructor->name }}</h4>
        @endforeach
        <h2 class="display-3"></h2>

        <div class="card">
            <div class="card-header">
                <a href="{{ route('site.batch') }}" class="btn btn-icon btn-success"><i class="bi bi-arrow-left"></i></a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-light text-center">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Report Title</td>
                        <td>Started At</td>
                        <td>Ended At</td>
                        <td>Date</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $index=>$report)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ \Carbon\Carbon::make($report->started_at)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::make($report->ended_at)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::make($report->day_date)->format('dM Y') }}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{ route('site.reports.detail', $report->id) }}"
                                       class="btn btn-icon btn-primary"><i class="bi bi-folder-check"></i></a>
                                    <a href="{{ route('site.attendance.export', $report->attendance->id) }}"
                                       class="btn btn-icon btn-success"><i class="bi bi-table"></i></a>
                                    <a href="{{ route('site.reports.pdf', $report->id) }}" class="btn btn-danger"><i
                                            class="bi bi-file-earmark-richtext"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
