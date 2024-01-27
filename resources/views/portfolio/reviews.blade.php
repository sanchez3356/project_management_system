@extends('layouts.app')


@section('content')
<!-- reviews section start -->
<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Most Recent</h6>
            </div>
            <ul class="flex-column mt-2">
                <li>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, impedit?</p>
                </li>
                <li>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, impedit?</p>
                </li>
                <li>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, impedit?</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Reviews</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 list">
                    @foreach($reviews as $review)
                    @php
                    $status ='unread';
                    $spam = 'inactive';
                    @endphp
                    <li class="clearfix mb-1 {{ $status }}">
                        <div class="mail-detail-left float-start">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault{{ $review->id }}" />
                                <label class="form-check-label" for="flexCheckDefault{{ $review->id }}"></label>
                            </div>
                            <a href="javascript:void(0);" class="mail-star {{ $spam }}"><i class="fa fa-star"></i></a>
                        </div>
                        <div class="mail-detail-right float-start">
                            <h6 class="sub">
                                <a href="mailto:{{ $review->email }}"
                                    class="mail-detail-expand">{{ $review->names }}</a>
                                <span class="badge bg-secondary mb-0">{{ $review->rate }}</span>
                            </h6>
                            <p class="dep">
                                <span class="">[{{ $review->rate }}]</span> {{ $review->review }}
                            </p>
                            <span class="time">{{ formatMyDate($review->created_at) }}</span>
                        </div>
                        <div class="hover-action">
                            <a class="btn btn-warning mr-2" href="javascript:void(0);"
                                data-url="{{ route('Inboxes.show', $message->id) }}"><i class="fas fa-eye"></i></a>
                            <button type="button" class="btn btn-danger delete-item" title="Delete"
                                data-route="{{ route('Inboxes.destroy', $message->id) }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- reviews section end -->
@endsection