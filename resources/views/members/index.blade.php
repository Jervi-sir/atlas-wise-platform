@extends('layouts.main')

@section('title')
    Members
@endsection

@section('top-styles')
    @include('members.styles')
@endsection

@section('title')
    Members
@endsection

@section('bottom-script')
    @include('members.js')
@endsection


@section('content')
    
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Members Table</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Members
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="content-body">

    <iframe id="tables" src="{{ route('members.list2') }}" width="100%" height="500vh" frameBorder="0"></iframe>

    <script>

    </script>
 
</div>

@endsection