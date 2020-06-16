@extends('admin.master')
@section('title')
    Edit Meal
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/update_meal/'.$edit_meal->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPassword2">Breakfast</label>
                    <input type="number" name="breakfast" value="{{$edit_meal->breakfast}}" class="form-control" id="exampleInputPassword2" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Lunch</label>
                    <input type="number" name="lunch" value="{{$edit_meal->lunch}}" class="form-control" id="exampleInputPassword3" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Dinner</label>
                    <input type="number" name="dinner" value="{{$edit_meal->dinner}}" class="form-control" id="exampleInputPassword4" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword5">Comment</label>
                    <input type="text" name="comment" value="{{$edit_meal->comment}}" value="No Comment" class="form-control" id="exampleInputPassword5">
                </div>
                <div class="form-group">
                    <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="exampleInputPassword5" required>
                    <input type="hidden" name="meal_date" value="{{date('d/m/Y')}}" class="form-control" id="exampleInputPassword5" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Update</button>
            </form>
        </div>
    </div>
@endsection
