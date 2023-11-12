@extends('layouts.app')


@section('content')

<!-- Users section start  -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <?php 
        $pageTitle = $pageTitle;
        // dd($users);
        ?>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover dataTable no-footer dt-inline collapsed" id="user_list">
                    <thead class="">
                        <th>Username</th>
                        <th>Created</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Type</th>
                        <th>Profile</th>
                        <th class="dt-hidden" style="width: 0px; display: none">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @php
                        $rowClass = 'even';
                        @endphp
                        @foreach($users as $user)
                        @php
                        $complete = profile_progress($user, $user->profile);
                        @endphp
                        <tr class="{{ $rowClass }}">
                            <td class="project-title dt-control ps-4 text-start">
                                <h6 class="fs-6 mb-0">{{ $user->username }}</h6>
                                <small>Created {{ formatMyDate($user->created_at) }}</small>
                            </td>
                            <td>{{ formatMyDate($user->created_at) }}</td>
                            <td>{{ $user->email }} </td>
                            <td>
                                <img width="40px" height="40px" class="avatar rounded"
                                    src="{{asset('storage/' . $user->avatar) ?: asset('storage/avatars/male.png') }}"
                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                    alt="{{ $user->username }}'s avatar" aria-label="{{ $user->username }}"
                                    data-bs-original-title="{{ $user->username }}" />
                            </td>
                            <td><span class="badge bg-success">{{ $user->type }}</span></td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                        aria-valuenow="{{ $complete }}" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{ $complete }}%">
                                    </div>
                                </div>
                                <small>Completion with: {{ $complete }}%</small>
                            </td>
                            <td class="project-actions dt-hidden" style="display: none">
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil"></i></a>
                                <button data-route="#" data-id="{{ $user->id }}"
                                    class="btn btn-sm btn-outline-danger delete-item"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @php
                        $rowClass = ($rowClass === 'even') ? 'odd' : 'even';
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Users section end  -->

@endsection