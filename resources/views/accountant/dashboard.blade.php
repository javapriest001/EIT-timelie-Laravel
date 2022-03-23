@include('accountant.Includes.header')

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
		@include('accountant.Includes.navbar')
		<div class="col-md-8">
			<!--============ MAIN SECTION=================-->
			<div class="container-fluid main">
				<h3 class="welcome">DASHBOARD</h3>
				<div class="row mt-5">
					<div class="col-md-3">
						<a class="btn btn-primary addbutton" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
							<h4 class="feeamt">
								<span class="material-icons-sharp addfeeicon"> add </span>
								Add New Record
							</h4>
						</a>
					</div>
				</div>
				<div class="row gap-4 mt-3 ">
					@foreach($records as $record)
					<div class="col-md-3">

						<div class="card  accountantcard accountcard">
							<div class="card-body">
								<span class="material-icons-sharp ms-2 mb-3 bullet-icon">
									insights
								</span>
								<div class="row justify-content-between mb-3">
									<div class="col-5 ps-3">
										<h4>Daily Report</h4>
										<h3>{{$record->date}}</h3>
									</div>
									<div class="col-5 card-icon pe-3">
										<span class="material-icons-sharp"> insights </span>
									</div>
								</div>
								<a href="{{route('accountantRecord')}}"><small class="text-secondary text-muted mt-5 ps-3">See More</small></a>
							</div>
						</div>

					</div>
					@endforeach
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

										<tr>
											<th scope="row">1</th>
											<td>1</td>
											<td>2</td>
											<td>3</td>
										</tr>


									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('accountant.newtimeline')
		@include('accountant.Includes.rightnav')


	</div>
</div>


@include('accountant.Includes.footer')