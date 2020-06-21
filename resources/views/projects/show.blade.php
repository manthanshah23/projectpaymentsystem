@extends('layouts.app')

@section('content')

    <div class="row align-items-center flex-column">
        <p style="margin-left: 10px"><b>ID: </b>{{$project->id}}</p>
        <p style="margin-left: 10px"><b>Name: </b>{{$project->project_name}}</p>
        <p style="margin-left: 10px"><b>Description: </b>{{$project->project_description}}</p>
        <p style="margin-left: 10px"><b>Total Amount: </b>{{$project->project_amount}}</p>

        <hr>
        <h1>All Payments</h1>
        @if(count($payments) > 0)
            <?php $finalamt = 0; ?>
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Payment ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Payment Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)

                    <tr>
                        <th scope="row">{{$payment->id}}</th>
                        <td>{{$payment->amount}}</td>
                        <td>{{$payment->remark}}</td>
                        <td>{{$payment->created_at}}</td>
                    </tr>


                @endforeach
                <tr>
                    <th scope="row" style="color: #2d995b; font-size: large"><b>Total Paid</b></th>
                    <td style="color: #2d995b; font-size: large"><b>{{$payments->sum('amount')}}</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row" style="color: #e3342f; font-size: large">Total Remaining</th>
                    <td style="color: #e3342f; font-size: large"><b>{{$project->project_amount - $payments->sum('amount')}}</b></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
        @else
            <h3>No payments made for this project yet!</h3>
        @endif

    </div>
@endsection
