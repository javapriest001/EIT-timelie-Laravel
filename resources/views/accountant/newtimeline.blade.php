@include('accountant.Includes.header')


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Timeline</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{route('addTimeline')}}" method="post">
					@csrf
					<div class="container">
						<div class="row justify-content-center text-center py-2">
							<h3>SECTION A</h3>
							<h5>Daily Account</h5>
						</div>
					</div>
					<label for="username">Date</label>
					<input class="form-control" id="date" name="date" placeholder="" type="date">
					<input name="staff_id" type="hidden" value="{{session('staffid')}}">
					<span class="text-danger">
						<h6>@error('date'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="uploads">No Of Uploads</label>
					<input class="form-control" oninput="calcBal()" id="uploads" name="uploads" placeholder="No Of Uploads" type="number">
					<span class="text-danger">
						<h6>@error('uploads'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="correction">No Of Corrections</label>
					<input class="form-control" oninput="calcBal()" id="correction" name="correction" placeholder="No Of Corrections" type="number">
					<span class="text-danger">
						<h6>@error('correction'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="validation">No Of Validations</label>
					<input class="form-control" oninput="calcBal()" id="validation" name="validation" placeholder="No Of Validations" type="number">
					<span class="text-danger">
						<h6>@error('validation'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="profile_crtn">No Of Profile Creations</label>
					<input class="form-control" oninput="calcBal()" id="profile_crtn" name="profile_crtn" placeholder="No Of Profile Creations" type="number">
					<span class="text-danger">
						<h6>@error('profile_crtn'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="post_utme">No Of Post UTME</label>
					<input class="form-control" oninput="calcBal()" id="post_utme" name="post_utme" placeholder="No Of Post UTME" type="number">
					<span class="text-danger">
						<h6>@error('post_utme'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="post_utme">No Of Printing</label>
					<input class="form-control" oninput="calcBal()" id="printing" name="printing" placeholder="No Of Printing" type="number">
					<span class="text-danger">
						<h6>@error('printing'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="onlinereg">No Of Online Registration</label>
					<input class="form-control" oninput="calcBal()" id="onlinereg" name="onlinereg" placeholder="Online Registration" type="number">
					<span class="text-danger">
						<h6>@error('amount'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="part_time">No Of Part-Time Services</label>
					<input class="form-control" oninput="calcBal()" id="part_time" name="part_time" placeholder="No Of Part-Time Services" type="number">
					<span class="text-danger">
						<h6>@error('part_time'){{ $message }} @enderror</h6>
					</span>
					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<h4>TOTAL</h4>
							</div>
							<div class="col-6">
								<input class="form-control" id="total1" name="total1" placeholder="Total" type="number" disabled>

							</div>
						</div>
					</div>


					<hr>
					<div class="container">
						<div class="row justify-content-center text-center py-2">
							<h3>SECTION B</h3>
							<h5>Operational Account</h5>
						</div>
					</div>

					<label class="mt-3" for="opening_bal">Opening Balance</label>
					<input class="form-control" oninput="calcBal()" id="opening_bal" name="opening_bal" placeholder="Opening Balance" type="number">
					<span class="text-danger">
						<h6>@error('opening_bal'){{ $message }} @enderror</h6>
					</span>
					<label class="mt-3" for="closing_bal">Closing Balance</label>
					<input class="form-control" oninput="calcBal()" id="closing_bal" name="closing_bal" placeholder="Opening Balance" type="number" disabled>
					<span class="text-danger">
						<h6>@error('closing_bal'){{ $message }} @enderror</h6>
					</span>
					<div class="container-fluid">
						<div class="row justify-content-between mt-2 jus align-items-center gap-3">
							<div class="col-3">
								<label class="mt-3" for="jamb_no">JAMB NO</label>
								<input class="form-control" id="jamb_no" name="jamb_no" placeholder="JAMB NO" type="number">
							</div>
							<div class="col-3">
								<label class="mt-3" for="jamb_payall">Pay Attitude</label>
								<input class="form-control" oninput="calcBal()" id="jamb_payall" name="jamb_payall" placeholder="No Of Pay Attitude" type="number">
							</div>
							<div class="col-3">
								<label class="mt-3" for="jamb_remita">Remita</label>
								<input class="form-control" oninput="calcBal()" id="jamb_remita" name="jamb_remita" placeholder="No Of Jamb Remita" type="number">
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row justify-content-between mt-2 gap-3 align-items-center">
							<div class="col-5">
								<label class="mt-3" for="exp_amt">Total Expenses</label>
								<input class="form-control" oninput="calcBal()" id="exp_amt" name="exp_amt" placeholder="Total Expenses" type="number">

							</div>
							<div class="col-6">
								<label class="mt-3" for="exp_amt">Expenses Remark</label>
								<input class="form-control" id="exp_remark" name="exp_remark" placeholder="Remark" type="text">

							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<h4>TOTAL PROFIT</h4>
							</div>
							<div class="col-6">
								<label class="mt-3" for="payment_profit">Total Profit</label>

								<input class="form-control" oninput="calcBal()" id="payment_profit" name="payment_profit" placeholder="Total Profit" type="number" disabled>

							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary login_button" name="login">Add New Timeline</button>
				</form>
			</div>

		</div>
	</div>
</div>







@include('accountant.Includes.footer')