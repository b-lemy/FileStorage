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

                        @extends('snippets.userProfile')
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
                    <div class="col-12 col-lg-12">
                        <div class="row" style="justify-content: space-around">
                            <div class="col-6 col-lg-3 col-md-6">
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
                                                <h6 class="font-extrabold mb-0">{{ $file->count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
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
                            <div class="col-6 col-lg-3 col-md-6">
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
                                                <h6 class="font-extrabold mb-0">{{ $users->count() }}</h6>
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
                                        <div style="display: flex;
                                         justify-content: space-between;
                                         padding-right: 50px;
                                         padding-left: 50px">
                                            <h4>Recent Files</h4>
                                            <div class="upload" data-bs-toggle="modal" data-bs-target="#fileuploader">
                                                Upload
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">

                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>FileName</th>
                                                <th>Sender</th>
                                                <th>Branch</th>
                                                <th>Department</th>

                                                <th>Access</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($file as $key => $item)
                                                <tr>
                                                    <td class="id">{{ ++$key }}</td>
                                                    <td class="tableStyle">
                                                        <img style="width: auto ; height:20px"
                                                             src="{{ asset('/images/myIcons/file.png') }}"/>
                                                        {{ $item->filename }}</td>
                                                    <td class="tableStyle">{{ $item->sender->firstname }}</td>
                                                    <td class="tableStyle">Head Quarters</td>
                                                    <td class="tableStyle">ICT</td>
                                                    <td class="tableIcons">
                                                        <div><a href="{{url('home/download/'.$item->id)}}">
                                                                <img style="width: auto ; height:20px"
                                                                     src="{{ asset('/images/myIcons/download.png') }}">
                                                            </a>
                                                        </div>
                                                        <div>

                                                            <a href="{{url('home/delete/'.$item->id)}}">
                                                                <img style="width: auto ; height:16px"
                                                                     src="{{ asset('/images/myIcons/delete.png') }}">
                                                            </a>
                                                        </div>
                                                    </td>
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


                    @include('snippets.fileSharing')

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




