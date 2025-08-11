@extends('admin.themes.main')

@section('page-title') IMA | Dashboard @endsection

@section('page-body')
    <div class="card p-3">
        <span>Dashboard | Welcome, <b>{{ Auth::user()->full_name }}</b></span>
    </div>
@endsection

