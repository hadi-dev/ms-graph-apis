@extends('layouts.master')

@section('content')
{{--    @include('includes.header')--}}
    <div class="relative bg-center selection:bg-red-500 selection:text-white">
        <div class="text-center">
            <div>
                <p>We use Microsoft 365 for accessing your account.</p>
                <p>Click the button below to get started.</p>
            </div>

            <p class="mt-4"><a class="btn btn-sm btn-secondary" href="{{ route('connect') }}">Login with your Microsoft Account</a></p>
        </div>
    </div>
@endsection
