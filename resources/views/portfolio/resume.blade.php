@extends('layouts.app')


@section('content')
<!-- resume section start -->
<div class="row">
    <div class="col-12">
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Profile</h4>
                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Edit</button>
            </div>
            <hr class="hr">
            <p>{{ $profile->bio }}</p>
        </div>
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Education</h4>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEducation"><i
                        class="fas fa-plus"></i> Add New</button>
            </div>
            <hr class="hr">
            <ul class="list-unstyled bg-light">
                @if (count($education) === 0)
                <div class="text-center p-4 text-danger bg-white">No Education records available ...</div>
                @else
                @foreach($education as $educate)
                <li class="bg-light d-flex justify-content-between align-items-center p-2 mb-2">
                    <div>
                        <b class="text-capitalize mb-1">{{ $educate->qualification }}</b>
                        <p class="text-capitalize">{{ $educate->school }}</p>
                        <strong>{{ formatMyDate($educate->from) }} - {{ formatMyDate($educate->to) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <button data-route="{{ route('education.destroy', $educate->id) }}" data-id="{{ $educate->id }}"
                            class="btn btn-sm btn-outline-danger delete-item"><i class="fa fa-trash"></i></button>
                        <button data-route="" data-id="{{ $educate->id }}" class="btn btn-sm btn-outline-success"><i
                                class="fas fa-pen-to-square"></i></button>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Work Experience</h4>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addCareer"><i
                        class="fas fa-plus"></i> Add New</button>
            </div>
            <hr class="hr">
            <ul class="list-unstyled">
                @if (count($careers) === 0)
                <div class="text-center p-4 text-danger bg-white">No Career records available ...</div>
                @else
                @foreach($careers as $career)
                <li class="bg-light row p-2 mb-2">
                    <div class="col-12 col-md-11">
                        <b>{{ $career->job_title }}</b>
                        <p>{{ $career->company }}</p>
                        <div class="d-block my-2"><span
                                class="badge bg-warning text-dark fw-bold me-3">{{ formatMyDate($career->from) }} -
                                {{ formatMyDate($career->to) }}</span><strong>{{ $career->location }}</strong>
                        </div>
                        <ul class="">
                            @foreach($career->roles as $role)
                            <li class="mb-1" data-role="{{ $role->id }}">{{ $role->role }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div
                        class=" mt-2 col-12 col-md-1 d-flex justify-content-start justify-content-md-between align-items-center gap-2">
                        <button data-route="{{ route('career.destroy', $career->id) }}" data-id="{{ $career->id }}"
                            class="btn btn-sm btn-outline-danger delete-item"><i class="fa fa-trash"></i></button>
                        <button data-route="{{ route('career.edit', $career->id) }}" data-id="{{ $career->id }}"
                            class="btn btn-sm btn-outline-success"><i class="fas fa-pen-to-square"></i></button>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>References</h4>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addReference"><i
                        class="fas fa-plus"></i> Add New</button>
            </div>
            <hr class="hr">
            <ul class="list-unstyled">
                @if (count($references) === 0)
                <div class="text-center p-4 text-danger bg-white">No References available ...</div>
                @else
                @foreach($references as $reference)
                <li class="row p-2 mb-2">
                    <div class="col-12 col-md-11">
                        <h6>{{ $reference->names }}</h6>
                        <p class="mb-1"><span class="fw-bold me-2">Phone:</span>{{ $reference->phone }}</span></p>
                        <p><span class="fw-bold me-2">Email:</span>{{ $reference->email }}</p>
                    </div>
                    <div
                        class="col-12 col-md-1 d-flex justify-content-start justify-content-md-between align-items-center gap-2">
                        <button data-route="{{ route('reference.destroy', $reference->id) }}"
                            data-id="{{ $reference->id }}" class="btn btn-sm btn-outline-danger delete-item"><i
                                class="fa fa-trash"></i></button>
                        <button data-route="" data-id="{{ $reference->id }}" class="btn btn-sm btn-outline-success"><i
                                class="fas fa-pen-to-square"></i></button>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Skills</h4>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addSkill"><i
                        class="fas fa-plus"></i> Add New</button>
            </div>
            <hr class="hr">
            <ul class="list-unstyled">
                @if (count($skills) === 0)
                <li class="text-center p-4 text-danger bg-white mb-3">No Skills available ...</li>
                @else
                @foreach($skills as $skill)
                <li class="row mb-3">
                    <div class="col-12 col-md-2">
                        <b class="flex-0">{{ $skill->skill }}</b>
                    </div>
                    <div class="col-12 col-md-10 d-flex justify-content-around align-items-center gap-5">
                        <div class=" progress w-100">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->level }}"
                                aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->level }}%">
                                <span class="progress-value"> {{ $skill->level }}%</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <button data-route="{{ route('skill.destroy', $skill->id) }}" data-id="{{ $skill->id }}"
                                class="btn btn-sm btn-outline-danger delete-item"><i class="fa fa-trash"></i></button>
                            <button data-route="{{ route('skill.edit', $skill->id) }}" data-id="{{ $skill->id }}"
                                class="btn btn-sm btn-outline-success"><i class="fas fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Languages</h4>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addLanguage"><i
                        class="fas fa-plus"></i> Add New</button>
            </div>
            <hr class="hr">
            <ul class="list-unstyled">
                @if (count($languages) === 0)
                <li class="text-center p-4 text-danger bg-white mb-3">No Languages available ...</li>
                @else
                @foreach($languages as $language)
                <li class="row mb-3">
                    <div class="col-12 col-md-2"><b>{{ $language->language }}</b></div>
                    <div class="col-12 col-md-10 d-flex justify-content-around align-items-center gap-5">
                        <div class="progress w-100">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $language->level }}"
                                aria-valuemin="0" aria-valuemax="100" style="width: {{ $language->level }}%">
                                <span class="progress-value"> {{ $language->level }}%</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center gap-2">
                            <button data-route="{{ route('language.destroy', $language->id) }}"
                                data-id="{{ $language->id }}" class="btn btn-sm btn-outline-danger delete-item"><i
                                    class="fa fa-trash"></i></button>
                            <button data-route="{{ route('language.edit', $language->id) }}"
                                data-id="{{ $language->id }}" class="btn btn-sm btn-outline-success"><i
                                    class="fas fa-pen-to-square"></i></button>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="card p-3 p-lg-4 mb-2">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Interests</h4>
                <form action="{{ route('interests.store') }}" class="d-flex" method="post" id="interest_form">
                    @csrf
                    <input class="form-control @error('interest') is-invalid @enderror" type="text" name="interest"
                        id="interest" placeholder="New Interest *">
                    <input type="hidden" name="profile" value="{{ $profile->id ?? '' }}">
                    <button type="submit" class="btn btn-sm btn-primary ms-1">Add</button>
                </form>
            </div>
            <hr class="hr">
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                @if (count($interests) === 0)
                <li class="text-center p-4 text-danger bg-white mb-3">No Interests available ...</li>
                @else
                @foreach($interests as $interest)
                <span class="like d-flex flex-wrap justify-content-center align-items-center fs-3">
                    <i class="interest-icon {{ $interest->icon }}" data-toggle="tooltip" data-placement="top"
                        title="{{ $interest->interest }}"></i>
                </span>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- resume section end -->
@endsection