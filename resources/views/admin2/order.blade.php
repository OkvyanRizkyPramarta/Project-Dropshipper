@extends('layouts.admin2.master')

@section('title', '- Order')

@section('content')

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			
			    
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Halaman Pesanan</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center">
					                    <div class="col-auto">
					                        <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Pencarian">
					                    </div>
					                    <div class="col-auto">
					                        <button type="submit" class="btn app-btn-secondary">Cari</button>
					                    </div>
					                </form>
							    </div>
						    </div>
					    </div>
				    </div>
			    </div>
			    
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false"></a>
				</nav>
				
				<div class="tab-content" id="orders-table-tab-content">
					<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
					@csrf
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">OrderDate</th>
												<th class="cell">OrderID</th>
												<th class="cell">Username</th>
												<th class="cell">Customer Address</th>
												<th class="cell">Customer Phone</th>
												<th class="cell">COD Mount</th>
												<th class="cell">Product Checking</th>
												<th class="cell">Status Sending</th>
												<th class="cell">Status COD Ammount</th>
												<th class="cell">Status POD</th>
												<th class="cell">Status Order</th>
												<th class="cell">Keterangan</th>
												<th class="cell">Status Transaksi</th>
												<th class="cell">Product Received</th>
											</tr>
										</thead>
										<tbody>
										@foreach($order as $o)
											<tr>
												<td class="cell">{{ $o->order_date }}</td>
												<td class="cell">{{ $o->order_id }}</td>
												<td class="cell">{{ $o->username }}</td>
												<td class="cell">{{ $o->customer_address }}</td>
												<td class="cell">{{ $o->customer_phone }}</td>
												<td class="cell">{{ $o->cod_ammount }}</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->product_checking == 'pending')
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>DONE</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_sending == 'pending')
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>SENT</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_cod_ammount == 'pending')
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PAID</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_pod == 'pending')
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>POD</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_order == 'undelivered' && '$o->status_pod == pod && $o->status_paid == paid ')
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>UNDELIVERED</span>
														@else
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>DELIVERED</span>
														@endif
													</span>
												</td>
												<td class="cell">{{ $o->keterangan}}</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_transaction == 'unfinished')
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>UNFINISHED</span>
														@else
														<a class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>FINISHED</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->product_received == 'pending')
														<a href="{{ route('order.updateStatusReceivedAdmin2', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a href="" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>RECEIVED</span>
														@endif
													</span>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
						        </div>
						    </div>	
						</div>

						<nav class="app-pagination">
							<ul class="pagination justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							    </li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
								    <a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>			
			        </div>
					</form>
				</div> 
		    </div>
	    </div>
@endsection