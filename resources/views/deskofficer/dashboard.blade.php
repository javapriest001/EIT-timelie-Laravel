@include('deskofficer.Includes.header')

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
		@include('deskofficer.Includes.navbar')
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
		@include('deskofficer.newtimeline')
		@include('deskofficer.Includes.rightnav')


	</div>
</div>
<script>
	
	const math = (input, price) => {


		return input * price;


	}
	const calc = (a, b) => {
		return a.value = b.value

	}

	const calcBal = () => {

		let uploadAmt = <?php echo $uploads['Amount']; ?>;
		let printingAmt = <?php echo $printing['Amount']; ?>;
		let putmeAmt = <?php echo $putme['Amount']; ?>;
		let OnlineregAmt = <?php echo $Onlinereg['Amount']; ?>;
		let profile_crtnAmt = <?php echo $profilecrtn['Amount']; ?>;
		let CorrectionAmt = <?php echo $data['Amount']; ?>;
		let part_timeAmt = <?php echo $parttime['Amount']; ?>;
		let ValidationAmt = <?php echo $validation['Amount']; ?>;
		let Jamb_pay = <?php echo $jambpay['Amount']; ?>;
		let Jamb_remita = <?php echo $jambremita['Amount']; ?>;


		let upload = document.getElementById('uploads');
		let print = document.getElementById('printing');
		let valid = document.getElementById('validation');
		let correct = document.getElementById('correction');
		let putme = document.getElementById('post_utme');
		let onlinereg = document.getElementById('onlinereg');
		let profile = document.getElementById('profile_crtn');
		let part = document.getElementById('part_time');




		//SECTION A
		let uploadC = (upload.value === '') ? 0 : math(parseFloat(upload.value), uploadAmt);
		let printC = (print.value === '') ? 0 : math(parseFloat(print.value), printingAmt);
		let validC = (valid.value === '') ? 0 : math(parseFloat(valid.value), ValidationAmt);
		let correctC = (correct.value === '') ? 0 : math(parseFloat(correct.value), CorrectionAmt);
		let putmeC = (putme.value === '') ? 0 : math(parseFloat(putme.value), putmeAmt);
		let onlineregC = (onlinereg.value === '') ? 0 : math(parseFloat(onlinereg.value), OnlineregAmt);
		let profileC = (profile.value === '') ? 0 : math(parseFloat(profile.value), profile_crtnAmt);
		let partC = (part.value === '') ? 0 : math(parseFloat(part.value), part_timeAmt);



		document.getElementById('total1').value = uploadC + correctC + putmeC + printC + profileC + validC + onlineregC + partC




	



	}



	
</script>

@include('deskofficer.Includes.footer')