@extends('layouts.app')

@section('content')

    <div class="row align-items-center flex-column">
        <div class="col-md-8">
            <h1>Create Payment Entry</h1>

            {!! Form::open(['action'=>'PaymentsController@store', 'method' => 'POST']) !!}

            <div class="form-group">
                {{Form::label('project','Project name')}}
                {{Form::select('project',$projects,null, ['class'=>'form-control','placeholder' => 'Pick a project...'])}}
            </div>
            <div class="form-group">
                {{Form::label('amount','Amount')}}
                {{Form::number('amount','',['class'=>'form-control','placeholder'=>'Payment amount'])}}
            </div>
            <div class="form-group">
                {{Form::label('remark','Remark')}}
                {{Form::textarea('remark','',['class'=>'form-control','placeholder'=>'Payment remark'])}}
            </div>
            <div class="form-group">

                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}


        </div>
    </div>


@endsection
