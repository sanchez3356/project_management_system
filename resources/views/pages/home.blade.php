@extends('layouts.app')



@section('content')
<!--  Home section content start  -->
<div class="row g-3 mb-2">
    <div class="col-12">
        <div id="search-results"></div>
    </div>
    <div class="col-12">
        <!-- Slider container -->
        <div class="swiper-container p-3 position-relative overflow-hidden">
            <div class="project-add" data-bs-toggle="modal" data-bs-target="#projectsAdd"><i class="fas fa-plus"></i>
            </div>
            <div class="swiper-wrapper potion-relative pb-4">
                @if (count($projects) === 0)
                <div class="text-center p-4 text-danger bg-white">No Projects available ...</div>
                @else
                @foreach($projects as $key => $project)
                @php
                $bgChartClass = 'bg-chart' . (($key % 15) + 1);
                $progress = project_progress($project);
                @endphp
                <div class="swiper-slide tt-white p-4 {{ $bgChartClass }} card text-white">
                    <div class="card-header d-flex justify-content-between my-2 align-items-center">
                        <b class="card-title">{{ $project->start_date }}</b>
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-vertical dropdown-toggle" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu dropdown-menu-end dropstart dropdown-menu-dark"
                                aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="#">Action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-title text-apitalize text-center my-4">
                        <h2 class="fs-2">{{ $project->project_title }}</h2>
                    </div>
                    <div class="card-progress w-00 position-relative">
                        <div class="py-2 d-flex justify-content-between">
                            <div class="label-in-progress">In Progress</div>
                            <div class="label-pecentage">{{ $progress }}%</div>
                        </div>
                        <div class="progress">
                            <div class="progressbar" role="progressbar" style="width: {{ $progress }}%"
                                aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="card-foot d-flex justify-content-between align-items-center mb-3 mt-5 d-none">
                        <ul class="list-unstyled team-info mb-0 d-flex">
                            <li>
                                <img src="{{ asset('storage/app/' . $project->project_image ) }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" alt="Avatar" aria-label="Chris Fox"
                                    data-bs-original-title="Chris Fox" />
                            </li>
                            <li>
                                <img src="{{ asset('images//avatars/avatar5.jpg') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" alt="Avatar" aria-label="oge Lucky"
                                    data-bs-original-title="Joge Lucky" />
                            </li>
                            <li>
                                <img src="{{ asset('images/avatars/avatar2.jpg') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" alt="Avatar" aria-label="Folisise Chosielie"
                                    data-bs-original-title="Folisise Chosielie" />
                            </li>
                            <li>
                                <img src="{{ asset('images/avatars/avatar1.jpg') }}" data-bs-toggle="tooltip"
                                    data-bs-placement="top" alt="Avatar" aria-label="Joge Lucky"
                                    data-bs-original-title="Joge Lucky" />
                            </li>
                        </ul>
                        <button type="button" class="btn btn-light btn-sm">
                            @php
                            $startDate = \Carbon\Carbon::parse($project->start_date);
                            $endDate = \Carbon\Carbon::parse($project->end_date);
                            $daysLeft = $startDate->diffInDays($endDate);
                            @endphp
                            {{ $daysLeft }} days left
                        </button>
                    </div>
                    <div class="card-foot d-flex justify-content-between align-items-center mb-3 mt-5">
                        <button class="btn btn-sm btn-primary">
                            <a class="link-light" href="{{ route('projects.show', $project->id) }}">Details</a>
                        </button>
                        <button class="btn btn-sm btn-success"><a class="link-light"
                                href="{{ route('projects.edit', $project->id) }}"> Edit</a>
                        </button>
                        <button type="button" class="btn btn-light btn-sm">
                            @php
                            $startDate = \Carbon\Carbon::parse($project->start_date);
                            $endDate = \Carbon\Carbon::parse($project->end_date);
                            $daysLeft = $startDate->diffInDays($endDate);
                            @endphp
                            {{ $daysLeft }} days left
                        </button>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Slider Container -->
    <div class="col-lg-8 col-md-12">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between my-2 bg-transparent border-0">
                <h6 class="card-title fw-bolder">Your satistics</h6>
                <div class="dropdown">
                    <i class="fas fa-ellipsis-vertical dropdown-toggle" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu dropdown-menu-end dropstart dropdown-menu-dark"
                        aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="{{ route('finances.index') }}">Finances</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addAccount">Create
                                Account</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#addTransaction">New
                                transaction</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div id="projectProgressChart" data-url="{{ route('records.project') }}"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between my-2 bg-transparent border-0">
                <h6 class="card-title fw-bolder">Weekly progress</h6>
                <div class="dropdown">
                    <i class="fas fa-ellipsis-vertical dropdown-toggle" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu dropdown-menu-end dropstart dropdown-menu-dark"
                        aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div id="progressCircle"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <ul class="list-group list-group-custom list-group-flush list-group-custom">
                <li class="list-group-item">
                    <a href="app-inbox.html" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-envelope text-muted me-2"></i>Inbox
                        </p>
                        <span class="badge bg-success">{{ $inboxCount }}</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-eye text-muted me-2"></i>Profile
                            visits
                        </p>
                        <span class="badge bg-info">364</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-phone text-muted me-2"></i>Call
                        </p>
                        <span class="badge bg-warning">12</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fas fa-comments text-muted me-2"></i>Messages
                        </p>
                        <span class="badge bg-danger">{{ $inboxCount }}</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-bookmark text-muted me-2"></i>Bookmarks
                        </p>
                        <span class="badge bg-warning">19</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-bell text-muted me-2"></i>Notifications
                        </p>
                        <span class="badge bg-info">56</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-tag text-muted me-2"></i>New Project
                        </p>
                        <span class="badge bg-info">8</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-clock-o text-muted me-2"></i>Watch
                        </p>
                        <span class="badge bg-info">25</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <ul class="list-group list-group-custom list-group-flush list-group-custom">
                <li class="list-group-item">
                    <a href="app-inbox.html" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-envelope text-muted me-2"></i>Inbox
                        </p>
                        <span class="badge bg-success">695</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-eye text-muted me-2"></i>Profile
                            visits
                        </p>
                        <span class="badge bg-info">364</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-phone text-muted me-2"></i>Call
                        </p>
                        <span class="badge bg-warning">12</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fas fa-comments text-muted me-2"></i>Messages
                        </p>
                        <span class="badge bg-danger">54</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-bookmark text-muted me-2"></i>Bookmarks
                        </p>
                        <span class="badge bg-warning">19</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-bell text-muted me-2"></i>Notifications
                        </p>
                        <span class="badge bg-info">56</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-tag text-muted me-2"></i>New Project
                        </p>
                        <span class="badge bg-info">8</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="javascript:void(0);" class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <i class="fa fa-clock-o text-muted me-2"></i>Watch
                        </p>
                        <span class="badge bg-info">25</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- To do list section  -->
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">ToDo List</h6>
                <small>This Month task list</small>
            </div>
            <div class="card-body todo_list">
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Report" />
                        <label class="form-check-label" for="Report"><i class="fa fa-calendar me-2"></i>Report
                            Panel
                            Usag</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="logo" checked="" />
                        <label class="form-check-label" for="logo"><i class="fa fa-bell me-2"></i>New logo
                            design</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="PSD" />
                        <label class="form-check-label" for="PSD"><i class="fa fa-file me-2"></i>Design PSD
                            files</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Deploy" />
                        <label class="form-check-label" for="Deploy"><i class="fa fa-file me-2"></i>Deploy
                            existing
                            code</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="Panel" checked="" />
                        <label class="form-check-label" for="Panel"><i class="fa fa-calendar me-2"></i>Report
                            Panel
                            Usag</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- To do list section  -->
    <!-- Projects list section  -->
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center border-0 bg-transparent p-3">
                <h6 class="card-title">Project List</h6>
                <div class="dropdown header-dropdown">
                    <i class="fas fa-ellipsis-vertical dropdown-toggle" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu dropdown-menu-end dropstart dropdown-menu-dark"
                        aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#projectsAdd">Add
                                Project</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{ route('projects.index') }}">Projects list</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('projects.grid') }}">Projects grid</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <table id="pro_list" class="table table-hover dataTable no-footer dt-inline collapsed mb-0">
                    <thead class="">
                        <th>Project</th>
                        <th>Deadline</th>
                        <th>Progress</th>
                        <th>Client</th>
                        <th>Rate</th>
                        <th>Priority</th>
                        <th class="dt-hidden" style="width: 0px; display: none">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @php
                        $rowClass = 'even';
                        @endphp
                        @foreach($projects as $project)
                        @php
                        $progress = project_progress($project);
                        @endphp
                        <tr class="{{ $rowClass }}">
                            <td class="project-title dt-control ps-4 text-start">
                                <h6 class="fs-6 mb-0">{{ $project->project_title }}</h6>
                                <small>Created {{ formatMyDate($project->start_date) }}</small>
                            </td>
                            <td>{{ formatMyDate($project->end) }}</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                        aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{ $progress }}%">
                                    </div>
                                </div>
                                <small>Completion with: {{ $progress }}%</small>
                            </td>
                            <td>
                                <img class="avatar rounded" src="./avatar2.jpg" data-bs-toggle="tooltip"
                                    data-bs-placement="left" alt="Avatar" aria-label="Team Lead"
                                    data-bs-original-title="Team Lead" />
                            </td>
                            <td>{{ $project->rate }} </td>
                            <td><span class="badge bg-success">{{ $project->priority }}</span></td>
                            <td class="project-actions dt-hidden" style="display: none">
                                <a href="{{ route('projects.show', $project->id) }}"
                                    class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="btn btn-sm btn-outline-success"><i class="fa fa-pencil"></i></a>
                                <button data-route="{{ route('projects.destroy', $project->id) }}"
                                    data-id="{{ $project->id }}" class="btn btn-sm btn-outline-danger delete-item"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @php
                        $rowClass = ($rowClass === 'even') ? 'odd' : 'even';
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="row g-2 row-deck">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Income Analysis</h6>
                        <small>8% High then last month</small>
                    </div>
                    <div class="card-body text-center">
                        <div id="income_analysis"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Sales Income</h6>
                    </div>
                    <div class="card-body">
                        <h6>
                            Overall <strong class="text-success">7,000</strong>
                        </h6>
                        <div id="sales_income"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Home section content end  -->

@endsection