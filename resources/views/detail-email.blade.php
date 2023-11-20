@extends('layouts.master')

@section('content')
    <div class="container text-center my-5">
        <h1 class="alert alert-lg alert-success">Email Details</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead class="bg-dark text-light">
            <tr>
                <th>Title</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Subject</th>
                <td>{{ $data->subject }}</td>
            </tr>
                <tr>
                    <th>Body</th>
                    <td>{{ $data->body }}</td>
                </tr>
            <tr>
                <th>From</th>
                <td>{{ $data->from }}</td>
            </tr>
            <tr>
                <th>To</th>
                <td>{{ $data->to }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $data->date }}</td>
            </tr>
            </tbody>
        </table>

        <p class="mt-4"><a class="btn-right btn btn-md btn-primary" href="{{ route('emails') }}">Go Back</a></p>
</div>
@endsection

