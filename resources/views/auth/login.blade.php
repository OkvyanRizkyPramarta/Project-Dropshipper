<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Dropshipper</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Dropshipper">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}"> 
    
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('admin/assets/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('admin/assets/css/portal.css') }}" type="text/css">

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head> 
<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
                        <a class="app-logo">
                            <img class="logo-icon me-2" src="{{ asset('admin/assets/images/app-logo.svg') }}" alt="logo">
                        </a>
                    </div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{ route('login') }}">  
                            @csrf       
							<div class="email mb-3">
								<h6>Username</h6>
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Masukkan Username" required  autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--//form-group-->
							<div class="password mb-3">
								<h6>Password&nbsp;<i id="eyeChangeId" class="fa fa-eye" onclick="eyeEnableOrDisable()"></i></h6>
                                <input id="passwordInputID" type="password" class="form-control signin-password @error('password') is-invalid @enderror" name="password"  placeholder="Masukkan Password" required autocomplete="current-password">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
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
				         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			        <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
				       
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
    
    </div><!--//row-->
</div>

<script src="{{ asset('admin/assets/plugins/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Charts JS -->
<script src="{{ asset('admin/assets/plugins/chart.js/chart.min.js') }}"></script> 
<script src="{{ asset('admin/assets/js/index-charts.js') }}"></script>

<!-- Page Specific JS -->
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

<script type="text/javascript">
	//Javascript function definition
	function eyeEnableOrDisable() 
	{
		//getting type of the password field element by jQuery
		var x = $('#passwordInputID').prop("type"); 
		if (x === "password") 
		{
			//changing input type text
			$('#passwordInputID').prop("type", "text");
			//removing fa-eye class
			$('#eyeChangeId').removeClass('fa-eye-slash'); 
			
			//adding fa-eye-slash class
			$('#eyeChangeId').addClass('fa-eye'); 
			
		} 
		else 
		{
			//changing type passord
			$('#passwordInputID').prop("type", "password");
			//removinf fa-eye-slash class
			$('#eyeChangeId').removeClass('fa-eye'); 
			//adding fa-eye class
			$('#eyeChangeId').addClass('fa-eye-slash'); 
		}
	}
</script>
</body>
</html> 