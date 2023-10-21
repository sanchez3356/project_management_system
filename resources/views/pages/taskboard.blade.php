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
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">
                                <h6>Dashbaord</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">
                                <h6>New project</h6>
                                <p>It is a long established fact that a reader will be distracted.</p>
                            </div>
                        </li>
                        <li class="dd-item" data-id="3">
                            <div class="dd-handle">
                                <h6>Feed Details</h6>
                                <p>here are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered.</p>
                            </div>
                        </li>
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
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">
                                <h6>New Code Update</h6>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">
                                <h6>Meeting</h6>
                                <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                    interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by
                                    Cicero</p>
                                <ul class="list-unstyled team-info mt-3 d-flex">
                                    <li><img src="../dist/assets/images/xs/avatar7.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar9.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                        </li>
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
                        <li class="dd-item" data-id="1">
                            <div class="dd-handle">
                                <h6>Job title</h6>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of text.</p>
                                <ul class="list-unstyled team-info mt-3 d-flex">
                                    <li><img src="../dist/assets/images/xs/avatar4.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar5.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar6.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                    <li><img src="../dist/assets/images/xs/avatar8.jpg" title="Avatar" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dd-item" data-id="2">
                            <div class="dd-handle">
                                <h6>Event Done</h6>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                    piece of classical</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Taskboard section end  -->

@endsection