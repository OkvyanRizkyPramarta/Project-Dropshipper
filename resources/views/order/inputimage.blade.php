@extends('layouts.admin.master')

@section('title', '- Input Image')

@section('content')
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Halaman Edit Data Pesanan</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" action="{{ route('order.storeImage') }}" method="POST" enctype="multipart/form-data">
    							@csrf
                                    <div class="mb-3">
                                        <label for="setting-input-2" class="form-label">Order ID</label>
                                        <select id="choices-type" name="order_id" class="form-control" required>
                                            <option selected disabled>Pilih Data Order Id</option>
                                            @foreach($order as $o)
                                                <option value="{{ $o->id }}">{{ $o->order_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Masukkan Data Gambar</label>
									    <input type="file" class="form-control" id="setting-input-2" 
                                        name="image">
									</div><br>
                                    <a href="{{ route('order.index') }}" class="btn btn-light m-0">Cancel</a> &nbsp;
									<button type="submit" class="btn app-btn-primary" >Kirim</button>
							    </form>
						    </div><!--//app-card-body-->  
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
@endsection