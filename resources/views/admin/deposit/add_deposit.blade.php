@extends('admin.master')
@section('title')
    Add Deposit
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/save_deposit')}}" method="post">
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <select name="name_id" class="form-control" id="exampleInputPassword1">
                        <option disabled="" selected="">--Select Your Name--</option>
                        @foreach($deposit_names as $deposit_name)
                            <option value="{{$deposit_name->id}}">{{$deposit_name->name}}</option>
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
                    <input type="hidden" name="deposit_date" value="{{date('d/m/Y')}}" class="form-control" id="exampleInputPassword5" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </form>
        </div>
    </div>
@endsection
