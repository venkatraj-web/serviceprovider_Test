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
        <div class="col-md-6"><h3 class="text-center"><strong>{{ $user->name }}</strong> Update Your Profile </h3>
        	<form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">@csrf
        		<div class="form-group">
        			<label class="info-title">Name <span></span></label>
        			<input type="text" name="name" value="{{ $user->name }}" class="form-control">
        		</div>
        		<div class="form-group">
		            <label class="info-title">Email Address <span></span></label>
		            <input type="email" name="email" value="{{ $user->email }}" class="form-control" >
		        </div>
		        <div class="form-group">
		            <label class="info-title">Phone <span></span></label>
		            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" >
		        </div>
		        <div class="form-group">
		            <label class="info-title">User Image <span></span></label>
		            <input type="file" name="profile_photo_path" class="form-control" >
		        </div>
		        <div class="form-group">
		            <button type="submit" class="btn btn-danger">Update</button>
		        </div>
        	</form>

        </div>
    </div>
</div>



@endsection