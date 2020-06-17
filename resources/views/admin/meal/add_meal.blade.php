@extends('admin.master')
@section('title')
    Add Meal
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/save_meal')}}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @php
                    $status = 'running';
                    $members = DB::table('members')->where('status',$status)->get();
                    @endphp
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <select name="name_id" class="form-control" id="exampleInputPassword1">
                        <option disabled="" selected="">--Select Your Name--</option>
                        @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Breakfast</label>
                    <input type="number" name="breakfast" class="form-control" id="exampleInputPassword2" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Lunch</label>
                    <input type="number" name="lunch" class="form-control" id="exampleInputPassword3" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Dinner</label>
                    <input type="number" name="dinner" class="form-control" id="exampleInputPassword4" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword5">Comment</label>
                    <input type="text" name="comment" value="No Comment" class="form-control" id="exampleInputPassword5">
                </div>
                <div class="form-group">
                    <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="exampleInputPassword5" required>
                    <input type="hidden" name="meal_date" value="{{date('d/m/Y')}}" class="form-control" id="exampleInputPassword5" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </form>
        </div>
    </div>
@endsection
