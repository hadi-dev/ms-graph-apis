@extends('layouts.master')

@section('content')
    <div class="container my-5">
        <div class="text-center">
        <h1 class="alert alert-lg alert-success">Compose Email</h1>
        </div>

        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <!-- Form for composing and sending emails -->
                <div class="mt-5">
                    <form method="POST" action="{{ route('send-email') }}">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="to">To:</label>
                            <input type="text" class="form-control" id="to" name="to" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="body">Body:</label>
                            <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-dark mt-3">Send Email</button>
                    </form>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
