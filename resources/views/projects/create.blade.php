@extends('layouts.app')

@section('content')

    <div class="row align-items-center flex-column">
        <div class="col-md-8">
            <h1>Create Project</h1>

            {!! Form::open(['action'=>'ProjectsController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {{Form::label('projectTo','Allot project to')}}
                    {{Form::select('projectTo',$users,null, ['class'=>'form-control','placeholder' => 'Pick a user...'])}}
                </div>
                <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Project name'])}}
                </div>
                <div class="form-group">
                    {{Form::label('amount','Amount')}}
                    {{Form::number('amount','',['class'=>'form-control','placeholder'=>'Project amount'])}}
                </div>
                <div class="form-group">
                    {{Form::label('startdate','Start Date')}}
                    {{Form::date('startdate',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Start date'])}}
                </div>
                <div class="form-group">
                    {{Form::label('enddate','End Date')}}
                    {{Form::date('enddate',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'End date'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description','Description')}}
                    {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Project description'])}}
                </div>
                <div class="form-group">

                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}


        </div>
    </div>


@endsection
