@extends('layouts.app')


@section('content')
<!-- Clients list section start  -->
<div class="row g-2 clearfix"> @if(session('success')) <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (count($clients) === 0)
    <div class="text-center p-4 text-danger bg-white"> No Clients available ...</div>
    @else
    @foreach($clients as $client)
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body text-center">
                <img width="100px" height="105px"
                    src="{{asset('storage/' . $client->avatar) ?: asset('storage/avatars/female.png') }}"
                    alt="{{ $client->username }}'s avatar" class="rounded-circle mb-3 thumbnail mx-auto d-block" />
                <h5>{{ $client->username }}</h5>
                <small>{{ $client->client_title}}</small>
                <h6>{{ $client->client_id}} </h6>
                <div class="mt-3">
                    <button class="btn btn-sm btn-primary">
                        <a class="link-light" href="{{ route('clients.show', $client->id) }}">View
                            Profile</a>
                    </button>
                    <button class="btn btn-sm btn-success"><a class="link-light"
                            href="{{ route('clients.edit', $client->id) }}"> Edit</a></button>
                </div>
                <ul class="social-links d-flex justify-content-center mt-3 list-unstyled">
                    <li class="px-2">
                        <a class="p-2" title="facebook" href="javascript:void(0);"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="px-2">
                        <a class="p-2" title="twitter" href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="px-2">
                        <a class="p-2" title="instagram" href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
<!-- Clients list section end  -->

@endsection