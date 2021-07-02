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
                <h2 class="content-header-title float-left mb-0">event Show</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">event Show
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
            @if($events->count() == 0)
                <h2>No event created</h2>
            @endif

            @foreach ($events as $event)
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create an annoncement</h4>
                    </div> 
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('event.updateshow') }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <div class="form-group">
                                <label class="form-label" for="basic-addon-name">Name of the annoncement</label>
                                <input  type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" value="{{ $event->name }}" disabled />
                            </div>

                            <!-- date -->
                            <div class="form-group">
                                <label for="account-birth-date">Date</label>
                                <input  type="text" class="form-control flatpickr" placeholder="Date" id="account-birth-date" value="{{ $event->date }}" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="select-country1">Invite members</label>
                                <div class="col-12 px-0">
                                    <ul class="invited-disabled" dir="ltr" style="width: 100%;" disabled>
                                        @foreach ($event->invited()->get() as $user)
                                            <li class="invited-item">{{ $user->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            
                            

                            <div class="form-group">
                                <label class="d-block" for="validationBioBootstrap">Description</label>
                                <textarea class="form-control" id="validationBioBootstrap" rows="3" disabled>{{ $event->description }}</textarea>
                            </div>
                     
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $loop->iteration }}">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Vertical modal -->
            <div class="vertical-modal-ex">
                <div class="modal fade" id="exampleModalCenter-{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Are you sure you want to delete this " {{ $event->name }} "
                                </p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('event.delete') }}" method="POST" class="mr-5">
                                    @csrf
                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <button type="submit" class="btn btn-danger" >Yes</button>
                                </form>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical modal end-->

            <!-- /Bootstrap Validation -->
            @endforeach
            
        </div>
    </section>
    <!-- /Validation -->

</div>


@endsection

