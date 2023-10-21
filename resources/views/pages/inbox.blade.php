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
                        <a href="app-compose.html" class="btn btn-danger d-block">Compose</a>
                    </div>
                    <div class="mail-side flex-column">
                        <ul class="nav flex-column">
                            <li class="active">
                                <a href="javascript:void(0);"><i class="fa fa-envelope"></i>Inbox
                                    <span class="badge bg-primary float-end">{{ $inboxCount }}</span></a>
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
                <div class="mail-right">
                    <div class="p-2 p-sm-3 d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Email List</h6>
                        <form class="ms-auto">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Mail"
                                    aria-label="Search Mail" aria-describedby="search-mail" />
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="mail-action clearfix">
                        <div class="float-start mb-2">
                            <div class="form-check d-inline-block me-0 me-sm-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6" />
                                <label class="form-check-label" for="flexCheckDefault6"></label>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                    <i class="fa fa-refresh"></i> Refresh
                                </button>
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
                                <p>1-50/295</p>
                                <div class="btn-group ms-2" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-angle-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mail-list">
                        <ul class="list-unstyled mb-0">
                            <li class="clearfix">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault7" />
                                        <label class="form-check-label" for="flexCheckDefault7"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star active"><i
                                            class="fa fa-star"></i></a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="javascript:void(0);" class="mail-detail-expand">Herman Beck</a>
                                        <span class="badge bg-secondary mb-0">Marketing</span>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[ThemeForest]</span> Lorem Ipsum
                                        is simply dumm dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                    <span class="time">23 Jun</span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" class="btn btn-danger" title="Delete" data-bs-toggle="modal"
                                        data-bs-target="#ModalDelete">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault8" />
                                        <label class="form-check-label" for="flexCheckDefault8"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star">
                                        <i class="fa fa-star-o"></i>
                                    </a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="javascript:void(0);" class="mail-detail-expand">Mary Adams</a>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[Support]</span> There are many
                                        variations of passages of Lorem Ipsum available,
                                        but the majority
                                    </p>
                                    <span class="time"><i class="fa fa-paperclip"></i> 22 Jun
                                    </span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" data-type="confirm" class="btn btn-danger" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#ModalDelete">
                                        <i class="fas fa-trash-can"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="clearfix unread">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault9" />
                                        <label class="form-check-label" for="flexCheckDefault9"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star"><i class="fa fa-star-o"></i></a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="javascript:void(0);" class="mail-detail-expand">June Lane</a>
                                        <span class="badge bg-info mx-1">Family</span>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[Support]</span> Lorem Ipsum is
                                        simply dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                    <span class="time">20 Jun</span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" data-type="confirm" class="btn btn-danger" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#ModalDelete">
                                        <i class="fas fa-trash-can"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault10" />
                                        <label class="form-check-label" for="flexCheckDefault10"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star"><i class="fa fa-star-o"></i></a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="javascript:void(0);" class="mail-detail-expand">Gary Camara</a>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[CSS]</span> There are many
                                        variations of passages of Lorem Ipsum available,
                                        but the majority
                                    </p>
                                    <span class="time">14 Jun</span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" data-type="confirm" class="btn btn-danger" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#ModalDelete">
                                        <i class="fas fa-trash-can"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault11" />
                                        <label class="form-check-label" for="flexCheckDefault11"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star"><i class="fa fa-star-o"></i></a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="javascript:void(0);" class="mail-detail-expand">Frank Camly</a>
                                        <span class="badge bg-danger mx-1">Themeforest</span>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[WrapTheme]</span> Lorem Ipsum is
                                        simply dumm dummy text of the printing and
                                        typesetting industry.
                                    </p>
                                    <span class="time">
                                        <i class="fa fa-paperclip"></i> 11 Jun
                                    </span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" data-type="confirm" class="btn btn-danger" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#ModalDelete">
                                        <i class="fas fa-trash-can"></i>
                                    </button>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="mail-detail-left float-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault12" />
                                        <label class="form-check-label" for="flexCheckDefault7"></label>
                                    </div>
                                    <a href="javascript:void(0);" class="mail-star"><i class="fa fa-star-o"></i></a>
                                </div>
                                <div class="mail-detail-right float-start">
                                    <h6 class="sub">
                                        <a href="javascript:void(0);" class="mail-detail-expand">Gary Camara</a>
                                        <span class="badge bg-success mx-1">Work</span>
                                    </h6>
                                    <p class="dep">
                                        <span class="">[Awwwards]</span> There are many
                                        variations of passages of Lorem Ipsum available,
                                        but the majority
                                    </p>
                                    <span class="time">29 May</span>
                                </div>
                                <div class="hover-action">
                                    <a class="btn btn-warning mr-2" href="javascript:void(0);"><i
                                            class="fa fa-archive"></i></a>
                                    <button type="button" data-type="confirm" class="btn btn-danger" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#ModalDelete">
                                        <i class="fas fa-trash-can"></i>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mail-detail-full" id="mail-detail-open" style="display: none">
                        <div class="mail-action clearfix">
                            <div class="float-start">
                                <div class="d-inline-block">
                                    <a href="javascript:void(0);" class="mail-back btn btn-primary btn-sm"><i
                                            class="fa fa-arrow-left"></i>Back</a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-refresh"></i> Refresh
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-archive"></i> Archive
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa fa-trash"></i> Trash
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
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm"><i
                                        class="fa fa-mail-forward"></i></a>
                            </div>
                        </div>
                        <div class="detail-header">
                            <div class="media d-flex mb-3">
                                <div class="float-start me-3">
                                    <img class="rounded-3" src="./avatar1.jpg" width="65" alt="" />
                                </div>
                                <div class="media-body w-100">
                                    <p class="mb-0">
                                        <strong class="text-muted me-1">From:</strong>
                                        <a class="text-default" href="javascript:void(0);">info@thememakker.com</a>
                                        <span class="text-muted text-sm float-end">12:48, 23.06.2021</span>
                                    </p>
                                    <p class="mb-0">
                                        <strong class="text-muted me-1">To:</strong>Me
                                        <small class="text-muted float-end"><i class="zmdi zmdi-attachment me-1"></i>(2
                                            files, 89.2 KB)
                                        </small>
                                    </p>
                                    <p class="mb-0">
                                        <strong class="text-muted me-1">CC:</strong>
                                        <a class="text-default" href="javascript:void(0);">mail@thememakker.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mail-cnt">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the
                                industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and
                                scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap
                                into electronic typesetting, remaining essentially
                                unchanged.
                            </p>
                            <p>
                                printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of
                                type and scrnturies, but also the leap into
                                electronic typesetting, remaining essentially
                                unchanged.
                            </p>
                            <hr />
                            <strong>Click here to</strong>
                            <a class="btn btn-link" href="app-compose.html">Reply</a>
                            or
                            <a class="btn btn-link" href="app-compose.html">Forward</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inbox section end  -->

@endsection