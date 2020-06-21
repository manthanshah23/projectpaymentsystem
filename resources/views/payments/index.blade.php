@extends('layouts.app')

@section('content')
    <div class="row align-items-center flex-column">
        @if(count($payments)>0)
            <h1>All Payments</h1>
            <div class="col-md-8">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Payments ID</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Given to</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Remark</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <th scope="row">{{$payment->id}}</th>
                            <td><a href="projects/{{$payment->project_id}}">{{\App\Project::find($payment->project_id)->project_name}}</a></td>
                            <td>{{ \App\User::find(\App\Project::find($payment->project_id)->project_to)->name}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->remark}}</td>
                            <td>{{$payment->created_at}}</td>
                            <td>{!! Form::open(['action'=>['PaymentsController@destroy',$payment->id],'method'=>'POST']) !!}
                                {!! Form::hidden('_method','DELETE') !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                        <tr>
                            <th></th>
                            <th scope="row" style="font-size: large; color: #2d995b">Total spent</th>
                            <td style="font-size: large; color: #2d995b"><b>{{$payments->sum('amount')}}</b></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <h1>No Payments</h1>
        @endif
    </div>
@endsection
