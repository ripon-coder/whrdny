<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light admin-topbar navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header admin-topbar">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item w-100"><a class="navbar-brand d-flex align-items-center" href="{{ route("admin.dashboard") }}">
                        @if (!empty($g_setting->logo))
                            <img class="brand-logo" style="width: 123px; margin-left: 42px; margin-bottom:18px"
                                src="{{ asset('dynamic-assets/logo/' . $g_setting->logo) }}"
                                alt="Branding logo">
                        @else
                            <p class="m-0" style="font-size: 35px;
                        font-weight: bold;">{{env('APP_NAME')}}
                            </p>
                        @endif

                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content ml-0 d-flex">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown"><span
                                class="mr-1 user-name text-bold-700">{{ auth()->user()->name }}</span><span
                                class="avatar avatar-online">
                                <img src="{{ auth()->user()->image ? asset('dynamic-assets/admin-avatar/' . auth()->user()->image) : asset('admin/app-assets/images/portrait/small/default-avatar.webp') }}"
                                    alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right admin-bg">
                            
                            <a class="dropdown-item text-white"
                                href="{{route('admin.profile')}}"><i class="ft-user"></i> Edit Profile</a>

                            <a class="dropdown-item text-white" href="{{route('admin.changePasswordPage')}}"><i class="la la-key"></i>Change
                                Password</a>

                            <div class="dropdown-divider"></div><a class="dropdown-item text-white" href="#"
                                onclick="event.preventDefault();
                            document.getElementById('admin-logout-form').submit();"><i
                                    class="ft-power"></i> Logout</a>
                        </div>
                        <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
