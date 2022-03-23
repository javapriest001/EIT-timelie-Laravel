@include('Includes.header')

<div class="container-fluid login_body">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4"></div>
        <div class="col-4 ">

        </div>
    </div>
    <div class="row ">
        <div class="col-6 d-none d-md-block align-items-center login_img"><img src="{{asset('./img/4957136-removebg-preview.png')}}" alt=""></div>
        <div class="col-4">
            
            <div class="card register_card">
               @if(session('error'))
                <div class="alert alert-danger alert-dismissible   fade show py-2 mx-4 text-center" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <!-- <img src="{{asset('./img/LOGO EIT.PNG')}}" alt=""> -->
                    <h4 class="text-center">ADD USER</h4>
                    <form action="{{route('newstaff')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="username">First Name</label>
                        <input class="form-control" id="email" name="firstname" placeholder="Enter Your First name" type="text">
                        <span class="text-danger">
                            <h6>@error('email'){{ $message }} @enderror</h6>
                        </span>
                        <label for="Surname">Surname</label>
                        <input class="form-control" id="Surname" name="surname" placeholder="Enter Your Surname" type="text">
                        <span class="text-danger">
                            <h6>@error('email'){{ $message }} @enderror</h6>
                        </span>
                        <label for="username">E-mail</label>
                        <input class="form-control" id="email" name="email" placeholder="Enter Your Email" type="text">
                        <span class="text-danger">
                            <h6>@error('email'){{ $message }} @enderror</h6>
                        </span>
                        <label for="role">Role</label>
                        <select class="form-control" placeholder="Select User Role" name="role" id="">
                            <option value="deskofficer">Desk Officer</option>
                            <option value="accountant">Accountant</option>
                            <option value="deskofficer">Utility Officer</option>
                        </select>
                        
                        <span class="text-danger">
                            <h6>@error('email'){{ $message }} @enderror</h6>
                        </span>
                        <label class="mt-3" for="password">Password</label>
                        <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password">
                        <span class="text-danger">
                            <h6>@error('password'){{ $message }} @enderror</h6>
                        </span>
                        <button type="submit" class="btn btn-primary login_button" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Includes.footer')