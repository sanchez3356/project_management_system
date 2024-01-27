@extends('layouts.app')


@section('content')
<!-- portfolio section start -->
<div class="row g-2">
    <div class="col-12 col-md-2">
        <div class="card">
            <div class="card-header">
                <h6>Project types</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    @if (count($types) === 0)
                    <li class="mb-2 text-center text-danger bg-white">No available project types ...</li>
                    @else
                    @foreach($types as $type)
                    <li class="mb-2">{{ $type->project_type}}</li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6>Portfolio projects</h6>
                <a href="{{ route('Portfolio.create') }}"><button class="btn btn-sm btn-primary"><i
                            class="fas fa-plus"></i>
                        Add New</button></a>
            </div>
            <div class="card-body">
                @if (count($projects) === 0)
                <div class="text-center p-4 text-danger bg-white">No Portfolio Projects available ...</div>
                @else
                @foreach($projects as $project)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">{{ $project->project_name}}</h6>
                        </div>
                        <div class="card-body">
                            <b>{{ $project->project_type}}</b>
                            <img src="{{ asset('storage/' . $project->image ) }}"
                                alt="{{ $project->project_name}}'s Image" class="img-fluid"></img>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-danger">Delete</button>
                            <button class="btn btn-sm btn-success">Edit</button>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- portfolio section end -->
@endsection