@extends('layouts.main')

@section('title')
    Events
@endsection

@section('top-styles')
    @include('event.styles')
@endsection

@section('bottom-script')
    @include('event.js')
@endsection

@section('content')
<?php
    $auth = Auth()->user();
?>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">event Edit</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">event Edit
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
    @include('event.alert')
    <!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <!-- Bootstrap Validation -->
            <div class="col-md-6 col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create an annoncement</h4>
                    </div> 
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('event.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $item->id }}">
                            <div class="form-group">
                                <label class="form-label" for="basic-addon-name">Name of the annoncement</label>
                                <input name="name" value="{{ $item->name }}" type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                            </div>

                            <!-- date -->
                            <div class="form-group">
                                <label for="account-birth-date">Date</label>
                                <input name="date" value="{{ $item->date }}"  type="text" class="form-control flatpickr" placeholder="Date" id="account-birth-date" />
                            </div>


                            <div class="form-group">
                                <label for="select-country1">Invite members</label>
                                <div class="row">
                                    <div class="col-12">
                                        <select name="members[]" class="select2 form-control" multiple="multiple" id="default-select-multi" >
                                            @foreach (\App\Models\User::all() as $user)
                                                <option value="{{ $user->id }}"  {{ $user->invited_to_event()->find($item->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="d-block" for="validationBioBootstrap">Description</label>
                                <textarea name="description" class="form-control" id="validationBioBootstrap" name="validationBioBootstrap" rows="3" required>{{ $item->description }}</textarea>
                            </div>
                     
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Bootstrap Validation -->
        </div>
    </section>
    <!-- /Validation -->

</div>


@endsection