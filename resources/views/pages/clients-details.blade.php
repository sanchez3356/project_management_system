@extends('layouts.app')


@section('content')

<!-- clients details section start -->
<div class="row g-2">
    <div class="col-lg-12 col-md-12">
        <div class="card client-detail">
            <div class="card-body">
                <div class="d-flex">
                    <div class="profile-image">
                        <img width="200px" height="auto"
                            src="{{asset('storage/' . $client->avatar) ?: asset('storage/avatars/male.png') }}"
                            alt="{{ $client->username }}'s avatar image">
                    </div>
                    <div class="details ms-3">
                        <h4 class="h5 text-primary text-uppercase"><strong>@empty($user->profile->first_name) John @else
                                {{ $user->profile->first_name }}@endempty</strong>
                            @empty($user->profile->last_name) Doe @else {{ $user->profile->last_name }} @endempty <span
                                class="h6 text-secondary">@empty($user->profile->cjob_title) No job title available
                                @else
                                {{ $user->profile->job_title }} @endempty</span>
                        </h4>
                        <p>@empty($user->profile->address) No address provided @else {{ $user->profile->address }}
                            @endempty
                        </p>
                        <p>{{profile_progress($client)}}</p>
                        <p class="social-icon">
                            <a title="Twitter" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                            <a title="Facebook" href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                            <a title="Google-plus" href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
                            <a title="Behance" href="javascript:void(0);"><i class="fa fa-behance"></i></a>
                            <a title="Instagram" href="javascript:void(0);"><i class="fa fa-instagram "></i></a>
                        </p>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-primary"> <a class="link-light"
                                    href="{{ route('clients.edit', $client->id) }}">Edit
                                    Profile</a>
                            </button>
                            <button class="btn btn-sm btn-success">Message</button>
                        </div>
                    </div>
                    <div class="profile-progress ms-auto">
                        <div id="profileCircle" data-progress="{{profile_progress($client)}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($projects as $project)
    @php
    $progress = project_progress($project);
    @endphp
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">DS - Design Team</h6>
                <small>Ranking 2th</small>
                <ul class="header-dropdown">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                            aria-expanded="false"></a>
                        <ul class="dropdown-menu dropstart list-unstyled">
                            <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Another Action</a></li>
                            <li><a class="dropdown-item" href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <h6 class="mb-3">{{ $project->project_title }} <span
                        class="badge bg-success float-end">{{ $project->priority }}</span>
                </h6>
                <p>{{ $project->details }}</p>
                <div class="progress mb-3" style="height: {{ $progress }}px;">
                    <div class="progress-bar bg-primary" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}"
                        aria-valuemin="0" aria-valuemax="100">{{ $progress }}</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <small>Days left: {{ $project->end_date }}</small>
                        <h6>BUDGET: {{ $project->rate }} USD</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- clients details section end -->

@endsection