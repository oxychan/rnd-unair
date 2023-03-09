<div class="app-container container-fluid d-flex align-items-stretch justify-content-between">
    <!--begin::sidebar mobile toggle-->
    <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
    </div>
    <!--end::sidebar mobile toggle-->

    <!--begin::Mobile logo-->
    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
        <a href="index.blade.php" class="d-lg-none">
            <img alt="Logo" src="{{ asset('assets/media/logos/default-small.svg') }}" class="h-30px" />
        </a>
    </div>
    <!--end::Mobile logo-->

    <!--begin::Header wrapper-->
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
        <!--begin::Menu wrapper-->
        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
            data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">

        </div>
        <!--end::Menu wrapper-->
        <!--begin::Navbar-->
        <div class="app-navbar flex-shrink-0">
            <!--begin::User menu-->
            <div class="app-navbar-item ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                <!--begin::Menu wrapper-->
                <div class="dropdown" id="navbar-list-4">
                    <a class="cursor-pointer symbol symbol-35px symbol-md-40px" href="#"
                        id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <img src="{{ asset('assets/media/img/profile/' . Auth::user()->foto) }}" alt="user">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item symbol-label font-size-sm text-dark p-4"
                            href="#">{{ Auth::user()->name }}</a>
                        <a href="#"
                            class="dropdown-item fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->username }}</a>
                        <a href="#"
                            class="dropdown-item fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                        <div class="separator my-2"></div>
                        <a href="#" class="dropdown-item px-5">My Profile</a>
                        <a href="#" class="dropdown-item px-5">Change Password</a>
                        <form action="{{ route('auth.logout') }}" method="POST" id="logout-form">
                            @csrf
                            <a onclick="logout()" class="cursor-pointer dropdown-item px-5">Sign Out</a>
                        </form>
                    </div>
                </div>
            </div>
            <!--end::User menu-->
            <!--begin::Header menu toggle-->
            <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                fill="currentColor" />
                            <path opacity="0.3"
                                d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <!--end::Header menu toggle-->
        </div>
        <!--end::Navbar-->
    </div>
    <!--end::Header wrapper-->
</div>

<script>
    function logout() {
        document.getElementById("logout-form").submit();
    }
</script>
