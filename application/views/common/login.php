
<div id="loginModel" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div id="loginbox">
				<div class="modal-header" style="background-color:black ">
					<div class="panel-heading" >
						<div class="panel-title">Sign In</div>
						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
					</div>
				</div>
				<div class="modal-body" style="background-color: tomato">
						<div id="login-alert" style="display:none" class="alert alert-danger">
							
						</div>

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email" required >
							<div id="username-alert"></div>
						</div>

						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="login-password" type="password" class="form-control" name="password" placeholder="password" required="">
							<div id="pswd-alert"></div>
						</div>



						<div class="input-group">
							<div class="checkbox">
								<span style="float: left; line-height: 15px;">Remember me</span> 
								<span style="float:right">
									<input id="login-remember" class="form-control" type="checkbox" name="remember" value="1" style="height: 20px;"> 
								</span> <br>
								<button id="btn-login" class="btn btn-primary form-control">Login</button>
							</div>
						</div>
						<hr>
						<div style="margin-top:10px" class="form-group">
							<!-- Button -->
							
								
								<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
								<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Google</a>
							
						</div>
				</div>
				<div class="modal-footer" style="background-color: #171718">
					<div class="form-group">
						
						<div>
							Don't have an account!
							<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
								Sign Up Here
							</a>
						</div>

					</div>
					<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<div id="signupbox" style="display:none;">
				<div class="modal-header" style="background-color: #171718">
					<div class="panel-heading">
						<div class="panel-title">Sign Up</div>
						<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
					</div>
				</div>
				<div class="modal-body" style="background-color: tomato">
					<form id="signupform" action="<?=base_url('index.php/login')?>" method="POST" class="form-horizontal" role="form">
						<div id="signupalert" style="display:none" class="alert alert-danger">
							<p>Error:</p>
							<span></span>
						</div>
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">Email*</label>
							<div class="col-md-9">
								<input  class="form-control" id="user-email" type="email" name="email" placeholder="Email Address" required="">
								<div id="email-alert" style="color:red;"></div>
							</div>
							
						</div>
						<div class="form-group">
							<label for="firstname" class="col-md-3 control-label"  >First Name*</label>
							<div class="col-md-9">
								<div id="fname-alert"></div>
								<input type="text" id="fname" class="form-control" pattern="[a-zA-Z]+" name="firstname" placeholder="First Name" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-md-3 control-label">
							Last Name*</label>
							<div class="col-md-9">
								<div id="lname-alert"></div>
								<input type="text" id="lname" class="form-control" pattern="[a-zA-Z]+" name="lastname" placeholder="Last Name" required="">
							</div>
						</div>
						<div class="form-group">
							<label for="mobile" class="col-md-3 control-label">
							Mobile*</label>
							<div class="col-md-9">
								
								<input type="text" id="user-mobile" class="form-control" pattern="[1-9][0-9]{9}" name="mobile" placeholder="Mobile" required="">
								<div id="mobile-alert" style="color:red;"></div>
							</div>

						</div>
						<div class="form-group">
							<label for="password" class="col-md-3 control-label">Password*</label>
							<div class="col-md-9">
								<input type="password" id="password" class="form-control" name="password" placeholder="Password" required="" pattern=".{8,100}">
							</div>

						</div>
						<div class="form-group">
							<!-- Button -->
							<div class="col-md-offset-3 col-md-9">
								<input id="btn-signup" type="submit" name="signup" class="btn btn-info" value="Sign Up"><i class="icon-hand-right"></i> &nbsp;
								<span style="margin-left:8px;">or</span>
							</div>
						</div>
						<hr>
						<div style="margin-top:10px" class="form-group">
							<!-- Button -->
							<div class="col-sm-12 controls" style="margin:5px;">
								
								<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>
								<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Google</a>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer" style="background-color: #171718">
					<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

