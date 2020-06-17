@extends('admin.master')
@section('title')
    Others Cost
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <form action="{{url('/save_cost')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputPassword2">Room Rent</label>
                <input type="number" name="room_rent" class="form-control" id="exampleInputPassword2" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword3">Net Bill</label>
                <input type="number" name="net_bill" class="form-control" id="exampleInputPassword3" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword4">Paper Bill</label>
                <input type="number" name="paper_bill" class="form-control" id="exampleInputPassword4" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword5">Khala Cost</label>
                <input type="number" name="khala_cost" class="form-control" id="exampleInputPassword5" required>
            </div>
            <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="exampleInputPassword5" required>
            <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
        </form>
    </div>
@endsection
