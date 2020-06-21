@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Logical Loop</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>Welcome to <b>Logical Loop's</b> Project Payment Management System!</h4>
                            <h6>Have a good day :)</h6>

                        <a href="home"><button class="btn btn-success">Home</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
