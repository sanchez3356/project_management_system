@extends('layouts.app')


@section('content')
<!-- Inbox section start  -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="mobile-left">
                <a class="btn btn-primary toggle-email-nav collapsed" data-bs-toggle="collapse" href="#email-nav"
                    role="button"><span class="btn-label"><i class="la la-bars"></i></span>Menu</a>
            </div>
            <div class="mail-inbox d-flex">
                <div class="mail-left collapse p-3" id="email-nav">
                    <div class="mail-compose mb-3">
                        <a href="{{ route('Inboxes.create') }}" class="btn btn-danger d-block">Compose</a>
                    </div>
                    <div class="mail-side flex-column">
                        <ul class="nav flex-column">
                            <li class="active">
                                <a href="javascript:void(0);"><i class="fa fa-envelope"></i>Inbox
                                    <span class="badge bg-primary float-end">{{ $messageCount }}</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-location-arrow"></i>Sent
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-envelope-open"></i>Draft
                                    <span class="badge bg-info float-end">3</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-mail-forward"></i>Outbox</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-star"></i>Starred
                                    <span class="badge bg-warning float-end">6</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-trash"></i>Trash
                                    <span class="badge bg-danger float-end">9</span></a>
                            </li>
                        </ul>
                        <h3 class="label">
                            Labels
                            <a href="#" class="float-end" title="Add New Labels">
                                <i class="icon-plus"></i>
                            </a>
                        </h3>
                        <ul class="nav flex-column">
                            <li class="active">
                                <a href="javascript:void(0);"><i class="fa fa-circle text-danger"></i>Web
                                    Design
                                    <span class="badge bg-primary float-end">5</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-circle text-info"></i>Recharge
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-circle"></i>Paypal
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa fa-circle text-primary"></i>Family
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mail-right" id="mail">
                    <div class="p-2 p-sm-3 d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Email List</h6>
                        <form class="ms-auto">
                            <div class="input-group">
                                <input type="text" class="form-control search" placeholder="Search Mail"
                                    aria-label="Search Mail" aria-describedby="search-mail" />
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="mail-action clearfix">
                        <div class="float-start mb-2">
                            <div class="form-check d-inline-block me-0 me-sm-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault"></label>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <a href="{{ route('Inboxes.index') }}"><button type="button"
                                        class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-refresh"></i> Refresh
                                    </button></a>
                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-archive"></i> Archive
                                </button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-trash-can"></i> Trash
                                </button>
                                <div class="btn-group d-none d-md-inline-block" role="group">
                                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Tags
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">Tags 1</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Tags 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Tags 3</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group d-none d-md-inline-block" role="group">
                                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        More
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#">Mark as read</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Mark as unread</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Spam</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider" />
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="float-end ms-auto">
                            <div class="pagination-email d-flex">
                                <p>1-50/{{ $messageCount }}</p>
                                <div class="btn-group ms-2" role="group" aria-label="Basic outlined example">
                                    @if ($messages->previousPageUrl())
                                    <a href="{{ $messages->previousPageUrl() }}"><button type="button"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-angle-left"></i>
                                        </button></a>
                                    @endif
                                    @if ($messages->nextPageUrl())
                                    <a href="{{ $messages->nextPageUrl() }}"><button type="button"
                                            class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-angle-right"></i>
                                        </button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mail-list">
                        <ul class="list-unstyled mb-0 list">
                            @foreach($messages as $message)
                            @php
                            $status = $message->read ? 'read' : 'unread';
                            $spam = $message->spam ? 'active' : 'inactive';
                            @endphp
                            <li class="clearfix mb-1 {{ $status }}"
                                data-url="{{ route('Inboxes.show', $message->id) }}">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault{{ $message->id }}" />
                                        <label class="form-check-label"
                                            for="flexCheckDefault{{ $message->id }}"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star {{ $spam }}"><i
                                            class="fa fa-star"></i></a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="mailto:{{ $message->email }}"
                                            class="mail-detail-expand">{{ $message->first_name }}
                                            {{ $message->last_name }}</a>
                                        <span class="badge bg-secondary mb-0">{{ $message->subject }}</span>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[{{ $message->phone }}]</span> {{ $message->message }}
                                    </p>
                                    <span class="time">{{ formatMyDate($message->created_at) }}</span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" class="btn btn-danger delete-item" title="Delete"
                                        data-route="{{ route('Inboxes.destroy', $message->id) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mail-detail-full" id="mail-detail-open" style="display: none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inbox section end  -->

@endsection