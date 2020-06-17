@extends('admin.master')
@section('title')
    Home
    @endsection
@section('content')
    <section id="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="left-profile">
                        <img src="{{url('/admin/images/Capture.JPG')}}" height="250" width="250" style="border-radius: 15px">
                        <div class="content">
                            <h2 contenteditable="true"></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="Details">
                        <h2 style="color: red;text-align: center" class="font-weight-bold">Statement of the head of the Mess:</h2>
                        <p><span style="">Hi, I am Alamgir Alam. At First take my salam "assalamualaikum warahmatullahi wabarakatuh"</span></p>
                        <p>We will all abide by the rules of the mess. Shopping, boiling water, making bowls of food. I'll do everything right. To date to clean the toilet will actually clean it.

                            We will all try to have a good relationship with everyone. I will talk to everyone well. Of course I will have a good relationship with my roommates. If possible, I will try to eat with the roommates. Then one will have a good relationship with the other.

                            Contact me at any time.</p>
                        <h1>Alamgir Alam</h1>
                        <h6>Leader Head of the mess</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
