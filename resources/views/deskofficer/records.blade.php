@include('deskofficer.Includes.header')

<div class="container-fluid">
    <div class="row">
        @include('deskofficer.Includes.navbar')

        <div class="col-md-8">
            <!--============ MAIN SECTION================= -->
            <div class="container-fluid main">
                <h3 class="welcome">DESK OFFICER'S RECORD</h3>
                <div class="row gap-6 mt-5">
                    <div class="col-md-8">
                        <input class="form-control" type="date" name="" id="" />
                    </div>
                    <!-- <div class="col-md-2 justify-content-end">
                        <a class="btn btn-primary addbutton" href="">
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

                                <table class="table table-responsive">
                                    <thead>
                                        <tr>

                                            <th scope="col"></th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($records as $record)
                                        <tr>

                                            <td><span class="material-icons-sharp table_icon_1">
                                                    receipt_long
                                                </span></td>
                                            <td>{{$record->first_name}}</td>
                                            <td>{{$record->surname}}</td>
                                            <td>{{$record->date}}</td>
                                            <td><span class="material-icons-sharp text-muted  table_icon">
                                                    visibility
                                                </span></td>
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


@include('deskofficer.Includes.footer')