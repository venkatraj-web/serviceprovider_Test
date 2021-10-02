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
                <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
            </ul>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-6"><h3 class="text-center"><strong>{{ $user->name }}</strong> Update Your Password </h3>
        	<form action="{{ route('user.update.password') }}" method="POST">@csrf
        		<div class="form-group">
        			<label class="info-title">Current Password <span></span></label>
        			<input type="password" name="oldpassword" id="current_password" class="form-control">
        			@error('oldpassword')
        				<span class="text-danger">{{ $message }}</span>
        			@enderror
        		</div>
        		<div class="form-group">
		            <label class="info-title">New Password <span></span></label>
		            <input type="password" name="password" id="password" class="form-control" >
		            @error('password')
        				<span class="text-danger">{{ $message }}</span>
        			@enderror
		        </div>
		        <div class="form-group">
		            <label class="info-title">Confirm Password <span></span></label>
		            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
		            @error('password_confirmation')
        				<span class="text-danger">{{ $message }}</span>
        			@enderror
		        </div>
		        
		        <div class="form-group">
		            <button type="submit" class="btn btn-danger">Update</button>
		        </div>
        	</form>

        </div>
    </div>
</div>



@endsection