@extends('layouts.admin.master')

@section('title', '- Register')

@section('content')	
	    <div class="col-5 text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
					<h2 class="auth-heading text-center mb-5">Halaman Registrasi Akun</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{ route('register.store') }}">  
                            @csrf     
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>			
								<input id="signup-name" name="name" type="text" class="form-control signup-name" 
								placeholder="Nama" value="{{ old('name') }}" required="required"> 
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<p style="font-size:12px;color:#CDCDCD"><i>Bisa huruf dan simbol. Tidak bisa angka</i></p>
							</div>

                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" 
								placeholder="Username" value="{{ old('username') }}" required="required">
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<p style="font-size:12px;color:#CDCDCD"><i>Bisa huruf, angka, dan simbol. tidak bisa spasi</i></p>
							</div> 

							<div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
                                <input id="signin-email" type="email" class="form-control signin-email @error('email') is-invalid @enderror" 
								name="email"  placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--//form-group-->
							
							<div class="password mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<i id="eyeChangeId" class="fa fa-eye" onclick="eyeEnableOrDisable()"></i>
                                <input id="passwordInputID" type="password" class="form-control signin-password @error('password') is-invalid @enderror" 
								name="password"  placeholder="Password" required autocomplete="current-password"> 
								@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror	
								<p style="font-size:12px;color:#CDCDCD"><i>Minimal 8 Karakter, Harus berisi minimal 1 huruf kapital, angka, dan simbol</i></p>
								
							</div><!--//form-group-->
							
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<select class="form-select" name="role" value="{{ old('role') }}">
									<option selected value="" disabled selected>Select your option</option>
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
								placeholder="Nomor KTP" value="{{ old('id_card_number') }}" required="required">
								<p style="font-size:12px;color:#CDCDCD"><i>Harus berisi angka dan jumlahnya 16</i></p>
							</div>
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Wajib</i>
								<label class="sr-only" for="signup-email">Nomor Telepon</label>
								<input id="signup-name" name="phone_number" type="text" class="form-control signup-name" 
								placeholder="Nomor Telepon" value="{{ old('phone_number') }}" required="required">
								<p style="font-size:12px;color:#CDCDCD"><i>Harus diawali angka 0 dan jumlahnhya minimal 10</i></p>
								
							</div>
                            <div class="email mb-3">
								<i><span class="text-danger">*</span> Opsional</i>
								<label class="sr-only" for="signup-email">Nomor Whatsapp</label>
								<input id="signup-name" name="whatsapp_number" type="text" class="form-control signup-name" 
								value="{{ old('whatsapp_number') }}" placeholder="Nomor Whatsapp">
								<p style="font-size:12px;color:#CDCDCD"><i>Harus diawali angka 0 dan jumlahnhya minimal 10</i></p>
							</div>
                            <div class="text-center">
							    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Registrasi Sekarang</button>
						    </div>
						</form>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->   



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
@endsection