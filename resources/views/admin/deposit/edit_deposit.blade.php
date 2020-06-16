@extends('admin.master')
@section('title')
    Edit Deposit
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/update_deposit/'.$edit_deposit->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword2">Description</label>
                    <textarea name="description" class="form-control" id="exampleInputPassword2" rows="5">{{$edit_deposit->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Total Taka</label>
                    <input type="number" name="total_taka" value="{{$edit_deposit->total_taka}}" class="form-control" id="exampleInputPassword2">
                </div>
                <div class="form-group">
                    <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="exampleInputPassword5" required>
                    <input type="hidden" name="deposit_date" value="{{date('d/m/Y')}}" class="form-control" id="exampleInputPassword5" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">update</button>
            </form>
        </div>
    </div>
@endsection
