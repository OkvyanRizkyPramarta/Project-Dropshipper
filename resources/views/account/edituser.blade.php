@extends('layouts.admin.master')

@section('title', '- Order')

@section('content')	
	    <div class="col-5 text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
					<h2 class="auth-heading text-center mb-5">Halaman Ubah Data Akun</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{ route('account.update', $user->id) }}">  
							@method('PUT')
    						@csrf
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<input id="signup-name" name="name" type="text" class="form-control signup-name" 
								placeholder="Nama" value="{{ $user->name }}" required="required">
								<a>Maksimal 255 Karakter, Alphabet</a>
							</div>
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" 
								placeholder="Username" value="{{ $user->username }}" required="required">
							</div> 
							<div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
                                <input id="signin-email" type="email" class="form-control signin-email @error('email') is-invalid @enderror" 
								name="email"  placeholder="Email address" value="{{ $user->email }}" required autocomplete="email" autofocus>
                            </div>
							
							<div class="password mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<i id="eyeChangeId" class="fa fa-eye" onclick="eyeEnableOrDisable()"></i>
                                <input id="passwordInputID" type="password" class="form-control signin-password @error('password') is-invalid @enderror" 
								name="password" placeholder="Masukkan Password ulang" required autocomplete="current-password"> 
							</div>
							
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<select class="form-select" name="role">
									<option value ="{{ $user->role }}" selected>{{ $user->role }}</option>
                                    <option value="1">Owner</option>
									<option value="2">Inbound Outbound</option>
									<option value="3">Admintraffic</option>  
                                    <option value="4">Kasir</option>
                                    <option value="5">Kurir</option>  
                                    <option value="6">Admin 2</option>   
								</select>
							</div>
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<label class="sr-only" for="signup-email">Nomor KTP</label>
								<input id="signup-name" name="id_card_number" type="text" class="form-control signup-name" 
								placeholder="Nomor KTP" value="{{ $user->id_card_number }}" required="required">
							</div>
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<label class="sr-only" for="signup-email">Nomor Telepon</label>
								<input id="signup-name" name="phone_number" type="text" class="form-control signup-name" 
								placeholder="Nomor Telepon" value="{{ $user->phone_number }}" required="required">
							</div>
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Opsional</i>
								<label class="sr-only" for="signup-email">Nomor Whatsapp</label>
								<input id="signup-name" name="whatsapp_number" type="text" class="form-control signup-name" 
								value="{{ $user->whatsapp_number }}" placeholder="Nomor Whatsapp">
							</div>
                            <div class="text-center">
							    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Ubah Data</button>
						    </div>
						</form>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->   


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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
			$('#eyeChangeId').removeClass('fa-eye'); 
			//adding fa-eye-slash class
			$('#eyeChangeId').addClass('fa-eye-slash'); 
		} 
		else 
		{
			//changing type passord
			$('#passwordInputID').prop("type", "password");
			//removinf fa-eye-slash class
			$('#eyeChangeId').removeClass('fa-eye-slash'); 
			//adding fa-eye class
			$('#eyeChangeId').addClass('fa-eye'); 
		}
	}
</script>
@endsection