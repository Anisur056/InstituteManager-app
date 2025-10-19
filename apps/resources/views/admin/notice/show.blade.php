@extends('admin.themes.main')

@section('page-title') Notice- {{$notice->title}} @endsection

@section('css')

@endsection

@section('page-body')

    <div class="col-12">
        <div class="card h-100 rounded-15">
            <div class="card-header d-flex gap-3 align-items-center justify-content-between">
                <h5 class="m-0 fs-18 fw-semi-bold">
                    Notice- {{$notice->title}}
                </h5>
                <a href="{{ route('notices.index') }}"
                    class="btn btn-success d-flex align-items-center fs-15 gap-2 px-3 py-2 rounded-3">
                    <i class="fa fa-list"></i>
                    <span>All Notice</span>
                </a>
            </div>
            <div class="card-body">

                <img class="rounded-3 w-75 mb-3" src="{{ asset("assets/$notice->image") }}"><br>

                <p> ID: {{ $notice->id }}</p>
                <p> Title: {{ $notice->title }}</p>
                <p> Date: {{ $notice->date }}</p>
                <p> Enable Status: {{ $notice->enable_status }}</p>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
