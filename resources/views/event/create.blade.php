@extends('layouts.main')

@section('title')
    Events
@endsection

@section('top-styles')
    @include('reunion.styles')
@endsection

@section('bottom-script')
    @include('reunion.js')
@endsection

@section('content')
<?php
    $auth = Auth()->user();

?>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Create Event</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Create Event
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
                        <h4 class="card-title">Create an event</h4>
                    </div> 
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('event.new') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="basic-addon-name">Name of the event</label>
                                <input name="name" type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                            </div>

                            <!-- date -->
                            <div class="form-group">
                                <label for="account-birth-date">Date</label>
                                <input name="date" type="text" class="form-control flatpickr" placeholder="Date" id="account-birth-date" />
                            </div>


                            <div class="form-group">
                                <label for="select-country1">Invite members</label>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-9">
                                            <select name="members[]" class="select2 form-control" multiple="multiple" id="default-select-multi" >
                                                @foreach($users as $user)
                                                        <?php
                                                            $profile = $user->profile()->first();
                                                            ?>
                                                        <option value="{{ $user->id }}" {{ $user->id == $auth->id ? 'selected' : '' }} >{{ $profile->full_name != NULL ? $profile->full_name : $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-3 pt-1">
                                            <div class="form-check" id="boxAll" onclick="zzzz()" data-verify="0">
                                                <input class="form-check-input" id="checkbox" type="checkbox" name="all">
                                                <label class="form-control-label" for="checkbox">Invite All</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script>
                                       function zzzz() {
                                            var checkBox = document.getElementById("checkbox");
                                            var select = document.getElementById("default-select-multi");
                                            if (checkBox.checked == true) {
                                                select.disabled = true;
                                            } else {
                                                select.disabled = false;
                                            }
                                            
                                        }
                                    </script>
                            </div>

                            <div class="form-group">
                                <label class="d-block" for="validationBioBootstrap">Description</label>
                                <textarea name="description" class="form-control" id="validationBioBootstrap" name="validationBioBootstrap" rows="3" required></textarea>
                            </div>
                     
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Create</button>
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