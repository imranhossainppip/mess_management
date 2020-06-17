@extends('admin.master')
@section('title')
    Summary
@endsection
@section('content')
    <div class="container">
        <h3 style="text-align: center;color: red;margin:30px">Please Click Your Name, Because All Information There</h3>
        <div class="row">
            @foreach($members as $member)
                <a href="{{url('/final_cost/'.$member->id)}}" style="border-radius: 25px" class="btn btn-info btn-sm">{{$member->name}}</a>
            @endforeach
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <div class="hello" style="margin: 40px;">
        <h2 class="text-center text-danger">Meals Rate: </h2>
        @php $total_amount = $total_deposites + $total_expenses @endphp
        @php $meal_rate = sprintf('%0.2f', $total_amount / $total_meals) @endphp
        Total Meals: {{$total_meals}}
        <hr>
        Boro Bazar: {{$total_deposites}}
        <br>
        Total Bazar: {{$total_expenses}}
        <hr>
            All Bazar: {{$total_amount}}
        <hr>
        Meal Rate: {{$meal_rate}}
        </div>
    </div>
@endsection
