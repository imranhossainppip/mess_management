@extends('admin.master')
@section('title')
    Today Meals
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
            @foreach($every_expenses as $every_expense)
                <tr>
                    <td>{{$every_expense->name_id}}</td>
                    <td>{{$every_expense->name}}</td>
                    <td>{{$every_expense->description}}</td>
                    <td>{{$every_expense->total_taka}}</td>
                    <td>{{$every_expense->expenses_date}}</td>
                </tr>
            @endforeach
            </tbody>
            @php
                $name_id = $every_expense->name_id;
                $month = date('F');
                $total_taka = DB::table('expenses')->where('month',$month)->where('name_id',$name_id)->sum('total_taka');
            @endphp
        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Total: </span>
            <span style="float: right;">{{ $total_taka }}</span>
        </h3>
    </div>

@endsection

