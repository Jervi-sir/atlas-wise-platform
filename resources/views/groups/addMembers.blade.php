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
<?php
    $members = \App\Models\User::all();
    $group = Auth()->user()->president_of()->first();
?>

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Form Validation</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Forms</a>
                        </li>
                        <li class="breadcrumb-item active">Form Validation
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
    <!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <!-- Bootstrap Validation -->
            <div class="col-md-6 col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add members to my group</h4>
                    </div> 
                    @if(Auth()->user()->president_of()->count() == 0)
                    <div class="card-body">
                        <h2 class="text-primary">You haven't created a group yet</h2>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('groups.create') }}" class="btn btn-primary">Create a group</a>
                            </div>
                        </div>
                        
                    </div>
                    @else
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('group.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="basic-addon-name">Name of your group</label>
                                <input type="text" id="basic-addon-name" class="form-control" placeholder="{{ Auth()->user()->president_of()->first()->name }}" aria-label="Name" aria-describedby="basic-addon-name" disabled />
                            </div>

                            <div class="card-body px-0">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Members name</label>
                                        <div class="form-group">
                                            <select name="members[]" class="select2 form-control" multiple="multiple" id="default-select-multi">
                                                @foreach ($members as $member)
                                                    @if ($member->role()->first()->code != 'admin')
                                                        <option value="{{ $member->id }}" {{ $member->groups()->find($group->id) == NULL ? '' : 'selected'}}>{{ $member->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>                           

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            <!-- /Bootstrap Validation -->
        </div>
    </section>
    <!-- /Validation -->

</div>







@endsection