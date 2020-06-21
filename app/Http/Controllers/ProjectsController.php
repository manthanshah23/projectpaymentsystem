<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $userprojects=Project::where('project_by',$user_id)->orWhere('project_to',$user_id)->orderBy('id','desc')->get();
        return view('projects.index')->with('projects',$userprojects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $users=User::where('id','!=',$user_id)->orderBy('id','desc')->get();
        return view('projects.create')->with('users',$users->pluck('name', 'id')->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
           'projectTo' => 'required',
           'amount' => 'required',
           'startdate' => 'required',
           'enddate' => 'required',
           'description' => 'required'
        ]);

        //Create Project
         $project = new Project;
         $project->project_name = $request->input('title');
         $project->project_to = $request->input('projectTo');
         $project->project_description = $request->input('description');
         $project->project_amount = $request->input('amount');
         $project->project_by = Auth::id();
         $project->start_date = $request->input('startdate');
         $project->end_date = $request->input('enddate');
         $project->has_ended = 0;

         $project->save();

         return redirect('/projects')->with('success','Project Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects=Project::find($id);
        $payments=Payment::where('project_id','=',$id)->orderBy('created_at','desc')->get();
        return view('projects.show')->with('project',$projects)->with('payments',$payments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects=Project::find($id);
        return view('projects.edit')->with('project',$projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'amount' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'description' => 'required'
        ]);

        //Create Project
        $project = Project::find($id);
        $project->project_name = $request->input('title');
        $project->project_description = $request->input('description');
        $project->project_amount = $request->input('amount');
        $project->project_by = Auth::id();
        $project->start_date = $request->input('startdate');
        $project->end_date = $request->input('enddate');
        $project->has_ended = $request->input('isfinished');

        $project->save();

        return redirect('/projects')->with('success','Project Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
        return redirect('/projects')->with('success','Project deleted!');
    }
}
