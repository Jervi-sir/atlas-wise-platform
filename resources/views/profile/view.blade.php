<?php 
    $profile = Auth()->user()->profile()->first();
    if($profile->speciality()->first())
    {
        $speciality = $profile->speciality()->first();
        $speciality_id = $speciality->id;
    }
    else
    {
        $speciality = NULL;
        $speciality_id =NULL;
    }

    $socials = json_decode(Auth()->user()->profile->socials);
    $color = array("primary", "secondary", "success", "warning", "danger", "info");

?>

<div role="tabpanel" class="tab-pane active" id="account-vertical-view" aria-labelledby="account-pill-view" aria-expanded="true">
<div class="row d-flex">
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-profile">
            <div class="card-body">
                <div class="profile-image-wrapper">
                    <div class="profile-image">
                        <div class="avatar">
                        @if(Auth::user()->profile()->first()->profile_pic != NULL)
                            <img class="round" width="40" height="40" alt="avatar" src="https://drive.google.com/uc?export=view&id={{ Auth::user()->profile()->first()->profile_pic }}">
                        @else
                            <img class="round" width="40" height="40" alt="avatar" avatar="{{ Auth::user() ? Auth::user()->name : 'Atlas' }}">
                        @endif
                        </div>
                    </div>
                </div>
                <h3>{{ Auth()->user()->name }}</h3>
                <h6 class="text-muted">{{ $speciality_id != NULL ? $speciality->name : '' }}</h6>
                <div class="badge badge-light-primary profile-badge">{{ Auth()->user()->role()->first()->name }}</div>
                <hr class="mb-2"/>
                <div class="d-flex flex-wrap" style="gap: 1em;">

                    @if($socials->facebook != NULL)
                    <a href="{{ $socials->facebook }}" target="_blanc">
                        <i data-feather='facebook' class="socials-link"></i>
                    </a>
                    @endif

                    @if($socials->instagram != NULL)
                    <a href="{{ $socials->instagram }}" target="_blanc">
                        <i data-feather='instagram' class="socials-link"></i>
                    </a>
                    @endif

                    @if($socials->youtube != NULL)
                    <a href="{{ $socials->youtube }}" target="_blanc">
                        <i data-feather='youtube' class="socials-link"></i>
                    </a>
                    @endif

                    @if($socials->twitter != NULL)
                    <a href="{{ $socials->twitter }}" target="_blanc">
                        <i data-feather='twitter' class="socials-link"></i>
                    </a>
                    @endif

                    @if($socials->linkedin != NULL)
                    <a href="{{ $socials->linkedin }}" target="_blanc">
                        <i data-feather='linkedin' class="socials-link"></i>
                    </a>
                    @endif

                    @if($socials->github != NULL)
                    <a href="{{ $socials->github }}" target="_blanc">
                        <i data-feather='github' class="socials-link"></i>
                    </a>
                    @endif
                        
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card card-profile">
            <div class="">
                <div class="d-flex flex-column text-left">
                    <div>
                        <span class="text-primary font-weight-bolder">Email :</span>
                        <span class="font-weight-lighter mb-0">{{ Auth()->user()->email }}</span>
                    </div>
                    <div>
                        <span class="text-primary font-weight-bolder">Phone :</span>
                        <span class="font-weight-lighter mb-0">{{ $profile->phone_number }}</span>
                    </div>
                    <div>
                        <span class="text-primary font-weight-bolder">Birth day :</span>
                        <span class="font-weight-lighter mb-0">{!! date('F j', strtotime($profile->birth_day)) !!}</span>
                        <span class="text-muted font-weight-lighter mb-0">{!! date('Y', strtotime($profile->birth_day)) !!}</span>
                    </div>
                    <div>
                        <span class="text-primary font-weight-bolder">Speciality :</span>
                        <span class="font-weight-lighter mb-0">{{ $speciality != NULL ? $speciality->name : '' }}</span>
                    </div>
                </div>
                <hr class="mb-2"/>
                <h4>Skills</h4>
                <div id="" class="d-flex">
                    @if(Auth()->user()->skills()->count() == 0)
                        <span>Empty, </span>
                        <a class="nav-link p-0 pl-1" id="account-skills" data-toggle="pill" href="#account-vertical-skills" aria-expanded="false">
                            <span class="font-weight-bold">Please select your skills </span>
                        </a>
                    @else
                        @foreach (Auth()->user()->skills()->get() as $skill)
                            <div class="badge badge-pill badge-<?php echo $color[rand(0,5)] ?> draggable">{{ $skill->name }}</div>
                        @endforeach
                    @endif
                </div>
                

            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <h4>Schedual</h4>
        @if($profile->schedual_pic)
        <!-- Button trigger modal -->
        <a type="button" class="" data-toggle="modal" data-target="#primary">
           <img src="https://drive.google.com/uc?export=view&id={{ $profile->schedual_pic }}" width="100%" height="100%">
        </a>
        
        <!-- Modal -->
        <div class="modal fade text-left modal-primary" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel160">My Schedual</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="https://drive.google.com/uc?export=view&id={{ $profile->schedual_pic }}" width="100%" height="100%">
                    </div>
                </div>
            </div>
        </div>
        @else
        <a class="nav-link" id="account-schedual" data-toggle="pill" href="#account-vertical-schedual" aria-expanded="false">
            <span class="font-weight-bold">Please upload your schedual </span>
        </a>
        @endif
    </div>
</div>
</div>

<style>
    .socials-link {
        width: 2em;
        height: 2em;
    }
</style>


<div class="d-inline-block">
    
</div>