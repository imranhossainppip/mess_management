@extends('admin.master')
@section('title')
    Add Members
@endsection
@section('content')
    <div class="container col-md-6 col-md-offset-3">
        <div class="well">
            <form action="{{url('/save_member')}}" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputPassword2" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleInputPassword3" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Guardian Number</label>
                    <input type="number" name="guardian_phone" class="form-control" id="exampleInputPassword4" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword5">NID</label>
                    <input type="number" name="nid" class="form-control" id="exampleInputPassword5" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword6">Address</label>
                    <textarea name="address" class="form-control" id="exampleInputPassword6" required rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword7">Education Qualification</label>
                    <input type="text" name="education_qualification" class="form-control" id="exampleInputPassword7" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword8">Photo</label>
                    <input type="file" name="photo" class="form-control" id="exampleInputPassword8" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword8">NID Upload</label>
                    <input type="file" name="nid_upload" class="form-control" id="exampleInputPassword8">
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" value="running" class="form-control" id="exampleInputPassword8">
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
            </form>
        </div>
    </div>
@endsection
