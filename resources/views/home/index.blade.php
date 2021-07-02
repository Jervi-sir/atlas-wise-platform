@extends('layouts.main')

@section('title')
    Profile
@endsection

@section('top-styles')
    @include('home.styles')
@endsection

@section('bottom-script')
    @include('home.js')
@endsection

@section('content')
        
<div class="content-header row">
</div>
<div class="content-body">
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">

        <div class="row match-height">
            <!-- Greetings Card starts -->

            @if ($event != NULL && $reunion != NULL)
                @if ($reunion != NULL)
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card card-congratulations">
                        <div class="card-body text-center">
                            <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                            <img src="../../../app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-primary shadow mb-0">
                                <div class="avatar-content"  data-toggle="modal" data-target="#ReunionMoadl">
                                    <img src="../../../app-assets/images/event/meet.png" alt="" class="bright size-small" width="50px">
                                </div>
                            </div>
                            <p>Reunion</p>
                            <div class="text-center">
                                <h1 class="mb-0 text-white">{{ $reunion->name }}</h1>
                                <p class="mb-1 text-white">{{ $reunion->date }}</p>
                                <p class="card-text m-auto w-75">
                                    {{ $reunion->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Analytics end -->
                <div class="modal fade" id="ReunionMoadl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title-top">
                                    <h5 class="modal-title mr-5" id="exampleModalCenterTitle">{{ $reunion->name }}</h5>
                                    <span>{{ $reunion->date }}</span>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6><span>Memeber : </span></h6>
                                @foreach ($reunion->invited()->get() as $members)
                                <span>
                                    {{$members->profile()->first()->full_name == NULL ? $members->name : $members->profile()->first()->full_name}}, 
                                </span>
                                @endforeach
                                <h6 class="mt-2">Description :</h6>
                                <p>
                                    {{ $reunion->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
 

                @if ($event != NULL)
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card card-congratulations card-reunion">
                        <div class="card-body text-center">
                            <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                            <img src="../../../app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                            <div class="avatar avatar-xl bg-secondary shadow mb-0">
                                <div class="avatar-content shadow-2"  data-toggle="modal" data-target="#EventMoadl">
                                    <i data-feather="calendar" class="font-large-1"></i>
                                </div>
                            </div>
                            <p>Event</p>
                            <div class="text-center">
                                <h1 class="mb-0 text-white">{{ $event->name }}</h1>
                                <p class="mb-1 text-white">{{ $event->date }}</p>
                                <p class="card-text m-auto w-75">
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard Analytics end -->
                <div class="modal fade" id="EventMoadl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="modal-title-top">
                                    <h5 class="modal-title mr-5" id="exampleModalCenterTitle">{{ $event->name }}</h5>
                                    <span>{{ $event->date }}</span>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6><span>Memeber : </span></h6>
                                @foreach ($event->invited()->get() as $members)
                                <span>
                                    {{$members->profile()->first()->full_name == NULL ? $members->name : $members->profile()->first()->full_name}}, 
                                </span>
                                @endforeach
                                <h6 class="mt-2">Description :</h6>
                                <p>
                                    {{ $event->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="row match-height">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        @include('home.clock')
                    </div>
                </div>
                
            @else
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h1>No Event set yet</h1>
            </div>
            <div class="row match-height">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    @include('home.clock')
                </div>
            </div>
            @endif


        </div>

    </section>
</div>

@endsection
