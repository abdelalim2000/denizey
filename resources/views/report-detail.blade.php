@extends('layouts.app')

@section('css')
    <style>
        /* Table Styles */

        .table-wrapper {
            margin: 10px 70px 70px;
            box-shadow: 0px 25px 35px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td, .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #4FC3A1;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        .main-header {
            font-size: 35px;
            font-weight: 100 !important;
            font-family: sans-serif, "Poppins Thin" !important;
            color: #4FC3A1 !important;
            text-transform: uppercase;
        }

        .para {
            color: white;
            background-color: #324960;
            padding: 7px 14px;
            display: inline-block;
            border-radius: 7px;
        }

        .sub-header {
            font-size: 25px;
            color: #37474F;
            font-weight: bold;
            font-family: sans-serif, "Poppins Thin" !important;
            text-transform: uppercase;
        }

        .sub-para {
            color: #1a202c;
            font-weight: lighter;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card my-5">
            <div class="card-body">
                <h1 class="main-header">{{ $report->title }}</h1>
                <p class="lead para">{{ $report->instructor->name }}</p>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                        <tr>
                            <th>Started At</th>
                            <th>Ended At</th>
                            <th>Break Start</th>
                            <th>Break End</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ \Carbon\Carbon::make($report->started_at)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::make($report->ended_at)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::make($report->break_start)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::make($report->break_end)->format('g:i A') }}</td>
                            <td>{{ \Carbon\Carbon::make($report->day_date)->format('dM Y') }}</td>
                        </tr>
                        <tbody>
                    </table>
                </div>
                <div class="table-wrapper">
                    <table class="fl-table">
                        <thead>
                        <tr>
                            <th>Point</th>
                            <th>Progress</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($report->getPoints() as $point)
                            <tr>
                                <td>{{ $point->key }}</td>
                                <td>{{ $point->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <h3 class="sub-header">Instructor Report</h3>
                <p class="sub-para">{{ $report->instructor_report }}</p>
                <h4 class="sub-header">Notes</h4>
                <p class="sub-para">{{ $report->instructor_note }}</p>
                <h4 class="sub-header">Task</h4>
                <p class="sub-para">{{ $report->task }}</p>
            </div>
        </div>
    </div>
@endsection
