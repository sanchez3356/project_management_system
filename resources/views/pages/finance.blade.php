@extends('layouts.app')


@section('content')

<!-- Clients list section start  -->
<div class="row g-2 clearfix">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="fw-bold">Account name : <span class="fw-normal account-name">Finances</span></h6>
                <div class="d-flex justify-contents-around align-items-center gap-2">
                    <label for="accountFilter">Account:</label>
                    <select class="form-control form-control-sm" id="accountFilter">
                        @foreach($accounts as $account)
                        <option value="{{ $account->id }}">{{ $account->account_name }}</option>
                        @endforeach
                        <!-- Add options for all available accounts -->
                    </select>
                    <!-- Filter by Transaction Month -->
                    <label for="monthFilter">Month:</label>
                    <select class="form-control form-control-sm" id="monthFilter">
                        <option value="0">None</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="10">December</option>
                        <!-- Add options for all available months -->
                    </select>
                </div>
                <div class="dropdown">
                    <button type="button" class="task-add btn btn-sm btn-primary dropdown-toggle"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i
                            class="fas fa-plus me-2"></i>Add</button>
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
                <table class="table table-hover dataTable no-footer dt-inline collapsed" id="transactions_list">
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