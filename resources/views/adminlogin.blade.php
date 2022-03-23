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
            
            <div class="card login_card">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible   fade show py-2 mx-4 text-center" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('LoginError'))
                <div class="alert alert-danger alert-dismissible  fade show py-2 mx-4 text-center" role="alert">
                    {{session('LoginError')}}
                    <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <img src="{{asset('./img/LOGO EIT.PNG')}}" alt="">
                    <h4 class="text-center">ADMIN LOGIN</h4>
                    <form action="{{route('adminLogin')}}" method="post">
                        @csrf
                        <label for="username">Username Or E-mail</label>
                        <input class="form-control" id="username" name="username" placeholder="Enter Your Email or Username" type="text">
                        <span class="text-danger">
                            <h6>@error('username'){{ $message }} @enderror</h6>
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