@extends('admin.master')
@section('title')
    Add Expenses
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/expenses')}}" method="post">
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
                    <label for="exampleInputEmail1">Marketer's Name</label>
                    <select name="name_id" class="form-control" id="exampleInputPassword1">
                        <option disabled="" selected="">--Select Your Name--</option>
                        @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Description</label>
                    <textarea name="description" class="form-control" id="exampleInputPassword2" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Total Taka</label>
                    <input type="number" name="total_taka" class="form-control" id="exampleInputPassword2">
                </div>
                <div class="form-group">
                    <input type="hidden" name="month" value="{{date('F')}}" class="form-control" id="exampleInputPassword5" required>
                    <input type="hidden" name="expenses_date" value="{{date('d/m/Y')}}" class="form-control" id="exampleInputPassword5" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </form>
        </div>
    </div>
@endsection
