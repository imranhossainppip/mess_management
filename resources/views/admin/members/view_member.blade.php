@extends('admin.master')
@section('title')
    View Members
@endsection
@section('content')
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-profile">
                        <img src="{{URL::to($view_member->photo)}}" height="300" width="300" style="border-radius: 15px">
                        <div class="content">
                            <h2 contenteditable="true"></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="Details">
                        <h4>Presonal information</h4>
                        <p><span style="font-weight: 900;">Name: </span>{{$view_member->name}}</p>
                        <p><span style="font-weight: 900;">Email: </span>{{$view_member->email}}</p>
                        <p><span style="font-weight: 900;">Phone: </span>{{$view_member->phone}}</p>
                        <p><span style="font-weight: 900;">Guardian Phone: </span>{{$view_member->guardian_phone}}</p>
                        <p><span style="font-weight: 900;">NID: </span>{{$view_member->nid}}</p>
                        <p><span style="font-weight: 900;">Address: </span>{{$view_member->address}}</p>
                        <p><span style="font-weight: 900;">Education Qualification: </span>{{$view_member->education_qualification}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

