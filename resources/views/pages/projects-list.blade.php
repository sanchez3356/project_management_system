@extends('layouts.app')


@section('content')

<!-- Projects list section content start  -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <?php 
        dd($projects);
        $pageTitle = $pageTitle;
        ?>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover dataTable no-footer dtr-inline collapsed" id="project_list">
                    <thead class="">
                        <th>Project</th>
                        <th>Deadline</th>
                        <th>Progress</th>
                        <th>Client</th>
                        <th>Team</th>
                        <th>Status</th>
                        <th class="dtr-hidden" style="width: 0px; display: none">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr class="odd">
                            <td class="project-title dtr-control">
                                <h6 class="fs-6 mb-0">{{ $project->project_title }}</h6>
                                <small>Created {{ formatMyDate($project->start_date) }}</small>
                            </td>
                            <td>{{ formatMyDate($project->end) }}</td>
                            <td>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar progress-bar-warning" role="progressbar"
                                        aria-valuenow="{{ $project->rate }}" aria-valuemin="0" aria-valuemax="100"
                                        style="width: {{ $project->rate }}%">
                                    </div>
                                </div>
                                <small>Completion with: {{ $project->rate }}%</small>
                            </td>
                            <td>
                                <img class="avatar rounded" src="./avatar2.jpg" data-bs-toggle="tooltip"
                                    data-bs-placement="left" alt="Avatar" aria-label="Team Lead"
                                    data-bs-original-title="Team Lead" />
                            </td>
                            <td>
                                <ul class="list-unstyled team-info mb-0 d-flex">
                                    <li>
                                        <img src="./avatar3.jpg" alt="avatar" />
                                    </li>
                                    <li>
                                        <img src="./avatar1.jpg" alt="avatar" />
                                    </li>
                                    <li>
                                        <img src="./avatar5.jpg" alt="avatar" />
                                    </li>
                                    <li>
                                        <img src="./avatar4.jpg" alt="avatar" />
                                    </li>
                                </ul>
                            </td>
                            <td><span class="badge bg-warning">{{ $project->status }}</span></td>
                            <td class="project-actions dtr-hidden" style="display: none">
                                <a href="project-detail.html" class="btn btn-sm btn-outline-secondary"><i
                                        class="fa fa-eye"></i></a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-success"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Projects list section content end  -->

@endsection