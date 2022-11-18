
<div id="sidebar" class="active sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex">
                <div  class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ URL::to('images/mkcb.png') }}" class=" px-5 max-w-full h-auto w-auto rounded-lg" alt="Logo" srcset="">
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
                            <span>Name: <span class="fw-bolder">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></span>
                            <hr>
                            <span>Role Name:</span>
                            <span class="badge bg-success">Admin</span>
                            @endif
                            @if (Auth::user()->role_name=='Normal User')
                                <span>Name: <span class="fw-bolder">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></span>
                                <hr>
                                <span>Role Name:</span>
                                <span class="badge bg-warning">User</span>
                            @endif
                        </div>
                    </div>
                </li>

                @if (Auth::user()->role_name=='Admin')
                    <li class="sidebar-title">Page</li>
                    <li class="sidebar-item  has-sub {{set_active(['userManagement','activity/log','activity/login/logout'])}}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hexagon-fill"></i>
                            <span>Maintain</span>
                        </a>
                        <ul class="submenu {{set_active(['userManagement','activity/log','activity/login/logout'])}}">
                            <li class="submenu-item {{set_active(['userManagement'])}}">
                                <a href="{{ route('userManagement') }}">User Control</a>
                            </li>
                            <li class="submenu-item {{set_active(['activity/log'])}}">
                                <a href="{{ route('activity/log') }}">User Activity Log</a>
                            </li>
                            <li class="submenu-item {{set_active(['activity/login/logout'])}}">
                                <a href="{{ route('activity/login/logout') }}">Activity Log</a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="sidebar-title">Forms &amp; Tables</li>
                <li class="sidebar-item  has-sub {{set_active(['form/staff/new','form/checkbox/new'])}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu {{set_active(['form/staff/new','form/checkbox/new'])}}">
                        <li class="submenu-item {{set_active(['form/staff/new'])}}">
                            <a href="{{ route('form/staff/new') }}">Form Input</a>
                        </li>
                         <li class="submenu-item {{set_active(['form/checkbox/new'])}}">
                            <a href="{{ route('form/checkbox/new') }}">Form Checkbox</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub {{set_active(['form/view/detail'])}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>View Record</span>
                    </a>
                    <ul class="submenu {{set_active(['form/view/detail'])}}">
                        <li class="submenu-item {{set_active(['form/view/detail'])}}">
                            <a href="{{ route('form/view/detail') }}">View Detail</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('lock_screen') }}" class='sidebar-link'>
                        <i class="bi bi-lock-fill"></i>
                        <span>Lock Screen</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
