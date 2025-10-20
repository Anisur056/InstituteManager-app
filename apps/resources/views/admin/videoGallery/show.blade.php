@extends('admin.themes.main')

@section('page-title') Gallery- {{$gallery->title}} @endsection

@section('css')

@endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Gallery- {{$gallery->title}}
                </h5>
                <a href="{{ route('gallery.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-list"></i>
                    <span>All Gallery</span>
                </a>
            </div>
            <div class="card-body">

                <img class="rounded-3 w-75 mb-3" src="{{ asset("assets/$gallery->image") }}"><br>

                <p> ID: {{ $gallery->id }}</p>
                <p> Title: {{ $gallery->title }}</p>
                <p> Enable Status: {{ $gallery->enable_status }}</p>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
