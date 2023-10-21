@extends('layouts.app')


@section('content')

<!-- Projects list section content start  -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <?php 
        $pageTitle = $pageTitle;
        ?>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover dataTable no-footer dt-inline collapsed" id="project_list">
                    <thead class="">
                        <th>Project Name</th>
                        <th>Deadline</th>
                        <th>Progress</th>
                        <th>Client</th>
                        <th>Rate</th>
                        <th>Priority</th>
                        <th class="dt-hidden" style="width: 0px; display: none">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @php
                        $rowClass = 'even';
                        @endphp
                        @foreach($projects as $project)
                        @php
                        $progress = project_progress($project);
                        @endphp
                        <tr class="{{ $rowClass }}">
                            <td class="project-title dt-control ps-4 text-start">
                                <h6 class="fs-6 mb-0">{{ $project->project_title }}</h6>
                                <small>Created {{ formatMyDate($project->start_date) }}</small>
                            </td>
                            <td>{{ formatMyDate($project->end) }}</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                        aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{ $progress }}%">
                                    </div>
                                </div>
                                <small>Completion with: {{ $progress }}%</small>
                            </td>
                            <td>
                                <img class="avatar rounded" src="./avatar2.jpg" data-bs-toggle="tooltip"
                                    data-bs-placement="left" alt="Avatar" aria-label="Team Lead"
                                    data-bs-original-title="Team Lead" />
                            </td>
                            <td>{{ $project->rate }} </td>
                            <td><span class="badge bg-success">{{ $project->priority }}</span></td>
                            <td class="project-actions dt-hidden" style="display: none">
                                <a href="{{ route('projects.show', $project->id) }}"
                                    class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="btn btn-sm btn-outline-success"><i class="fa fa-pencil"></i></a>
                                <button data-route="{{ route('projects.destroy', $project->id) }}"
                                    data-id="{{ $project->id }}" class="btn btn-sm btn-outline-danger delete-item"><i
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
<!-- Projects list section content end  -->

@endsection