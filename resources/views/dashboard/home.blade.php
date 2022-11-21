@extends('layouts.master')
@section('menu')
    @extends('sidebar.sidebar')
@endsection
@section('content')
    <div id="main" class="main">
        <div class="min-vh-100">
            <header class="">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading row mb-3">
                <div class="col-12 col-lg-10 col-md-10 col-sm-8"><h3>User Dashboard</h3></div>
                <div class="dropdown col-12 col-lg-2 col-md-2 col-sm-4">
                    <button class="dropbtn">
                        <div class="card-body  d-flex py-2 ">
                            <div class="avatar ">
                                <img class="rounded-full w-4" src="{{ URL::to('/images/'. Auth::user()->avatar) }}"
                                     alt="{{ Auth::user()->avatar }}">
                            </div>
                            <div class="vl"></div>

                            <div class="  pt-1 font-bold name">
                                {{ Auth::user()->firstname }}
                            </div>
                        </div>
                    </button>
                    <div class="dropdown-content">
                        <div data-bs-toggle="modal" data-bs-target="#default">Account</div>
                        <div>
                            <a class="change_password" href="{{ route('change/password') }}">Change Password</a>
                        </div>
                        <div>
                            <form method="GET" action="{{ route('logout') }}">
                                @csrf
                                <button class="butn">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Files</h6>
                                                <h6 class="font-extrabold mb-0">{{ $activity_logs }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Files I shared</h6>
                                                <h6 class="font-extrabold mb-0">{{ $user_activity_logs }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">My Files</h6>
                                                <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Recent Files</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">

                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Branch</th>
                                                <th>Department</th>
                                                <th>To</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($file as $key => $item)
                                                    <tr>
                                                        <td class="id">{{ ++$key }}</td>
                                                        <td class="name">{{ $item->branch }}</td>
                                                        <td class="name">{{ $item->department }}</td>
                                                        <td class="email">{{ $item->To }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Files Overview</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{--                    <div class="col-12 col-xl-4">--}}
                            {{--                        <div class="card">--}}
                            {{--                            <div class="card-header">--}}
                            {{--                                <h4>Profile Visit</h4>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="card-body">--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-6">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <svg class="bi text-primary" width="32" height="32" fill="blue"--}}
                            {{--                                                style="width:10px">--}}
                            {{--                                                <use--}}
                            {{--                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />--}}
                            {{--                                            </svg>--}}
                            {{--                                            <h5 class="mb-0 ms-3">Europe</h5>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-6">--}}
                            {{--                                        <h5 class="mb-0">862</h5>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-12">--}}
                            {{--                                        <div id="chart-europe"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-6">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <svg class="bi text-success" width="32" height="32" fill="blue"--}}
                            {{--                                                style="width:10px">--}}
                            {{--                                                <use--}}
                            {{--                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />--}}
                            {{--                                            </svg>--}}
                            {{--                                            <h5 class="mb-0 ms-3">America</h5>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-6">--}}
                            {{--                                        <h5 class="mb-0">375</h5>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-12">--}}
                            {{--                                        <div id="chart-america"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-6">--}}
                            {{--                                        <div class="d-flex align-items-center">--}}
                            {{--                                            <svg class="bi text-danger" width="32" height="32" fill="blue"--}}
                            {{--                                                style="width:10px">--}}
                            {{--                                                <use--}}
                            {{--                                                    xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />--}}
                            {{--                                            </svg>--}}
                            {{--                                            <h5 class="mb-0 ms-3">Indonesia</h5>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-6">--}}
                            {{--                                        <h5 class="mb-0">1025</h5>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="col-12">--}}
                            {{--                                        <div id="chart-indonesia"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                            {{--                    <div class="col-12 col-xl-8">--}}
                            {{--                        <div class="card">--}}
                            {{--                            <div class="card-header">--}}
                            {{--                                <h4>Latest Comments</h4>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="card-body">--}}
                            {{--                                <div class="table-responsive">--}}
                            {{--                                    <table class="table table-hover table-lg">--}}
                            {{--                                        <thead>--}}
                            {{--                                            <tr>--}}
                            {{--                                                <th>Name</th>--}}
                            {{--                                                <th>Comment</th>--}}
                            {{--                                            </tr>--}}
                            {{--                                        </thead>--}}
                            {{--                                        <tbody>--}}
                            {{--                                            <tr>--}}
                            {{--                                                <td class="col-3">--}}
                            {{--                                                    <div class="d-flex align-items-center">--}}
                            {{--                                                        <div class="avatar avatar-md">--}}
                            {{--                                                            <img src="assets/images/faces/5.jpg">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <p class="font-bold ms-3 mb-0">Si Cantik</p>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </td>--}}
                            {{--                                                <td class="col-auto">--}}
                            {{--                                                    <p class=" mb-0">Congratulations on your graduation!</p>--}}
                            {{--                                                </td>--}}
                            {{--                                            </tr>--}}
                            {{--                                            <tr>--}}
                            {{--                                                <td class="col-3">--}}
                            {{--                                                    <div class="d-flex align-items-center">--}}
                            {{--                                                        <div class="avatar avatar-md">--}}
                            {{--                                                            <img src="assets/images/faces/2.jpg">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <p class="font-bold ms-3 mb-0">Si Ganteng</p>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </td>--}}
                            {{--                                                <td class="col-auto">--}}
                            {{--                                                    <p class=" mb-0">Wow amazing design! Can you make another--}}
                            {{--                                                        tutorial for--}}
                            {{--                                                        this design?</p>--}}
                            {{--                                                </td>--}}
                            {{--                                            </tr>--}}
                            {{--                                        </tbody>--}}
                            {{--                                    </table>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}
                            {{--                    </div>--}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">

                        <div class="card">
                            <div class="card-header">
                                <h4>Share a File</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <form class="flex items-center space-x-6" method="POST"
                                          enctype="multipart/form-data" action="{{ route('file') }}">
                                        @csrf
                                        <label class="block mb-5">
                                            <span class="sr-only">Choose a file/folder</span>
                                            <input type="file" name="file" id="file" class="uploadBox block
                                             w-full text-sm text-slate-50 file:mr-4 file:py-2 file:px-4

                                          "/>

                                        </label>
                                        <label class="block mb-5">
                                            <span class="sr-only">Choose a Branch :</span>
                                            <input type="text" name="name"
                                                   class="  my_input"
                                                   required/>

                                        </label>
                                        <label class="block mb-5">
                                            <span class="sr-only">Choose a Department :</span>
                                            <input type="text" name="name"
                                                   class=" my_input"/>

                                        </label>
                                        <label class="block mb-5">
                                            <span class="sr-only">Choose a Name :</span>
                                            <input type="text" name="name"
                                                   class=" my_input"/>

                                        </label>
                                        <div class="px-5">
                                            <button class='btn btn-block btn-success font-bold mt-5'>Share</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            {{--                    <div class="card-header">--}}
                            {{--                        <h4>Visitors Profile</h4>--}}
                            {{--                    </div>--}}
                            {{--                    <div class="card-body">--}}
                            {{--                        <div id="chart-visitors-profile"></div>--}}
                            {{--                    </div>--}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2022 &copy; Lema Brian</p>
                </div>

            </div>
        </footer>
    </div>



@endsection



{{-- user profile modal --}}
<div class="card-body my-0">
    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Full Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="fullName"
                                               value="{{ Auth::user()->name }}" readonly>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Email Address</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" class="form-control" name="email"
                                               value="{{ Auth::user()->email }}" readonly>
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Mobile Number</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="number" class="form-control"
                                               value="{{ Auth::user()->phone_number }}" readonly>
                                        <div class="form-control-icon">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Status</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="{{ Auth::user()->status }}"
                                               readonly>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bag-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>Role Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" value="{{ Auth::user()->role_name }}"
                                               readonly>
                                        <div class="form-control-icon">
                                            <i class="bi bi-exclude"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end user profile modal --}}

