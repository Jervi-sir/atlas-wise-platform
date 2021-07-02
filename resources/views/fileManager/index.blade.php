@extends('layouts.main')

@section('title')
    File Manager
@endsection

@section('top-styles')
    @include('fileManager.style')
@endsection

@section('bottom-script')
    @include('fileManager.js')
@endsection

@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <!-- overlay container -->
    <div class="body-content-overlay"></div>

    <h1>
        <i data-feather='lock' class="lock-size"></i>
        __ Coming Soon __
    </h1>
</div>

<style>
    .lock-size {
        height: 2rem;
        width: 2rem;
    }
</style>

@endsection
