@extends('layouts.admin.master')

@section('title', '- Edit')

@section('content')
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Halaman Edit Data Pesanan</h1>
			    <hr class="mb-4">
                <div class="row g-4 settings-section">
	                <div class="col-12 col-md-4">
		                <h3 class="section-title">Hapus Data</h3>
		                <div class="section-intro">
							Sebelum melakukan hapus data diharapkan data sudah dipastikan terlebih dahulu.
                        </div>&nbsp;
						<form action="{{ route('order.destroy', $order->id) }}" method="POST">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger" >
							<i class="fa fa-trash"></i>&nbsp;
							DELETE</a>
							</button>
						</form>
	                </div>
	                <div class="col-12 col-md-8">
		                <div class="app-card app-card-settings p-4">
						    
						    <div class="app-card-body">
							    <form class="settings-form" action="{{ route('order.update', $order->id) }}" method="POST" enctype="multipart/form-data">
								@method('PUT')
    							@csrf
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Order Date</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="order_date" value="{{ $order->order_date }}">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Username</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="username" value="{{ $order->username }}">
									</div>
									<div class="mb-3">
									    <label for="setting-input-2" class="form-label">Order Id</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="order_id" value="{{ $order->order_id }}">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">customer Address</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="customer_address" value="{{ $order->customer_address }}">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Customer Phone</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="customer_phone" value="{{ $order->customer_phone }}">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">User Kelurahan</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="user_kelurahan" value="{{ $order->user_kelurahan }}">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">User Kecamatan</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="user_kecamatan" value="{{ $order->user_kecamatan }}">
									</div>
                                    <div class="mb-3">
									    <label for="setting-input-2" class="form-label">Cod Ammount</label>
									    <input type="text" class="form-control" id="setting-input-2" 
                                        name="cod_ammount" value="{{ $order->cod_ammount }}">
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
									    <textarea rows="7" cols="80" name="keterangan" style="webkit-border-radius: 5px;">{{ $order->keterangan }}</textarea>
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