@extends('layouts.admin2.master')

@section('title', '- Keterangan')

@section('content')
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Halaman Laporan Keterangan</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Ketentuan</h3>
		                <div class="section-intro">
                            Laporan yang akan dikirim akan masuk kepada pihak owner
                        </div>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" action="{{ route('admin2.messageStore') }}" method="POST" enctype="multipart/form-data">
								@csrf
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Username</label>
									    <input type="text" class="form-control" id="setting-input-2" name="username" value="{{ Auth::user()->username }}" required disabled>
									</div>
								    <div class="mb-3">
									    <label for="setting-input-3" class="form-label">Keterangan</label>
                                        <style> 
                                        textarea {
                                            width: 100%;
                                            height: 150px;
                                            padding: 12px 20px;
                                            box-sizing: border-box;
                                            border: 1px solid #ccc;
                                            border-radius: 4px;

                                            font-size: 16px;
                                            resize: none;
                                        }
                                        </style>
									    <textarea rows="7" cols="80" name="description" style="webkit-border-radius: 5px;"></textarea>
									</div>
									<button type="submit" class="btn app-btn-primary" >Kirim</button>
							    </form>
						    </div><!--//app-card-body-->
						    
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
@endsection