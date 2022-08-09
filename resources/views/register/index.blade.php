@extends('layouts.admin.master')

@section('title', '- Order')

@section('content')	
	    <div class="col-5 text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
					<h2 class="auth-heading text-center mb-5">Halaman Registrasi Akun</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{ route('register.store') }}">  
                            @csrf     
                            <div class="email mb-3">
								<label class="sr-only" for="signup-email">Nama</label>
								<input id="signup-name" name="name" type="text" class="form-control signup-name" placeholder="Nama Panjang" required="required">
							</div>
                            <div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
							</div> 
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
                                <input id="signin-email" type="email" class="form-control signin-email @error('email') is-invalid @enderror" name="email"  placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
                                <input id="password" type="password" class="form-control signin-password @error('password') is-invalid @enderror" name="password"  placeholder="Password" required autocomplete="current-password">
							</div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control signin-password @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
                            </div>
                            <div class="email mb-3">
								<select class="form-select" name="role" >
									<option selected value="" disabled selected>Select your option</option>
                                    <option value="1">Owner</option>
									<option value="2">Outbound</option>
									<option value="3">Inbound</option>
									<option value="4">Admintraffic</option>  
                                    <option value="5">Kasir</option>
                                    <option value="6">Kurir</option>  
                                    <option value="7">Admin 2</option>  
								</select>
							</div>
                            <div class="email mb-3">
								<label class="sr-only" for="signup-email">Nomor KTP</label>
								<input id="signup-name" name="id_card_number" type="text" class="form-control signup-name" placeholder="Nomor KTP" required="required">
							</div>
                            <div class="email mb-3">
								<label class="sr-only" for="signup-email">Nomor Telepon</label>
								<input id="signup-name" name="phone_number" type="text" class="form-control signup-name" placeholder="Nomor Telepon" required="required">
							</div>
                            <div class="email mb-3">
								<label class="sr-only" for="signup-email">Nomor Whatsapp</label>
								<input id="signup-name" name="whatsapp_number" type="text" class="form-control signup-name" placeholder="Nomor Whatsapp">
							</div>
                            <div class="text-center">
							    <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Registrasi Sekarang</button>
						    </div>
						</form>
					</div><!--//auth-form-container-->	
			    </div><!--//auth-body-->    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->   

@endsection