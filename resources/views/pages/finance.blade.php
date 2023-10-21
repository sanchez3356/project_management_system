@extends('layouts.app')


@section('content')

<!-- Clients list section start  -->
<div class="row g-2 clearfix">
    <div class="col-12">
        <?php 
    // dd($accounts);
    ?>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>{{$user->username }}'s Finances</h5>
                <div class="dropdown">
                    <button type="button" class="task-add btn btn-primary dropdown-toggle" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-plus me-2"></i>Add</button>
                    <ul class="dropdown-menu dropdown-menu-end dropstart dropdown-menu-dark"
                        aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addAccount">Create
                                Account</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#addTransaction">New
                                transaction</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Create budget</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div id="financeChart" data-url="{{ route('records.finance') }}"></div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6>{{$user->username }}'s Transaction records</h6>
            </div>
            <div class="card-body">
                <table class="table table-hover dataTable no-footer dtr-inline collapsed" id="transactions_list">
                    <thead class="">
                        <th>Account</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Method</th>
                        <th>Description</th>
                        <th class="dtr-hidden" style="width: 0px; display: none">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @php
                        $rowClass = 'even';
                        @endphp
                        @foreach ($accounts as $account)
                        @foreach ($account->transactions as $transaction)
                        <tr class="{{ $rowClass }}">
                            <td class="account_name dt-control text-start ps-4">
                                <h6 class="fs-6 mb-0">{{ $account->account_name }}</h6>
                            </td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ formatMyDate($transaction->transaction_date) }}</td>
                            <td>{{ $transaction->transaction_type }}</td>
                            <td>{{ $transaction->payment_method }}</td>
                            <td>{{ $transaction->description }}</td>
                            <td class="transactions-actions dt-hidden" style="display: none" colspan="6">
                                <button data-route="{{ route('finances.show', $transaction->id) }}"
                                    data-id="{{ $transaction->id }}" class="btn btn-sm btn-outline-secondary"><i
                                        class="fa fa-eye" disabled></i></button>
                                <button data-route="{{ route('finances.edit', $transaction->id) }}"
                                    data-id="{{ $transaction->id }}" class="btn btn-sm btn-outline-success"><i
                                        class="fa fa-pencil"></i></button>
                                <button data-route="{{ route('finances.destroy', $transaction->id) }}"
                                    data-id="{{ $transaction->id }}"
                                    class="btn btn-sm btn-outline-danger delete-item"><i
                                        class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @php
                        $rowClass = ($rowClass === 'even') ? 'odd' : 'even';
                        @endphp
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Clients list section end  -->

@endsection