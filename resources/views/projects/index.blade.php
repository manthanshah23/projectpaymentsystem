@extends('layouts.app')

@section('content')
    <div class="row align-items-center flex-column">
        @if(count($projects)>0)
            <h1>All Projects</h1>
            <div class="col-md-8">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Project ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Started by</th>
                        <th scope="col">Given to</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End date</th>
                        <th scope="col">Is finished?</th>
                        <th scope="col">Created On</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td><a href="projects/{{$project->id}}">{{$project->project_name}}</a></td>
                            <td>{{$project->project_description}}</td>
                            <td>{{$project->project_amount}}</td>
                            <td>{{\App\User::find($project->project_by)->name}}</td>
                            <td>{{\App\User::find($project->project_to)->name}}</td>
                            <td>{{$project->start_date}}</td>
                            <td>{{$project->end_date}}</td>
                            <td>{{$project->has_ended}}</td>
                            <td>{{$project->created_at}}</td>
                            <td><a href="projects/{{$project->id}}/edit">
                                    <button class="btn btn-dark">Edit</button>
                                </a></td>
                            <td>{!! Form::open(['action'=>['ProjectsController@destroy',$project->id],'method'=>'POST']) !!}
                                    {!! Form::hidden('_method','DELETE') !!}
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <th scope="row" style="color: #2d995b">Total Projects Worth</th>
                            <td style="color: #2d995b; font-size: large"><b>{{$projects->sum('project_amount')}}</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <h1>No Projects yet</h1>
        @endif
    </div>
@endsection
