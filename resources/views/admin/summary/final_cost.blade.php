@extends('admin.master')
@section('title')
    Final Cost
@endsection
@section('content')
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-profile">
                        <img src="{{URL::to($final_cost->photo)}}" height="300" width="300" style="border-radius: 15px">
                        <div class="content">
                            <h2 contenteditable="true"></h2>
                            <h4>Presonal information</h4>
                            <p><span style="font-weight: 900;">Name: </span>{{$final_cost->name}}</p>
                            <p><span style="font-weight: 900;">Email: </span>{{$final_cost->email}}</p>
                            <p><span style="font-weight: 900;">Phone: </span>{{$final_cost->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="Details">
                        <h4>Amount</h4>
                        <h6>Meal: {{$total_meal}}</h6>
                        <h6>Bazar: {{$expenses}}</h6>
                        <h6>BoroBazar: {{$deposit}}</h6>
                        <h6>Amount: {{$total_amount}}</h6>
                        <h6>Meal Cost: {{$personal_meal}}</h6>
                        <h5>Amount - Meal: {{$add = $personal_meal - $total_amount}}</h5>
                        <h4>Room Rent + Mixed Cost: {{sprintf('%0.2f',$per_other)}}</h4>
                        <h4>Please Submit: {{sprintf('%0.0f',$per_other + $add)}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

