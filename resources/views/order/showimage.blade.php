@extends('layouts.admin.master')

@section('title', '- Show Image')

@section('content')
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Halaman Show Data Image Pesanan</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form">
								<div class="form-group">
									<label>Gambar</label>
									<div>
										<label>Order ID : {{ optional($order->images)->order_id}}</label>
										<img src="{{asset('storage/'.optional($order->images)->image)}}" width="670" height="350">
									</div>
								</div>
                                    <a href="{{ route('order.index') }}" class="btn btn-light m-0">Back</a> &nbsp;
							    </form>
						    </div><!--//app-card-body-->  
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
@endsection