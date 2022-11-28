<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="{{ URL::to('assets/css/mystyles.css') }}">
</head>

<body>
<div id="sidebar" class="active sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ URL::to('images/mkcb.png') }}" class=" px-5 max-w-full h-auto w-auto rounded-lg"
                             alt="Logo" srcset="">
                    </a>
                </div>
                {{--                <div> <h4>Mkombozi Bank</h4></div>--}}
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title text-center">Menu</li>
                <li class="sidebar-item {{set_active(['home'])}}">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <div class="card-body">
                        <div class="badges">
                            @if (Auth::user()->role_name=='Admin')
                                <span>Name: <span
                                            class="fw-bolder">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal')
                                <span>Name: <span
                                            class="fw-bolder">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">User</span>
                            @endif
                        </div>
                    </div>
                </li>

                @if (Auth::user()->role_name=='Admin')
                    <li class="sidebar-item  has-sub {{set_active(['userManagement','activity/log','activity/login/logout'])}}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>User Maintenance</span>
                        </a>
                        <ul class="submenu {{set_active(['userManagement','activity/log','activity/login/logout'])}}">
                            <li class="submenu-item {{set_active(['userManagement'])}}">
                                <a href="{{ route('userManagement') }}">User Control</a>
                            </li>
                            <li class="submenu-item {{set_active(['activity/log'])}}">
                                <a href="{{ route('activity/log') }}">Add User</a>
                            </li>
                            <li class="submenu-item {{set_active(['activity/login/logout'])}}">
                                <a href="{{ route('activity/login/logout') }}">Activity Log</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="sidebar-item  has-sub
{{--                {{set_active(['form/staff/new','form/checkbox/new'])}}--}}
                ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Document Levels</span>
                    </a>
                    <ul class="submenu
{{--                    {{set_active(['form/staff/new','form/checkbox/new'])}}--}}
                    ">
                        <li class="submenu-item
{{--                        {{set_active(['form/staff/new'])}}--}}
                        ">
                            <a
{{--                                    href="{{ route('form/staff/new') }}"--}}
                            >OutDoor Docs</a>
                        </li>
                        <li class="submenu-item
{{--                         {{set_active(['form/checkbox/new'])}}--}}
                         ">
                            <a
{{--                                    href="{{ route('form/checkbox/new') }}"--}}
                            >
                                InHouse Docs</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub
{{--                {{set_active(['form/view/detail'])}}--}}
                ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Department Folders</span>
                    </a>
                    <ul class="submenu
{{--                    {{set_active(['form/view/detail'])}}--}}
                    ">
                        <li class="submenu-item
{{--                        {{set_active(['form/view/detail'])}}--}}
                        ">
                            <a
{{--                                    href="{{ route('form/view/detail') }}"--}}
                            >Operation</a>
                        </li>
                        <li class="submenu-item {{set_active(['form/view/details'])}}">
                            <a
{{--                                    href="{{ route('form/view/detail') }}"--}}
                            >ICT</a>
                        </li>
                        <li class="submenu-item
{{--                        {{set_active(['form/view/detailss'])}}--}}
                        ">
                            <a
{{--                                    href="{{ route('form/view/detail') }}"--}}
                            >Treasury</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
</body>
</html>
