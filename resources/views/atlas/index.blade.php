@extends('layouts.main')

@section('title')
    Atlas
@endsection

@section('top-styles')
    @include('atlas.styles')
@endsection

@section('bottom-script')
    @include('atlas.js')
@endsection

@section('content')
<?php
    $auth = Auth()->user();
?>
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Atlas</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Atlas
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
    @include('atlas.alert')
    <!-- Validation -->
    <section class="bs-validation">
        <div class="row">
            <!-- Bootstrap Validation -->
            <div class="col-md-6 col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Company details</h4>
                    </div> 
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('atlas.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="basic-addon-name">Name of the company</label>
                                <input name="name" value="{{ $atlas->name }}" type="text" id="basic-addon-name" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name" required />
                            </div>

                            <div class="form-group">
                                <label class="d-block" for="validationBioBootstrap">Description</label>
                                <textarea name="description" class="form-control" id="validationBioBootstrap" name="validationBioBootstrap" rows="3" required>{{ $atlas->description }}</textarea>
                            </div>
                            <div class="row d-flex flex-row-reverse justify-content-between col-md-12">
                                <div class="media col-md-2 col-sm-12">
                                    <a href="javascript:void(0);" class="mx-auto">
                                        <img class="rounded" id="account-upload-img" width="80" height="80" alt="Jervi" src="https://drive.google.com/uc?export=view&id={{ $atlas->logo }}"">
                                        <!-- upload and reset button -->
                                        <div class="media-body mt-75" style="width: 100%;">
                                            <label for="account-upload" class="btn btn-sm btn-primary waves-effect waves-float waves-light" style="width: 100%;">Choose</label>
                                            <input type="file" id="account-upload" hidden="" accept="image/*" name="image">
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-8 px-0">
                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i data-feather='mail'></i></span>
                                            </div>
                                            <input name="email" type="text" class="form-control" placeholder="Email" aria-label="Email" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i data-feather='instagram'></i></span>
                                            </div>
                                            <input name="instagram" type="text" class="form-control" placeholder="Instagram" aria-label="Instagram" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i data-feather='facebook'></i></span>
                                        </div>
                                        <input name="facebook" type="text" class="form-control" placeholder="Facebook" aria-label="Facebook" >
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                @include('atlas.discord-icon')
                                            </span>
                                        </div>
                                        <input name="discord" type="text" class="form-control" placeholder="Discord" aria-label="Discord" >
                                    </div>
                                </div>
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

<div class="col-12">
    <div class="row flex-row-reverse">
        
    </div>
</div>

