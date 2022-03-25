@include('utilityofficer.Includes.header')

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Add New Timeline</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body utilityadd">
				<form action="{{route('utilityaddnewtimeline')}}" method="post">
					@csrf

					<label for="username">Date</label>
					<input class="form-control" id="date" name="date" placeholder="" type="date">
					<input name="staff_id" type="hidden" value="{{session('staffid')}}">

					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<label for="genissues">General Issues </label>
								<textarea name="general_issue" id="genissues" cols="30" rows="10"></textarea>
								<select name="general_location" id="">
									<option value="Location">Location</option>
									<option value="School">School</option>
									<option value="Hub">Hub</option>
								</select>
							</div>
							<div class="col-6">
								<label for="gencomment"> General Comment</label>
								<textarea name="general_comments" id="gencomment" cols="30" rows="10"></textarea>

								<select name="general_status" id="">
									<option value="Status">Status</option>
									<option value="Good">Good</option>
									<option value="Solved">Solved</option>
									<option value="In Progress">In Progress</option>
								</select>
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<label for="mowerissues">Mower Issues</label>
								<textarea name="mower_issue" id="mowerissues" cols="30" rows="10"></textarea>
								<select name="mower_size" id="">
									<option value="">Select</option>
									<option value="Big">Big</option>
									<option value="Small">Small</option>
								</select>
							</div>
							<div class="col-6">
								<label for="mowercomment">Mower Comment</label>
								<textarea name="mower_comment" id="mowercomment" cols="30" rows="10"></textarea>

								<select name="mower_status" id="">
									<option value="Status">Status</option>
									<option value="Good">Good</option>
									<option value="Solved">Solved</option>
									<option value="In Progress">In Progress</option>
								</select>
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<label for="generatoriss">Generator Issues</label>
								<textarea name="generator_issue" id="generatoriss" cols="30" rows="10"></textarea>
								<select name="generator_size" id="">
									<option value="">Select</option>
									<option value="Big">Big</option>
									<option value="Small">Small</option>
								</select>
							</div>
							<div class="col-6">
								<label for="genecomment">Generator Comment</label>
								<textarea name="generator_comment" id="genecomment" cols="30" rows="10"></textarea>

								<select name="generator_status" id="">
									
									<option value="Good">Good</option>
									<option value="Solved">Solved</option>
									<option value="In Progress">In Progress</option>
								</select>
							</div>
						</div>
					</div>
				
					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<label for="upsiss">UPS</label>
								
								<select name="ups_issue" id="upsiss">
									<option value="">Select</option>
									<option value="Input">Input</option>
									<option value="Output">Output</option>
									<option value="No Issue">No Issue</option>
								</select>
							</div>
							<div class="col-6">
								<label for="ups">UPS Comment</label>
								<textarea name="ups_comment" id="ups" cols="30" rows="10"></textarea>

								
							</div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row justify-content-center mt-2 align-items-center">
							<div class="col-6">
								<label for="fuel">FUEL</label>
								
								<select name="fuel_type" id="fuel">
									<option value="">Select</option>
									<option value="Petrol">Petrol</option>
									<option value="Diesel">Diesel</option>
								
								</select>
							</div>
							<div class="col-6">
								<label for="ups">Litres</label>
								<textarea name="fuel_liters" id="ups" cols="30" rows="10"></textarea>

								
							</div>
						</div>
					</div>
				








					<button type="submit" class="btn btn-primary login_button" name="login">Add New Timeline</button>
				</form>
			</div>

		</div>
	</div>
</div>

@include('utilityofficer.Includes.footer')