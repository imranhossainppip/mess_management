@extends('admin.master')
@section('title')
    Today Meals
@endsection
@section('content')

    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Breakfast</th>
                <th scope="col">Lunch</th>
                <th scope="col">Dinner</th>
                <th scope="col">Comment</th>
            </tr>
            </thead>

            <tbody>
            @foreach($personal_meals as $personal_meal)
                <tr>
                    <td>{{$personal_meal->meal_date}}</td>
                    <td>{{$personal_meal->name}}</td>
                    <td>{{$personal_meal->breakfast}}</td>
                    <td>{{$personal_meal->lunch}}</td>
                    <td>{{$personal_meal->dinner}}</td>
                    <td>{{$personal_meal->comment}}</td>
                </tr>
            @endforeach
            </tbody>

            @php
             $name_id = $personal_meal->name_id;
             $month = date('F');
             $breakfast = DB::table('meals')->where('month',$month)->where('name_id',$name_id)->sum('breakfast');
             $lunch = DB::table('meals')->where('month',$month)->where('name_id',$name_id)->sum('lunch');
             $dinner = DB::table('meals')->where('month',$month)->where('name_id',$name_id)->sum('dinner');
             $today_meals = $breakfast + $lunch + $dinner;
           @endphp
        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Total: </span>
            <span style="float: right;">{{ $today_meals }}</span>
        </h3>
    </div>

@endsection


