@extends('admin.master')
@section('title')
    Previous Members
@endsection
@section('content')
    <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Education</th>
                <th scope="col">Photo</th>
                <th scope="col">D.Of L.Home</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @php
                $i = 1;
            @endphp
            <tbody>
            @foreach($previous_members as $previous_member)
                <tr>
                    <th>{{$i++}}</th>
                    <td>{{$previous_member->name}}</td>
                    <td>{{$previous_member->email}}</td>
                    <td>{{$previous_member->phone}}</td>
                    <td>{{$previous_member->education_qualification}}</td>
                    <td><img src="{{url($previous_member->photo)}}" width="50" height="50"></td>
                    <td>{{$previous_member->updated_at}}</td>
                    <td>
                        <a class="btn btn-danger btn-sm" id="delete" href="{{url('/again_member/'.$previous_member->id)}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

