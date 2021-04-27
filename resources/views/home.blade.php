@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="display-1 my-3 text-black-50">Welcome To Denizey</h1>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered table-light text-center">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Batch Name</td>
                        <td>Batch Instructor</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($batches as $index=>$batch)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$batch->name}}</td>
                            <td>
                                @foreach($batch->instructors as $instructor)
                                    <p class="bg-warning rounded p-2 my-2 text-center">{{ $instructor->name }}</p>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('site.reports.show', $batch->id) }}"
                                   class="btn btn-outline-primary">Read More</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
