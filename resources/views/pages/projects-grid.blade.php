@extends('layouts.app')


@section('content')

<!-- Projects grid section content start  -->
<div class="row g-2">
    @if (count($projects) === 0)
    <div class="text-center p-4 text-danger bg-white">No Projects available ...</div>
    @else
    @foreach($projects as $project)
    <?php
    $progress = project_progress($project);?>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body text-start pro-img">
                <img class="d-block img-fluid mb-3 mx-auto" src="{{ asset('storage/' . $project->project_image ) }}"
                    alt="{{ $project->project_title }} Project image" style="height: 150px; object-fit: cover;" />
                <h6 class="project-title text-primary mb-3">
                    <a href="{{ route('projects.show', $project->id) }}">{{ $project->project_title }}</a>
                </h6>
                <p>
                    {{ Illuminate\Support\Str::limit($project->project_description, 100) }}
                </p>
                <div class="progress mb-3" style="height: 6px">
                    <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%"
                        aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="align-items-center d-flex d-none">
                    <h6 class="mb-0 me-2">Team:</h6>
                    <ul class="list-unstyled team-info mb-0 d-flex">
                        <li>
                            <img src="../dist/assets/images/xs/avatar4.jpg" data-bs-toggle="tooltip"
                                data-bs-placement="top" alt="Avatar" aria-label="Chris Fox"
                                data-bs-original-title="Chris Fox" />
                        </li>
                        <li>
                            <img src="../dist/assets/images/xs/avatar5.jpg" data-bs-toggle="tooltip"
                                data-bs-placement="top" alt="Avatar" aria-label="Joge Lucky"
                                data-bs-original-title="Joge Lucky" />
                        </li>
                        <li>
                            <img src="../dist/assets/images/xs/avatar2.jpg" data-bs-toggle="tooltip"
                                data-bs-placement="top" alt="Avatar" aria-label="Folisise Chosielie"
                                data-bs-original-title="Folisise Chosielie" />
                        </li>
                        <li>
                            <img src="../dist/assets/images/xs/avatar1.jpg" data-bs-toggle="tooltip"
                                data-bs-placement="top" alt="Avatar" aria-label="Joge Lucky"
                                data-bs-original-title="Joge Lucky" />
                        </li>
                    </ul>
                </div>
                <div class="align-items-center d-flex gap-4">
                    <button class="btn btn-sm btn-danger delete-item"
                        data-route="{{ route('projects.destroy', $project->id) }}" data-id="{{ $project->id }}">
                        <a class="link-light" href="#">Delete Project</a>
                    </button>
                    <button class="btn btn-sm btn-success"><a class="link-light"
                            href="{{ route('projects.edit', $project->id) }}"> Edit</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<!-- Projects grid section content end  -->

@endsection