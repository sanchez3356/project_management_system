@extends('layouts.app')


@section('content')
<!-- accounts add section start -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="modal-content" id="account_form" method="POST" action="{{ route('accounts.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h6 class="title" id="defaultModalLabel">Add New Account</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-12">
                                    <input type="text" name="account"
                                        class="form-control @error('account') is-invalid @enderror"
                                        placeholder="Account name *" value="{{ old('account') }}" required />
                                    <div class="text-danger" id="account-error"></div>
                                </div>
                                <div class="col-12">
                                    <input type="number" name="balance" class="form-control"
                                        placeholder="Account Balance" value="{{ old('balance') }}" />
                                    <div class="text-danger" id="balance-error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Account</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- accounts add section end -->
@endsection