@extends('admin.master')
@section('title')
    All Deposit
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @php
                $month = date('F');
                $status = 'running';
                $members = DB::table('members')->where('status', $status)->get();
                $total_expenses = DB::table('deposites')->where('month',$month)->sum('total_taka');
            @endphp
            @foreach($members as $member)
                <a href="{{url('/every_deposit/'.$member->id)}}" style="border-radius: 25px" class="btn btn-info btn-sm">{{$member->name}}</a>
            @endforeach
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Taka</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            <tbody>
            @foreach($all_deposites as $all_deposit)
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$all_deposit->name}}</td>
                    <td>{{$all_deposit->description}}</td>
                    <td>{{$all_deposit->total_taka}}</td>
                    <td>{{$all_deposit->deposit_date}}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{url('/edit_deposit/'.$all_deposit->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Total: </span>
            <span style="float: right;">{{ $total_expenses }}</span>
        </h3>
    </div>
@endsection
