<!-- Nav section container start -->
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid d-flex justify-content-around align-items-center flex-nowrap gap-4">
        <div class="welcome-wrapper d-flex px-3 justify-content-around align-items-center text-center">
            <div class="menu-icon fs-5 px-4">
                <svg class="ham ham2 active" id="sidebar-toggle" viewBox="0 0 100 100" width="80"
                    onclick="this.classList.toggle('active')">
                    <path class="line top"
                        d="m 70,33 h -40 c -6.5909,0 -7.763966,-4.501509 -7.763966,-7.511428 0,-4.721448 3.376452,-9.583771 13.876919,-9.583771 14.786182,0 11.409257,14.896182 9.596449,21.970818 -1.812808,7.074636 -15.709402,12.124381 -15.709402,12.124381" />
                    <path class="line middle" d="m 30,50 h 40" />
                    <path class="line bottom" d="m 70,67 h -40 c -6.5909,0 -7.763966,4.501509 -7.763966,7.511428 0,4.721448 3.376452,9.583771 13.876919,9.583771
    14.786182,0 11.409257,-14.896182 9.596449,-21.970818 -1.812808,-7.074636 -15.709402,-12.124381
    -15.709402,-12.124381" />
                </svg>
            </div>
            <h2 class="fs-5">
                Welcome, <span class="badge bg-success">{{ Auth::user()->username }}</span>
            </h2>
        </div>
        <form id="navbar-search" action="{{ route('search') }}" method="GET"
            class="navbar-form search-form position-relative d-none d-md-block shadow-sm">
            <input id="search_input" value="" class="form-control" placeholder="Search here..." type="text" />
            <button type="button" class="btn btn-secondary">
                <i class="fa fa-search"></i>
            </button>
            <div class="position-absolute w-100 rounded-3 border-1 shadow-sm p-2" id="search-results"
                style="display:none;">
            </div>
        </form>
        <div class="flex-grow-1">
            <ul class="nav navbar-nav flex-row justify-content-end align-items-center">
                <li class="d-none d-sm-block">
                    <a href="app-events.html" class="icon-menu"><i class="fa fa-calendar"></i></a>
                </li>
                <!-- <li class="d-none d-sm-block">
                    <a href="app-chat.html" class="icon-menu"
                      ><i class="fa fa-comments"></i
                    ></a>
                  </li> -->
                <li>
                    <a href="{{ route('Inboxes.index') }}" class="icon-menu"><i class="fa fa-envelope"></i><span
                            class="notification-dot"></span></a>
                </li>
                <li class="dropdown notifications" data-url="{{ route('notifications.index') }}"
                    data-create="{{ route('notifications.edit', Auth::user()->id) }}">
                    <a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="notification-dot"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-0 shadow notification">
                        <ul class="list-unstyled feeds_widget feeds_loader">
                            <li class="skeleton-loader-item w-100"></li>
                            <li class="skeleton-loader-item w-100"></li>
                            <li class="skeleton-loader-item w-100"></li>
                            <li class="skeleton-loader-item w-100"></li>
                            <li class="skeleton-loader-item w-100"></li>
                        </ul>
                    </div>
                </li>
                <!-- more link -->
                <li class="dropdown">
                    <a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fa fa-sliders"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end p-2 shadow">
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-pencil-square-o"></i>
                                <span>Basic</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-sliders fa-rotate-90"></i>
                                <span>Preferences</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-lock"></i>
                                <span>Privacy</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-bell"></i>
                                <span>Notifications</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-credit-card"></i>
                                <span>Payments</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-print"></i>
                                <span>Invoices</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item rounded-pill" href="javascript:void(0);"><i
                                    class="me-2 fa fa-refresh"></i>
                                <span>Renewals</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        class="icon-menu"><i class="fa fa-sign-out"></i></a>
                </li>
                <li title="Right sidebar" class="fs-3 mx-lg-4">
                    <i class="fas fa-bars-staggered"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Nav section container end -->