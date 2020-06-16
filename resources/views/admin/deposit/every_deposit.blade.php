@extends('admin.master')
@section('title')
    Every Deposit
@endsection
@section('content')
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Taka</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($every_deposites as $every_deposit)
                <tr>
                    <td>{{$every_deposit->name_id}}</td>
                    <td>{{$every_deposit->name}}</td>
                    <td>{{$every_deposit->description}}</td>
                    <td>{{$every_deposit->total_taka}}</td>
                    <td>{{$every_deposit->deposit_date}}</td>
                </tr>
            @endforeach
            </tbody>
            @php
                $name_id = $every_deposit->name_id;
                $month = date('F');
                $total_taka = DB::table('deposites')->where('month',$month)->where('name_id',$name_id)->sum('total_taka');
            @endphp
        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Total: </span>
            <span style="float: right;">{{ $total_taka }}</span>
        </h3>
    </div>

@endsection

