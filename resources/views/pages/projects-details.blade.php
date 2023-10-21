@extends('layouts.app')

@section('content')

<!-- Projects details section start  -->
<div class="row g-2">
    <div class="col-lg-4 col-md-12">
        @if(isset($project) && !empty($project))
        <div class="card mb-2">
            <div class="card-body">
                <h6 class="card-title mb-4">
                    {{ $project->project_title }}
                </h6>
                <p>{{ Illuminate\Support\Str::limit($project->project_description, 300) }}</p>
                <div class="progress-container progress-info">
                    <span class="progress-badge">Project Status</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                            aria-valuemax="100" style="width: {{ $progress }}%">
                            <span class="progress-value">{{ $progress }} %</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <ul class="list-unstyled basic-list mb-0">
                    <li class="d-flex justify-content-between mb-3">
                        Cost:<span class="badge bg-primary">${{ $project->rate }}</span>
                    </li>
                    <li class="d-flex justify-content-between mb-3">
                        Created:<span class="bg-success badge">{{ formatMyDate($project->start_date) }}</span>
                    </li>
                    <li class="d-flex justify-content-between mb-3">
                        Deadline:<span class="bg-info badge">{{ formatMyDate($project->end_date) }}</span>
                    </li>
                    <li class="d-flex justify-content-between mb-3">
                        Priority:<span class="bg-danger badge">{{ $project->priority }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        Status<span class="bg-info badge">{{ $project->status }}</span>
                    </li>
                </ul>
            </div>
        </div>
        @else
        <div class="text-center">Project unavailable</div>
        @endif
        <div class="card mb-2 d-none">
            <div class="card-header">
                <h6 class="card-title">Assigned Team</h6>
            </div>
            <div class="card-body">
                <div class="w_user d-flex align-items-start">
                    <img class="rounded-circle" src="./avatar4.jpg" width="72" alt="" />
                    <div class="wid-u-info ms-3">
                        <h5 class="mb-0">Fidel Tonn</h5>
                        <span>info@thememakker.com</span>
                        <p class="text-muted mb-0">Project Lead</p>
                    </div>
                </div>
                <hr />
                <ul class="right_chat list-unstyled mb-0">
                    <li class="offline">
                        <a class="d-flex mb-3" href="javascript:void(0);">
                            <img class="rounded-circle" src="./avatar2.jpg" width="45" height="45" alt="" />
                            <div class="ms-3 w-100 text-muted">
                                <span class="name d-block">Isabella
                                    <small class="float-end">15 Min ago</small></span>
                                <span class="message">Contrary to popular belief, Lorem Ipsum is not
                                    simply random text</span>
                                <span class="status"></span>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a class="d-flex mb-3" href="javascript:void(0);">
                            <img class="rounded-circle" src="./avatar1.jpg" width="45" height="45" alt="" />
                            <div class="ms-3 w-100 text-muted">
                                <span class="name d-block">Folisise Chosielie
                                    <small class="float-end">1 hours ago</small></span>
                                <span class="message">There are many variations of passages of Lorem
                                    Ipsum available, but the majority</span>
                                <span class="status"></span>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a class="d-flex mb-3" href="javascript:void(0);">
                            <img class="rounded-circle" src="./avatar3.jpg" width="45" height="45" alt="" />
                            <div class="ms-3 w-100 text-muted">
                                <span class="name d-block">Alexander
                                    <small class="float-end">1 day ago</small></span>
                                <span class="message">It is a long established fact that a reader will
                                    be distracted</span>
                                <span class="status"></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-header">
                <h6 class="card-title">About Clients</h6>
            </div>
            <div class="card-body text-center">
                @if(isset($client) && !empty($client))
                <div class="profile-image mb-3">
                    <img src="{{asset('storage/' . $client->avatar) ?: asset('storage/avatars/female.png') }}"
                        class="rounded-circle" alt="{{ $client->username }}'s avatar image" />
                </div>
                <div>
                    <h4><strong>{{ $client->username }}</strong></h4>
                    <span>{{ $client->title }}</span>
                </div>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary"><a class="link-light"
                            href="{{ route('clients.show', $project->client_id) }}">Profile</a></button>
                    <button class="btn btn-outline-secondary">Message</button>
                </div>
                @else
                <div class="text-center">Client unavailable</div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card mb-2">
            <div class="card-header">
                <h6 class="card-title">Project Activity</h6>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                @if(isset($project->phases) && !empty($project->phases))
                <ul class="list-unstyled metismenu projects-menu">
                    @foreach($project->phases as $phase)
                    <li class="" id="phase-{{ $phase->id }}">
                        <a href="#" class="has-arrow" aria-expanded="false"><span
                                class="date badge bg-success me-2">{{ formatMyDate($phase->start_date) }}</span><span>{{ $phase->phase }}
                            </span><span class="date badge bg-warning ms-2">{{ $phase->status }}</span></a>
                        <ul class="list-unstyled mm-collapse">
                            @foreach ($phase->tasks as $task)
                            <li data-task-id="{{ $task->id }}">
                                {{ $task->task }}
                                <span class="date badge">{{ when($task->deadline) }}</span>
                                (Order: {{ $task->order }})
                                (Deadline: {{ formatMyDate($task->deadline) }})
                                <span class="float-end"><input class="form-check-input me-2" type="checkbox"
                                        id="{{ $task->id }}"></span>
                            </li>
                            @endforeach
                            <button type="button" data-id="{{ $phase->id }}"
                                class="task-add btn btn-primary btn-sm float-end my-2 me-5">Add new task</button>
                            <button type="button" data-id="{{ $phase->id }}"
                                class="task-delete btn btn-danger btn-sm float-end my-2 me-5" disabled>Delete</button>
                        </ul>
                    </li>
                    @endforeach
                    <li style="border-style:dashed">
                        <a href="#" class="has-arrow text-center" aria-expanded="false"><i
                                class="fas fa-plus me-2"></i><b>Add New
                                Phase</b></a>
                        <ul class="list-unstyled mm-collapse">
                            @if (Route::has('phases.store'))
                            <form id="phase_form" class="card-body" action="{{ route('phases.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div class="mb-3">
                                    <textarea rows="2" name="phase" id="phase" class="form-control no-resize"
                                        placeholder="Please type what you want..."></textarea>
                                    <div class="text-danger" id="phase-error"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-daterange input-group d-flex justify-content-around align-items-center"
                                        data-provide="datepicker">
                                        <label class="form-label me-2 mb-0">From</label>
                                        <input type="date" class="form-control" name="start_date">
                                        <span class="px-3">to</span>
                                        <input type="date" class="form-control" name="end_date">
                                    </div>
                                    <div class="row ps-4">
                                        <div class="text-danger col-6" id="start_date-error"></div>
                                        <div class="text-danger col-6" id="end_date-error"></div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form>
                            @endif
                        </ul>
                    </li>
                </ul>
                @else
                <div class="text-center mx-3">No Phases available for this project</div>
                @endif
            </div>
            <!-- <div class="card-body">
                            @if(isset($project->phases) && !empty($project->phases))
                            @foreach($project->phases as $phase)
                            <div class="timeline-item green {{ $phase->status }}">
                                <span class="date">{{ formatMyDate($phase->start_date) }}</span>
                                <h6>{{ $phase->phase }}</h6>
                                <span>{{ $phase->status }}</span>
                                <ul id="phase-{{ $phase->id }}" class="{{ $phase->phase }}">
                                    <li class="text-bold text-uppercase">{{ $phase->phase }} Tasks</li>
                                    <hr>
                                    @foreach ($phase->tasks as $task)
                                    <li data-task-id="{{ $task->id }}">
                                        {{ $task->task }}
                                        <span class="date badge">{{ when($task->deadline) }}</span>
                                        (Order: {{ $task->order }})
                                        (Deadline: {{ $task->deadline }})
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            @else
                            <div class="text-center">No Phases available for this project</div>
                            @endif

                                            <div id="accordion accordion-flush d-none">
                    @foreach($project->phases as $phase)
                    <div class="accordion-item ">
                        <h2 class="accordion-header" id="heading-{{ $phase->id }}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $phase->id }}" aria-expanded="true"
                                aria-controls="collapse-{{ $phase->id }}">
                                <span class="date">{{ formatMyDate($phase->start_date) }}</span>
                                {{ $phase->phase }}
                                <span>{{ $phase->status }}</span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $phase->id }}" class="accordion-collapse collapse"
                            aria-labelledby="heading-{{ $phase->id }}">
                            <div class="accordion-body">
                                <ul id="phase-{{ $phase->id }}" class="{{ $phase->phase }}">
                                    <li class="text-bold text-uppercase">{{ $phase->phase }} Tasks</li>
                                    <hr>
                                    @foreach ($phase->tasks as $task)
                                    <li data-task-id="{{ $task->id }}">
                                        {{ $task->task }}
                                        <span class="date badge">{{ when($task->deadline) }}</span>
                                        (Order: {{ $task->order }})
                                        (Deadline: {{ $task->deadline }})
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                        </div> -->
        </div>

        <div class="tab-content p-0 mt-2 d-none" id="myTabContent">
            <div class="tab-pane fade" id="Activities" role="tabpanel" aria-labelledby="Activities-tab">

                <div class="card mb-2 d-none">
                    @if (Route::has('activities.store'))
                    <form id="activity_form" class="card-body" action="{{ route('activities.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="project" value="{{ $project->id }}">
                        <div class="mb-3">
                            <textarea name="activity" rows="2" class="form-control no-resize"
                                placeholder="Please type what you want..."></textarea>
                            <div class="text-danger" id="activity-error"></div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-warning"
                                onclick="document.getElementById('activity_file').click();">
                                <i class="fa fa-paperclip text-light"></i>
                            </button>
                            <input class="d-none" type="file" name="activity_file" id="activity_file">
                            <button type="button" class="btn btn-warning"
                                onclick="document.getElementById('activity_image').click();">
                                <i class="fa fa-camera text-light"></i>
                            </button>
                            <input class="d-none" type="image" name="activity_image" id="activity_image">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    @endif

                    <div class="card-body">
                        @if(isset($activities) && !empty($activities))
                        @foreach($activities as $activity)
                        <div class="timeline-item green {{ $activity->status }}">
                            <span class="date">{{ when($activity->created_at) }}</span>
                            <h6>{{ $activity->activity }}</h6>
                            <span>{{ $activity->description }}</a></span>
                        </div>
                        @endforeach
                        @else
                        <div class="text-center">No activities available for this project</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Projects details section end  -->

@endsection