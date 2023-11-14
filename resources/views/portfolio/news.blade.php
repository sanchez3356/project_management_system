@extends('layouts.app')


@section('content')
<!-- newsletter section start -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <?php 
        $pageTitle = $pageTitle;
        // dd($users);
        ?>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-hover dataTable no-footer dt-inline collapsed" id="email_list">
                    <thead class="">
                        <th>Id</th>
                        <th>Email</th>
                        <th>Sent</th>
                        <th class="">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @php
                        $rowClass = 'even';
                        @endphp
                        @foreach($emails as $email)
                        <tr class="{{ $rowClass }}">
                            <td><b>{{ $email->id }}</b></td>
                            <td class="project-title dt-control ps-4 text-start">
                                <h6 class="fs-6">{{ $email->email }}</h6>
                            </td>
                            <td>{{ formatMyDate($email->created_at) }} </td>
                            <td class="project-actions">
                                <a href=" #" class="btn btn-sm btn-outline-secondary"><i class="fa fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-success"><i class="fa fa-pencil"></i></a>
                                <button data-route="#" data-id="{{ $email->id }}"
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
<!-- newsletter section end -->
@endsection