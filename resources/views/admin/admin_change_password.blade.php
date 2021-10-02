@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Change Password</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('admin.update.password') }}" >
						@csrf
					  		
				  		<div class="row">
		  					<div class="col-md-8">
		  						<div class="form-group">
									<h5>Current Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" id="current_password" name="current_password" class="form-control"> </div>
									@error('current_password')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
								</div>
		  					</div>
		  					<div class="col-md-8">
		  						<div class="form-group">
									<h5>New Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" id="password" name="password" class="form-control"> </div>

									@error('password')
               <span class="text-danger"> {{ $message }}</span>
          @enderror
									
								</div>
		  					</div>
		  					<div class="col-md-8">
		  						<div class="form-group">
									<h5>Confirm Password<span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" id="password_confirmation" name="password_confirmation" class="form-control"> </div>
									
								</div>
		  					</div>
		  				</div>	  				
							
							
							
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Submit</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>




@endsection