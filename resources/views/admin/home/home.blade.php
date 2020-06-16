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
                        <p>We Are One Family. I am a leader in this mess. So I am leading this mess from 2018.
                        <p>আমরা সবাই মেসের নিয়ম কানুন মেনে চলবো। বাজার করা, পানি ফোটানো, খাবারের বাটি করা। সব কিছু ঠিক মত করব। টয়লেট পরিষ্কাররে তারিখ আসলে অবশ্যই তা পরিস্কার করব।</p>
                        <p>আমরা সবাই সবার সাথে ভালো সম্পর্ক রাখার চেষ্টা করব। সবার সাথে ভালোভাবে কথা বলব। অবশ্যই রুমমেটদের সাথে সুসম্পর্ক রাখবো। সম্ভব হলে রুমমেটদের সাথে খাবার খাওয়ার চেষ্টা করব। তাহলে একজন আরেক জনের সাথে ভালো সম্পর্ক থাকবে।</p>
                        <p>যে কোন সসম্যায় আমার সাথে যোগাযোগ করবেন।</p>
                        <h1>Alamgir Alam</h1>
                        <h6>Leader Head of the mess</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
