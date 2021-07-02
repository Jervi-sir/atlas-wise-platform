@extends('layouts.main')

@section('title')
    Groups
@endsection

@section('top-styles')
    @include('groups.styles')
@endsection

@section('bottom-script')
    @include('groups.js')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Basic Card</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Calendar
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">

@include('groups.alert')

@foreach ($groups as $group)
    <?php
        $user_president = $group->president()->first();
        $profile_president = $user_president->profile()->first();
    ?>
    <div class="card card-statistics col-6">
        <div class="card-header" style="padding-left: 1.4rem;">
            <h4 class="card-title">{{ $group->name }}</h4>
        </div>
        <div class="card-body ">
            <div class="row">
                <div class="col-md-7 col-sm-10 col-8 mb-2 mb-md-0">
                    <div id="col-12">
                        <span class="font-weight-bolder text-primary">Members : </span>
                        <br>
                        @foreach ($group->users()->get() as $member)
                            <span class="mr-1">{{ $member->name }} , </span>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-5 col-sm-12 col-4">
                    <div class="d-flex">
                        <span class="font-weight-bolder text-primary">President : </span>
                        <span class="ml-1"> {{ $profile_president->full_name != NULL ? $profile_president->full_name : $user_president->name }}</span>
                    </div>
                    <div class="d-flex ">
                        <span class="font-weight-bolder text-primary">Total Members : </span>
                        <span class="ml-1">{{$group->users()->count()}}</span>
                    </div>
                    <div class="d-flex flex-column text-left">
                        <span class="font-weight-bolder text-primary">Covered Tasks : </span>
                        <span class="ml-1"> {{ $group->description }}</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection