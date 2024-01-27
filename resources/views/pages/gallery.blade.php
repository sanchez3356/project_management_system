<!-- resources/views/gallery/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" data-url="{{ route('records.gallery') }}" id="gallery">
        <div class="card-header">
            <h6>Image Gallery</h6>
            <div class="btn-group" role="group" aria-label="Basic outlined example" id="galleryFilter">
                <a href="{{ route('gallery.index') }}"><button type="button" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-camera-rotate"></i> Refresh
                    </button></a>
                <button type="button" class="btn btn-outline-secondary btn-sm active" data-filter="">
                    <i class="fas fa-camera"></i> All
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-filter="avatars">
                    <i class="fas fa-camera"></i> Avatars
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-filter="projects">
                    <i class="fas fa-camera"></i> Projects
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-filter="defaults">
                    <i class="fas fa-camera"></i> Default
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-filter="unused">
                    <i class="fas fa-camera"></i> Unused
                </button>
                <button type="button" class="btn btn-danger btn-sm" id="deleteAllBtn" disabled
                    data-url="{{ route('gallery.deleteMultiple') }}">
                    <i class="fas fa-trash-can"></i> Delete All
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row gallery-loader">
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
                <div class="col-md-3 mb-3 position-relative">
                    <div class="card skeleton-loader-item ">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection