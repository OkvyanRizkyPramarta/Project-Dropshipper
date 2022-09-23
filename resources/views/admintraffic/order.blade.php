@extends('layouts.admintraffic.master')

@section('title', '- Order')

@section('content')

	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Halaman Pesanan</h1>
				    </div>
			    </div>
			    
			    <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				    <a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab" href="#orders-cancelled" role="tab" aria-controls="orders-cancelled" aria-selected="false"></a>
				</nav>
				<div class="tab-content" id="orders-table-tab-content">
					<form action="{{ route('importAdmintraffic') }}" method="POST" enctype="multipart/form-data">
					@csrf
			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
								<input type="file" name="file" class="custom-file-input" id="customFile">
								<button class="btn btn-primary">Import Excel</button>
								<a class="btn btn-warning" 
								href="{{ route('exportAdmintraffic') }}">
										Export Data
								</a>
								<a class="btn btn-primary" 
								href="{{ route('order.indexImageAdmintraffic') }}">
										Input Image
								</a>
							    <div class="table-responsive">
							        <table id="data_users_reguler" class="table app-table-hover mb-0 text-left">
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
												<th class="cell">Image POD</th>
												<th class="cell">Status POD</th>
												<th class="cell">Status Order</th>
												<th class="cell">Keterangan</th>
												<th class="cell">Status Transaction</th>
												<th class="cell">Product Received</th>
												<th class="cell"></th>
											</tr>
										</thead>
										<tbody>
										@foreach($order as $key=>$o)
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
														<a href="{{ route('order.updateStatusCheckingAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a href="{{ route('order.updateStatusCheckingPendingAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>DONE</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_sending == 'pending')
														<a href="{{ route('order.updateStatusSentAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a href="{{ route('order.updateStatusSentPendingAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>SENT</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_cod_ammount == 'pending')
														<a href="{{ route('order.updateStatusPaidAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a href="{{ route('order.updateStatusPaidPendingAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PAID</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success"> 
														<a href="{{ route('order.showImageAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
														<span>IMAGE</span>
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_pod == 'pending')
														<a href="{{ route('order.updateStatusPodAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a href="{{ route('order.updateStatusPodPendingAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>POD</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_order == 'undelivered' && '$o->status_pod == pod && $o->status_paid == paid ')
														<a href="{{ route('order.updateStatusDelAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>UNDELIVERED</span>
														@else
														<a href="{{ route('order.updateStatusDelUndeliveryAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>DELIVERED</span>
														@endif
													</span>
												</td>
												<td class="cell">{{ $o->keterangan}}</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->status_transaction == 'unfinished')
														<a href="{{ route('order.updateStatusTransactionAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>UNFINISHED</span>
														@else
														<a href="{{ route('order.updateStatusTransactionUnfinishedAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>FINISHED</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														@if ($o->product_received == 'pending')
														<a href="{{ route('order.updateStatusReceivedAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>PENDING</span>
														@else
														<a href="{{ route('order.updateStatusReceivedPendingAdmintraffic', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span>RECEIVED</span>
														@endif
													</span>
												</td>
												<td class="cell">
													<span class="badge bg-success">
														<a href="{{ route('admintraffic.edit', $o->id) }}" class="btn btn-icon-only btn-rounded mb-0 me-0 btn-sm d-flex align-items-center justify-content-center">
															<span><i class="fa fa-edit"></i>
															EDIT
															</span>
													</span>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
									<script>
										$(document).ready(function() {
										$('#data_users_reguler').DataTable();
										} );
									</script>
						        </div>
						    </div>	
						</div>
			        </div>
					</form>
				</div> 
		    </div>
	    </div>
@endsection


