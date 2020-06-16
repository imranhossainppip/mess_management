@extends('admin.master')
@section('title')
    Summary
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="background: #95999c">
                <h2 class="text-center text-danger">Meals Rate: </h2>
                @php $total_amount = $total_deposites + $total_expenses @endphp
                @php $meal_rate = sprintf('%0.2f', $total_amount / $total_meals) @endphp
                Total Meals: {{$total_meals}}
                <hr>
                Boro Bazar: {{$total_deposites}}
                <br>
                Total Bazar: {{$total_expenses}}
                <hr>
                Total Amount: {{$total_amount}}
                <hr>
                Meal Rate: {{$meal_rate}}
            </div>

            <div class="col-md-4">


            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection
