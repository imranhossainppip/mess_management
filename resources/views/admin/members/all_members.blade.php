@extends('admin.master')
@section('title')
    All Members
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
                <th scope="col">NID</th>
                <th scope="col">Education</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @php
            $i = 1;
            @endphp
            <tbody>
            @foreach($members as $member)
            <tr>
                <th>{{$i++}}</th>
                <td>{{$member->name}}</td>
                <td>{{$member->email}}</td>
                <td>{{$member->phone}}</td>
                <td>{{$member->nid}}</td>
                <td>{{$member->education_qualification}}</td>
                <td><img src="{{url($member->photo)}}" width="50" height="50"></td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{url('/view_member/'.$member->id)}}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-success btn-sm" href="{{url('/edit_member/'.$member->id)}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" id="delete" href="{{url('/remove_member/'.$member->id)}}">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
