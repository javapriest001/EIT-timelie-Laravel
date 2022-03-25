<!-- ==============MOBILE NAV BAR============== -->
<div class="container-fluid d-block d-md-none mobile_nav_bar">
	<div class="navbar justify-content-start sticky-top bg-light  py-2 shadow-sm d-flex align-items-center">
		<button class="hamburger">
			<span class="material-icons-sharp"> menu </span>
		</button>
		<a href="" class="navbar-brand nav_brand_mobile">
			<h3>Cybermate<span>Pro</span></h3>
		</a>
		<div class=" profile_name_mobile align-items-center justify-content-end">

			<h4 class="text-muted">Hey, {{$avatar->category}}</h4>
		</div>
		<div class="">
			<img class="profile_img_mobile" src="{{asset('img/'.$avatar->profile_picture)}}" alt="" />
		</div>
	</div>
</div>
<div class="col-md-2 d-block d-md-none">
	<!--=============== LAST MAIN SECTION MOBILE============== -->
	<div class="container-fluid last_main_section ">
		<div class="row lastmain d-none d-md-block">
			<div class="col-9 profile_name align-items-center">
				<h4>Role</h4>
				<h4 class="text-muted">{{$avatar->category}}</h4>
			</div>
			<div class="col-2 profile_img">
				<img src="{{asset('img/'.$avatar->profile_picture)}}" alt="" />
			</div>
		</div>
		<div class="row staff mt-5">
			<div class="col-12">
				<div class="card staffcard_mobile">
					<div class="card-body">
						<div class="row justify-content-center mb-3">
							<div class="col-7">
								<h4>Accountants :</h4>
							</div>
							<div class="col-4 card-icon">
								<h4>2</h4>
							</div>
						</div>
						<div class="row justify-content-center mb-3">
							<div class="col-7">
								<h4>Desk Officers :</h4>
							</div>
							<div class="col-4 card-icon">
								<h4>2</h4>
							</div>
						</div>
						<div class="row justify-content-center mb-3">
							<div class="col-7">
								<h4>Utility Officers :</h4>
							</div>
							<div class="col-4 card-icon">
								<h4>2</h4>
							</div>
						</div>

						<small class="text-secondary text-muted mt-5 ps-3">See All Staff</small>
					</div>
				</div>
			</div>

		</div>
		<div class="row fees_mobile mt-3">
			<h4 class="fee_intro_mobile">Utilities</h4>
			<div class="">
				@foreach ($equipments as $data)
				<div class="card feecard_mobile mb-2">
					<div class="card-body fee_card_body_mobile">
						<div class="row gap-3 align-items-center">
							<div class="col-1 feeicon ms-1">
								<span class="material-icons-sharp"> paid </span>
							</div>
							<div class="col-10">
								<h4 class="feeamt">$data->equipment</h4>
								<small class="text-secondary text-muted">See Details</small>
							</div>
						</div>
					</div>
				</div>
				@endforeach

			</div>

			<div class="">
				<!-- <div class="card addfee_mobile mb-2">
					<div class="card-body fee_card_body">
						<div class="row gap-3 text-center justify-content-center align-items-center">
							<div class="col-10">
								<h4 class="feeamt">
									<span class="material-icons-sharp addfeeicon">
										add
									</span>
									Add New Fee
								</h4>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>
<div class="col-md-2 d-none d-md-block">
	<!--=============== LAST MAIN SECTION (DESKTOP) ============== -->
	<div class="container-fluid  ">
		<div class="row lastmain d-none d-md-block">
			<div class="col-9 profile_name align-items-center d-flex ">
				<div>
					<h4>Role</h4>
					<h4 class="text-muted">{{$avatar->category}}</h4>
				</div>
				<div class="ms-4 profile_img">
					<img src="{{asset('./img/'.$avatar->profile_picture)}}" alt="" />
				</div>
			</div>




		</div>
		<div class="row staff mt-5">
		</div>
		<div class="row fees mt-3">
			<h4 class="fee_intro">Utilities</h4>

			<div class="">
				@foreach($equipments as $data)
				<div class="card feecard mb-2">
					<div class="card-body fee_card_body">
						<div class="row gap-3 align-items-center">
							<div class="col-1 feeicon ms-1">
								<span class="material-icons-sharp"> paid </span>
							</div>
							<div class="col-10">
								<h4 class="feeamt">{{$data->equipment}}</h4>
								<small class="text-secondary text-muted">See Details</small>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>