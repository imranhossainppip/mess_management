@extends('admin.master')
@section('title')
    Edit Members
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/update_member/'.$edit_member->id)}}" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="name" value="{{$edit_member->name}}" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Email</label>
                    <input type="text" name="email" value="{{$edit_member->email}}" class="form-control" id="exampleInputPassword2" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Phone</label>
                    <input type="number" name="phone" value="{{$edit_member->phone}}" class="form-control" id="exampleInputPassword3" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Guardian Number</label>
                    <input type="number" name="guardian_phone" value="{{$edit_member->guardian_phone}}" class="form-control" id="exampleInputPassword4" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword5">NID</label>
                    <input type="number" name="nid" value="{{$edit_member->nid}}" class="form-control" id="exampleInputPassword5" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword6">Address</label>
                    <textarea name="address" class="form-control" id="exampleInputPassword6" required rows="5">{{$edit_member->address}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword7">Education Qualification</label>
                    <input type="text" name="education_qualification" value="{{$edit_member->education_qualification}}" class="form-control" id="exampleInputPassword7" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword8">Photo</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputPassword8">
                    <img src="{{url($edit_member->photo)}}" name="photo" height="50" width="50">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword8">NID Upload</label>
                    <input type="file" name="nid_upload" class="form-control" id="exampleInputPassword8">
                    <img src="{{url($edit_member->nid_upload)}}" height="50" width="50">
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" value="status" class="form-control" id="exampleInputPassword7" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Update</button>
            </form>
        </div>
    </div>
@endsection
