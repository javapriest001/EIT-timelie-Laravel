@include('Includes.header')

<div class="container-fluid">
	<div class="row">
		<div class="col-6">

		</div>
		<div class="col-4">
			@if(session('success'))
			<div class="alert alert-success alert-dismissible message_alert fade show py-2 mx-4 mt-3 text-center" role="alert">
				{{session('success')}}
				<button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
			@if(session('error'))
			<div class="alert alert-danger alert-dismissible message_alert fade show py-2 mx-4 mt-3 text-center" role="alert">
				{{session('error')}}
				<button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
		</div>
	</div>

	<div class="row">
		@include('Includes.navbar')
		<div class="col-md-8">
			<!--============ MAIN SECTION================= -->
			<div class="container-fluid main">
				<h3 class="welcome">DASHBOARD</h3>
				<div class="row mt-5">
					<div class="col-md-3">
						<input class="form-control" type="date" name="" id="" />
					</div>
				</div>
				<div class="row gap-4 mt-3">
					<div class="col-md-3">
						<div class="card reportcard accountcard">
							<div class="card-body">
								<span class="material-icons-sharp ms-2 mb-3 bullet-icon">
									insights
								</span>
								<div class="row justify-content-center mb-3">
									<div class="col-5">
										<h4>Accountant's Report</h4>

										<h3>{{$Accountant}}</h3>

									</div>
									<div class="col-5 card-icon">
										<span class="material-icons-sharp"> insights </span>
									</div>
								</div>
								<a href="{{route('accountantRecord')}}"><small class="text-secondary text-muted mt-5 ps-3">See More</small></a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card reportcard deskcard">
							<div class="card-body">
								<span class="material-icons-sharp ms-2 mb-3 bullet-icon">
									add_to_queue
								</span>
								<div class="row justify-content-center mb-3">
									<div class="col-5">
										<h4>Desk Officer's Report</h4>
										<h3>{{$deskOfficer}}</h3>
									</div>
									<div class="col-5 card-icon">
										<span class="material-icons-sharp"> add_to_queue </span>
									</div>
								</div>
								<a href="{{route('deskofficerRecord')}}"><small class="text-secondary text-muted mt-5 ps-3">See More</small></a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card reportcard utilitycard">
							<div class="card-body">
								<span class="material-icons-sharp ms-2 mb-3 bullet-icon">
									manage_accounts
								</span>
								<div class="row justify-content-center mb-3">
									<div class="col-5">
										<h4>Utility Officer's Report</h4>
										<h3>{{$utility}}</h3>
									</div>
									<div class="col-5 card-icon">
										<span class="material-icons-sharp">
											manage_accounts
										</span>
									</div>
								</div>
								<a href="{{route('utilityofficerrecord')}}"><small class="text-secondary text-muted mt-5 ps-3">See More</small></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row staff table">
					<div class="col-12">
						<div class="card staff_list_card">
							<div class="card-body">
								<h4 class="">Staff</h4>
								<table class="table table-sm">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">First Name</th>
											<th scope="col">Last Name</th>
											<th scope="col">Role</th>
										</tr>
									</thead>
									<tbody>
										@foreach($staff as $staff)
										<tr>
											<th scope="row">1</th>
											<td>{{$staff->first_name}}</td>
											<td>{{$staff->surname}}</td>
											<td>{{$staff->category}}</td>
										</tr>
										@endforeach

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('Includes.rightnav')
		
		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Add New Fee</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="{{route('dashboard')}}" method="post">
							@csrf
							<label for="username">Fee Name</label>
							<input class="form-control" id="username" name="fee" placeholder="Enter Your Email or Username" type="text">
							<span class="text-danger">
								<h6>@error('fee'){{ $message }} @enderror</h6>
							</span>
							<label class="mt-3" for="password">Amount</label>
							<input class="form-control" id="password" name="amount" placeholder="Enter Password" type="number">
							<span class="text-danger">
								<h6>@error('amount'){{ $message }} @enderror</h6>
							</span>
							<button type="submit" class="btn btn-primary login_button" name="login">Add Fee</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@include('includes.footer')