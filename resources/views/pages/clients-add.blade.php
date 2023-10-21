@extends('layouts.app')


@section('content')

<!-- clients add section start -->
<div class="card">
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
    @if(isset($id))
    <form class="card-body" method="POST" action="{{ route('clients.update', $id) }}">
        @method('PUT')
        @else
        <form class="card-body" method="POST" action="{{ route('clients.store') }}">
            @endif
            @csrf
            <div class="row g-3">
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        placeholder="First Name *"
                        value="{{ old('first_name', isset($profile) ? $profile->first_name : '') }}" required />
                    @error('first_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        placeholder="Last Name"
                        value="{{ old('last_name', isset($profile) ? $profile->last_name : '') }}" required />
                    @error('last_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email ID *" value="{{ old('email', isset($client) ? $client->email : '') }}"
                        required />
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        placeholder="Username *" value="{{ old('username', isset($client) ? $client->username : '') }}"
                        required />
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" value="{{ old('password') }}" required />
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @if(!isset($id))
                <div class="col-md-4 col-sm-12">
                    <input type="text" name="password_confirmation" class="form-control" placeholder="Confirm Password"
                        value="{{ old('password') }}" required />
                </div>
                @endif
                <div class="col-md-3 col-sm-12">
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Mobile No" value="{{ old('phone', isset($profile) ? $profile->phone : '') }}"
                        required />
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3 col-sm-12">
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"
                        placeholder="Avatar *" value="{{ old('avatar', isset($avatar) ? $client->avatar : '') }}"
                        required />
                    @error('avatar')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        placeholder="Address" value="{{ old('address', isset($profile) ? $profile->address : '') }}"
                        required />
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <h6>Module Permission</h6>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Read</th>
                                    <th>Write</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Projects</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault6" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault6"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault7" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault7"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault21" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault21"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tasks</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault31" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault31"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault41" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault41"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault51" />
                                            <label class="form-check-label" for="flexCheckDefault51"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chat</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault61" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault61"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault71" />
                                            <label class="form-check-label" for="flexCheckDefault71"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault81" />
                                            <label class="form-check-label" for="flexCheckDefault81"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Estimates</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault91" checked="" />
                                            <label class="form-check-label" for="flexCheckDefault91"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault10" />
                                            <label class="form-check-label" for="flexCheckDefault10"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault11" />
                                            <label class="form-check-label" for="flexCheckDefault11"></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">@if(isset($id))
                Update
                @else
                Add
                @endif
            </button>
        </form>
</div>
<!-- clients add section end -->

@endsection