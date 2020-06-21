@extends('layouts.app')

@section('content')

    <div class="row align-items-center flex-column">
        <div class="col-md-8">
            <h1>Edit Project</h1>

            {!! Form::open(['action'=>['ProjectsController@update',$project->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title','Title')}}
                {{Form::text('title',$project->project_name,['class'=>'form-control','placeholder'=>'Project name'])}}
            </div>
            <div class="form-group">
                {{Form::label('amount','Amount')}}
                {{Form::number('amount',$project->project_amount,['class'=>'form-control','placeholder'=>'Project amount', 'inputType'])}}
            </div>
            <div class="form-group">
                {{Form::label('startdate','Start Date')}}
                {{Form::date('startdate',$project->start_date,['class'=>'form-control','placeholder'=>'Start date'])}}
            </div>
            <div class="form-group">
                {{Form::label('enddate','End Date')}}
                {{Form::date('enddate',$project->end_date,['class'=>'form-control','placeholder'=>'End date'])}}
            </div>
            <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description',$project->project_description,['class'=>'form-control','placeholder'=>'Project description'])}}
            </div>
            <div class="form-group">
                {{Form::label('isfinished','Is Finished?')}}
                {{Form::select('isfinished',['0'=>'Active','1'=>'Finished'], $project->has_ended,['class'=>'form-control'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            <div class="form-group">
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}


        </div>
    </div>


@endsection
