<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Project;
use Illuminate\Http\Request;

class PaymentsController extends Controller
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
        $allpayments = Payment::where('payment_by',$user_id)->orderBy('id','desc')->get();
        return view('payments.index')->with('payments',$allpayments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $userprojects=Project::where(['project_by'=>$user_id,'has_ended'=>0])->orderBy('id','desc')->get();
        return view('payments.create')->with('projects',$userprojects->pluck('project_name', 'id')->toArray());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $this->validate($request,[
           'project'=>'required',
           'amount'=>'required',
           'remark'=>'required'
        ]);

        $payment = new Payment;
        $payment->project_id=$request->input('project');
        $payment->payment_by=$user_id;
        $payment->amount=$request->input('amount');
        $payment->remark=$request->input('remark');

        $payment->save();

        return redirect('/payments')->with('success','Payment added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment=Payment::find($id);
        $payment->delete();
        return redirect('/payments')->with('success','Payment deleted!');
    }
}
