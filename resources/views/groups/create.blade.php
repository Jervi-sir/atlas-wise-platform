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
    $role = \App\Models\Role::where('code', 'admin')->first();
    $admins = $role->users()->get();

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
                        <h4 class="card-title">Create a new group</h4>
                    </div> 
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('group.new') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="basic-addon-name">Group name</label>
                                <input name="group-name" type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                            </div>

                            <div class="form-group">
                                <label for="select-country1">President</label>
                                <select name="president-id" class="form-control" id="select-country1" required>
                                    <option value="">Select a President</option>
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                @endforeach
                                </select>
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