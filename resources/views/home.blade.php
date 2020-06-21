@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome, {{ Auth::user()->name }}.</h1>
                    You are logged in!
                </div>

                <div class="card-body">
                    <a href="projects"><button class="btn btn-primary">All Projects</button></a>
                    <a href="payments"><button class="btn btn-primary">All Payments</button></a>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
