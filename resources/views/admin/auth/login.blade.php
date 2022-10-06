<!DOCTYPE html>
<html lang="en"> 
<head>
  @include('admin.layouts.style')
</head> 

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="http://mtsidaarulatqiyaa.com/wp-content/uploads/2018/03/Revisi-Logo-PONDOK-768x768.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to CMS</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{ route("admin-auth.store") }}">
              @csrf         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input 
                  id="signin-email" 
                  name="email" 
                  type="email" 
                  class="form-control signin-email" 
                  placeholder="Email address" 
                  required="required"
                >
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input 
                  id="signin-password" 
                  name="password" 
                  type="password" 
                  class="form-control signin-password" 
                  placeholder="Password" 
                  required="required"
                >
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input name="is_remember" class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div><!--//col-6-->
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.html">Forgot password?</a>
										</div>
									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
						
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
			        <small class="copyright">Develop with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by banggfkr002@gmail.com </small>
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

