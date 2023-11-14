@extends('layouts.app')


@section('content')
<!-- Compose section start  -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            @php
            $attr = isset($message) ? 'disabled' : '';
            @endphp
            <div class="card-body">
                <form method="POST" action="{{ route('Inboxes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="To"
                            value="{{ isset($message) ? $message->email : '' }}" {{$attr}} required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="CC" name="cc" required>
                    </div>
                    <hr>
                    <div class="col-sm-12 col-12">
                        <textarea name="email" id="summernote"></textarea>
                        @error('email')
                        <div class="text-danger">{{ $email }}</div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success">Send Message</button>
                        <button type="button" class="btn btn-secondary">Draft</button>
                        <a href="{{ route('Inboxes.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Compose section end  -->
@endsection