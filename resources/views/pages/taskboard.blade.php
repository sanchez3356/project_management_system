@extends('layouts.app')


@section('content')

<!-- Taskboard section start  -->
<div class="row g-3">
    <div class="col-lg-4 col-md-12">
        <div class="card mb-4 planned_task">
            <div class="card-header d-flex justify-content-between my-2">
                <h6 class="card-title">Planned</h6>
                <ul class="header-dropdown">
                    <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addTask"><i
                                class="fas fa-circle-plus"></i></a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="dd" data-plugin="nestable">
                    <ol class="dd-list">
                        @foreach ($plannedTasks as $task)
                        <li class="dd-item" data-id="{{$task->id}}">
                            <div class="dd-handle">
                                <h6>{{ $task->phases->projects->project_title }}</h6>
                                <p>{{$task->task}}</p>
                                <p>{{$task->image}}</p>
                                <ul class="list-unstyled team-info mt-3 d-flex">
                                    <li><img src="../dist/assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar2.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card mb-4 progress_task">
            <div class="card-header d-flex justify-content-between my-2">
                <h6 class="card-title">In progress</h6>
                <ul class="header-dropdown">
                    <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addTask"><i
                                class="fas fa-circle-plus"></i></a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="dd" data-plugin="nestable">
                    <ol class="dd-list">
                        @foreach ($inProgressTasks as $task)
                        <li class="dd-item" data-id="{{$task->id}}">
                            <div class="dd-handle">
                                <h6>{{ $task->phases->projects->project_title }}</h6>
                                <p>{{$task->task}}</p>
                                <p>{{$task->image}}</p>
                                <ul class="list-unstyled team-info mt-3 d-flex">
                                    <li><img src="../dist/assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar2.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card mb-4 completed_task">
            <div class="card-header text-light d-flex justify-content-between my-2">
                <h6 class="card-title">Completed</h6>
                <ul class="header-dropdown">
                    <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addTask"><i
                                class="fas fa-circle-plus text-light"></i></a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="dd" data-plugin="nestable">
                    <ol class="dd-list">
                        @foreach ($completedTasks as $task)
                        <li class="dd-item" data-id="{{$task->id}}">
                            <div class="dd-handle">
                                <h6>{{ $task->phases->projects->project_title }}</h6>
                                <p>{{$task->task}}</p>
                                <p>{{$task->image}}</p>
                                <ul class="list-unstyled team-info mt-3 d-flex">
                                    <li><img src="../dist/assets/images/xs/avatar1.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar2.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Taskboard section end  -->

@endsection