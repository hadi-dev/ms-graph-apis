@extends('layouts.master')

@section('content')
    <div class="container text-center my-5">
        <h1 class="alert alert-lg alert-success">Email List</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Sr#</th>
                <th>Subject</th>
                <th>From</th>
                <th>To</th>
                <th>Date and Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
{{--                {{dd($data)}}--}}
            <!-- Loop through your emails here -->
            @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->from }}</td>
                    <td>{{ $item->to }}</td>
                    <td>{{ $item->date }}</td>
                    <td><a class="btn-right btn btn-md btn-primary" href="{{ route('detail-email', ['id' => $item->id]) }}">View</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p class="mt-4"><a class="btn-right btn btn-md btn-primary" href="{{ route('emails') }}">Refresh</a></p>
        @if(count($data) == 15)
            <p class="mt-4"><a class="btn-right btn btn-md btn-secondary" href="{{ route('all-emails') }}">View more</a></p>
        @endif
</div>
@endsection

