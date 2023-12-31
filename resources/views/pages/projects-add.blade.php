@extends('layouts.app')


@section('content')

<!-- Project add section start  -->
<div class="row clearfix">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-start align-items-center gap-4">
                <h6>Total projects: <span class="fw-bold"> {{ $projectCount }}</span></h6>
                <h6>{{ isset($project) ? 'Edit ' . $project->project_title : 'Create new project' }}</h6>
                @if(isset($project))
                <button type="button" class="btn justify-self-end btn-sm btn-success"><i class="fas fa-eye me-2"></i><a
                        class="link-light" href="{{ route('projects.show', $project->id) }}"> Project
                        Details</a></button>
                @endif
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(isset($project))
            <form class="card-body" method="POST" action="{{ route('projects.update', $project->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @else
                <form class="card-body" method="POST" action="{{ route('projects.store') }}"
                    enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="row g-3 clearfix">
                        <div class="col-sm-12">
                            <input type="text" name="project_title"
                                class="form-control @error('project_title') is-invalid @enderror"
                                placeholder="Projects Name *"
                                value="{{ old('project_title', isset($project) ? $project->project_title : '') }}"
                                required />
                            @error('project_title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <select class="form-select @error('project_type') is-invalid @enderror" name="project_type"
                                aria-label="Default select example" required>
                                <option>Select project type</option>
                                @foreach($projectTypes as $projectType)
                                <option value="{{ $projectType->id }}"
                                    {{ (isset($project) && $project->project_type == $projectType->id) ? 'selected' : '' }}>
                                    {{ $projectType->project_type }}
                                </option>
                                @endforeach
                            </select>
                            @error('project_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <select class="form-select @error('client') is-invalid @enderror" name="client"
                                aria-label="Default select example" required>
                                <option>Select Client Name</option>
                                @foreach($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ (isset($project) && $project->client_id == $client->id) ? 'selected' : '' }}>
                                    {{ $client->username }}
                                </option>
                                @endforeach
                            </select>
                            @error('client')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <input type="number" name="rate" class="form-control @error('rate') is-invalid @enderror"
                                placeholder="Rate in Ksh *"
                                value="{{ old('rate', isset($project) ? $project->rate : '') }}" required />
                            @error('rate')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="datepicker">
                                <input type="date" name="start_date" data-provide="datepicker"
                                    data-date-autoclose="true"
                                    class="form-control @error('start_date') is-invalid @enderror"
                                    placeholder="Start Date *"
                                    value="{{ old('start_date', isset($project) ? $project->start_date : '') }}"
                                    required />
                                @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="datepicker">
                                <input type="date" name="end_date" data-provide="datepicker" data-date-autoclose="true"
                                    class="form-control @error('end_date') is-invalid @enderror"
                                    placeholder="End Date *"
                                    value="{{ old('end_date', isset($project) ? $project->end_date : '') }}" />
                                @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <select class="form-select @error('priority') is-invalid @enderror" name="priority"
                                aria-label="Default select example" required>
                                <option value="">Select Priority</option>
                                <option value="high"
                                    {{ (isset($project) && $project->priority === 'high') ? 'selected' : '' }}>High
                                </option>
                                <option value="medium"
                                    {{ (isset($project) && $project->priority === 'medium') ? 'selected' : '' }}>Medium
                                </option>
                                <option value="low"
                                    {{ (isset($project) && $project->priority === 'low') ? 'selected' : '' }}>Low
                                </option>
                            </select>
                            @error('priority')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input type="file" id="file-upload" name="project_image"
                                value="{{ old('project_image', isset($project) ? $project->project_image : '') }}"
                                class="dropify @error('project_image') is-invalid @enderror" data-height="150" />
                            <div class="mt-3"></div>
                            @error('project_image')
                            @foreach ($errors->get('project_image') as $error)
                            <div class="text-danger">{{ $error }}</div>
                            @endforeach
                            <!-- <div class="text-danger">{{ $message }}</div> -->
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <textarea name="project_description"
                                id="summernote">{{ old('project_description', isset($project) ? $project->project_description : '') }}</textarea>
                            @error('project_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">
                                @if(isset($project))
                                Update
                                @else
                                Create
                                @endif
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- Project add section end  -->

@endsection