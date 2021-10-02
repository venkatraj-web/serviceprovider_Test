
@extends('frontend.main_master')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br>
            <img src="{{ !empty($user->profile_photo_path) ? url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }}" style="border-radius: 50%;" width="100%" height="100%" alt="">
            <br><br>
            <ul class="list-group list-group-flush">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
            </ul>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <h4>Hello!! {{ Auth::user()->name }} </h4>
        </div>
    </div>
</div>





@endsection