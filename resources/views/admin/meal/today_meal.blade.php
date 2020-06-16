@extends('admin.master')
@section('title')
    Today Meals
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Today: {{date('d/m/Y')}}</h3>
            </div>
{{--            <div class="col-sm-6">--}}
{{--                <a href="" class="btn btn-info btn-sm">Imran</a>--}}
{{--                <a href="" class="btn btn-success btn-sm">Raju</a>--}}
{{--                <a href="" class="btn btn-dark btn-sm">Sojib</a>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Breakfast</th>
                <th scope="col">Lunch</th>
                <th scope="col">Dinner</th>
                <th scope="col">Comment</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                 $date = date('d/m/Y');
                 $today_meals = DB::table('meals')
                       ->join('members','members.id','meals.name_id')
                        ->select('members.name','meals.*')
                        ->where('meal_date',$date)
                        ->get();
                 $total_bazar = DB::table('expenses')->where('expenses_date',$date)->sum('total_taka');
                 $today_breakfast = DB::table('meals')->where('meal_date',$date)->sum('breakfast');
                 $today_lunch = DB::table('meals')->where('meal_date',$date)->sum('lunch');
                 $today_dinner = DB::table('meals')->where('meal_date',$date)->sum('dinner');
                 $today_total = $today_breakfast + $today_lunch + $today_dinner;
                 $meal_rate = sprintf('%0.2f',$total_bazar/$today_total);
            @endphp
            @foreach($today_meals as $today_meal)
                <tr>
                    <td>{{$today_meal->name_id}}</td>
                    <td>{{$today_meal->name}}</td>
                    <td>{{$today_meal->breakfast}}</td>
                    <td>{{$today_meal->lunch}}</td>
                    <td>{{$today_meal->dinner}}</td>
                    <td>{{$today_meal->comment}}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{url('/edit_meal/'.$today_meal->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Today Meal: {{ $today_total }} </span>
            <span style="float: right;">Today Meal Rate: {{$meal_rate}}</span>
        </h3>
    </div>

@endsection

