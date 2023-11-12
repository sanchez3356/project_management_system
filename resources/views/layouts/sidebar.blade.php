        <!-- Sidebar section container start -->
        <aside id="left-sidebar" class="sidebar">
            <div class="logo-wrapper p-3 mb-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('storage/images/coollogo_com-294982707.png') }}" alt="Website logo image"
                        class="img-fluid" />
                </a>
            </div>
            <ul class="list-unstyled metismenu main-menu">
                <li>
                    <a href="{{ url('/home') }}"><i class="fas fa-gauge-high"></i><span>Dashboard</span></a>
                </li>
                <li class="">
                    <a href="#" class="has-arrow" aria-expanded="false"><i
                            class="fas fa-briefcase"></i><span>Projects</span></a>
                    <ul class="list-unstyled mm-collapse">
                        @if (Route::has('projects.create'))
                        <li><a href="{{ route('projects.create') }}">Add Projects</a></li>
                        @endif
                        @if (Route::has('projects.index'))
                        <li><a href="{{ route('projects.index') }}">Projects List</a></li>
                        @endif
                        @if (Route::has('projects.grid'))
                        <li><a href="{{ route('projects.grid') }}">Projects Grid</a></li>
                        @endif
                        @if (Route::has('projects.details'))
                        <!-- <li><a href="{{ route('projects.details') }}">Projects Detail</a></li> -->
                        @endif
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="has-arrow" aria-expanded="false"><i
                            class="fas fa-user"></i><span>Clients</span></a>
                    <ul class="list-unstyled mm-collapse">
                        @if (Route::has('clients.create'))
                        <li><a href="{{ route('clients.create') }}">Add Clients</a></li>
                        @endif
                        @if (Route::has('clients.index'))
                        <li><a href="{{ route('clients.index') }}">Clients List</a></li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="{{ route('tasks.index') }}"><i class="fa fa-calendar"></i><span>Schedule</span></a>
                </li>
                <li>
                    <a href="{{ route('finances.index') }}"><i class="fas fa-gauge-high"></i><span>Finance</span></a>
                </li>
                <li>
                    <a href="{{ route('Inboxes.index') }}"><i class="fa fa-comments"></i><span>Messages</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sliders"></i><span>Settings</span></a>
                </li>
                <li>
                    @if (Route::has('logout'))
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="fa fa-sign-out"></i><span>Log out</span></a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endif
            </ul>
            <hr class="dropdown-divider w-75 m-auto d-block" />
            <div class="d-flex align-items-center py-4 px-2 justify-content-center dropdown">
                <div class="icon me-3">
                    <img width="70px" height="55px"
                        src="{{asset('storage/' . Auth::user()->avatar) ?: asset('storage/avatars/male.png') }}"
                        class="rounded-circle img-fluid profilePreview"
                        alt="{{ Auth::user()->username }}'s user avatar" />
                </div>
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <h6 class=" mb-1 text-capitalize">{{ Auth::user()->username }}</h6>
                    <div class="text-muted">UI UX Desiger</div>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @if (Route::has('profiles.index'))
                        <li><a class="dropdown-item" href="{{ route('profiles.index') }}">Profile</a></li>
                        @endif
                        <li><a class="dropdown-item" href="#">Preferences</a></li>
                        <li><a class="dropdown-item" href="{{ route('profiles.create') }}">Users</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">logout</a></li>
                    </ul>
                </a>
            </div>
        </aside>
        <!-- Sidebar section container end -->