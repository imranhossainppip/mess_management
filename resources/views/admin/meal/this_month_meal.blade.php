@extends('admin.master')
@section('title')
    This Month Meals
@endsection
@section('content')
    <div class="container">
        <h3 style="text-align: center;color: red;margin:10px">Please Click Your Name, Because All Information There</h3>
        <div class="row">
            @php
                $month = date('F');
                $status = 'running';
                $members = DB::table('members')->where('status',$status)->get();
            @endphp
            @foreach($members as $member)
                <a href="{{url('/every_meals/'.$member->id)}}" style="border-radius: 25px" class="btn btn-info btn-sm">{{$member->name}}</a>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h3>Today: {{date('F')}}</h3>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Breakfast</th>
                <th scope="col">Lunch</th>
                <th scope="col">Dinner</th>
                <th scope="col">Comment</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @php
                 $month = date('F');
                 $today_meals = DB::table('meals')
                       ->join('members','members.id','meals.name_id')
                        ->select('members.name','meals.*')
                        ->where('month',$month)
                        ->get();
                 $breakfast = DB::table('meals')->where('month',$month)->sum('breakfast');
                 $lunch = DB::table('meals')->where('month',$month)->sum('lunch');
                 $dinner = DB::table('meals')->where('month',$month)->sum('dinner');
                 $today_total = $breakfast + $lunch + $dinner;
            @endphp
            @foreach($today_meals as $today_meal)
                <tr>
                    <td>{{$today_meal->name_id}}</td>
                    <td>{{$today_meal->name}}</td>
                    <td>{{$today_meal->breakfast}}</td>
                    <td>{{$today_meal->lunch}}</td>
                    <td>{{$today_meal->dinner}}</td>
                    <td>{{$today_meal->comment}}</td>
                    <td>{{$today_meal->meal_date}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <h3 style=" color: whitesmoke; background-color: #0C9A9A">
            <span style="text-align: left;">Total: </span>
            <span style="float: right;">{{ $today_total }}</span>
        </h3>
    </div>

@endsection

