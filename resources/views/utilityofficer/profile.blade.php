@include('utilityofficer.Includes.header')

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
        @include('utilityofficer.Includes.navbar')

        
        <div class="col-md-8">
            <!--============ MAIN SECTION================= -->
            <div class="container-fluid main">
                <h3 class="welcome"></h3>
                <div class="row gap-6 mt-5">
                   
                    <!-- <div class="col-md-2 justify-content-end">
                        <a class="btn btn-primary addbutton" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <h4 class="feeamt">
                                <span class="material-icons-sharp addfeeicon"> add </span>
                                Add
                            </h4>
                        </a>
                    </div> -->
                </div>
                <!-- <h4 class="">Accountant's Records</h4> -->
                <div class="row staff table">
                    <div class="">
                        <div class="card staff_list_card_role">
                            <div class="card-body">

                                <div class="row justify-content-between align-items-center ">
                                    <div class="col-4 ms-5">
                                        <img class="profile_page_img" src="{{asset('img/'.$data->profile_picture)}}" alt="" />
                                        
                                        <button type="submit" class="btn btn-primary login_button" name="login" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update Profile</button>

                                    </div>
                                    <div class="col-6">
                                        <div class="card profile_card">
                                            <div class="card-body">
                                            
                                                <h4>Name:</h4>
                                                <h4>{{$data->first_name}} {{$data->surname}}</h4>
                                            </div>
                                        </div>
                                        <div class="card profile_card">
                                            <div class="card-body">
                                                <h4>Email:</h4>
                                                <h4>{{$data->email}}</h4>
                                            </div>
                                        </div>
                                        <div class="card profile_card">
                                            <div class="card-body">
                                                <h4>Role:</h4>
                                                <h4>{{$data->category}}</h4>
                                            </div>
                                        </div>
                                        <div class="card profile_card">
                                            <div class="card-body">
                                                <h4>No Of Records Added:</h4>
                                                <h4>{{$numberOfRecords}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 d-none d-md-block">
            <div class="row lastmain d-none d-md-block">
                <div class="col-9 profile_name align-items-center d-flex ">
                    <div>
                        <h4>Role</h4>
                        <h4 class="text-muted">{{$data->category}}</h4>
                    </div>
                    <div class="ms-4 profile_img">
                        <img src="{{asset('img/'.$data->profile_picture)}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('updateprofile')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label for="username">First Name</label>
                    <input class="form-control" id="staffid" name="staffid"   value="{{session('staffid')}}" type="hidden">
                    <input class="form-control" id="username" name="first_name" value="{{$data->first_name}}" placeholder="" type="text">
                    <span class="text-danger">
                        <h6>@error('first_name'){{ $message }} @enderror</h6>
                    </span>
                    <label class="mt-3" for="suraname ">Surname</label>
                    <input class="form-control" id="password" name="surname"   value="{{$data->surname}}" type="text">
                    <span class="text-danger">  <h6>@error('first_name'){{ $message }} @enderror</h6>
                    </span>

                    <label class="mt-3" for="email">Email</label>
                    <input class="form-control" id="email" name="email"   value="{{$data->email}}" type="email">
                    <span class="text-danger">  <h6>@error('first_name'){{ $message }} @enderror</h6>
                    </span>
                    <label class="mt-3" for="password">Password</label>
                    <input class="form-control" id="password" name="password"  placeholder="Enter Password" type="text">
                    
                    <span class="text-danger">
                        <h6>@error('amount'){{ $message }} @enderror</h6>
                    </span>
                    <label class="mt-3" for="file">Upload Image</label>
                    <input class="form-control" id="file" name="file"  type="file">
                    <button type="submit" class="btn btn-primary login_button" name="login" >Update Profile</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Fee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('fees')}}" method="post">
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
<script>
    
    // let number = <?php // echo $number['Amount'] ?>;
    // console.log(number)
</script>
@include('utilityofficer.Includes.footer')