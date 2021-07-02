<div class="tab-pane fade" id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
    <!-- form class="validate-form" -->
    <form  action="{{ route('profile.socials') }}" method="POST">
        @csrf
        <div class="row">
            <!-- social header -->
            <div class="col-12">
                <div class="d-flex align-items-center mb-2">
                    <i data-feather="link" class="font-medium-3"></i>
                    <h4 class="mb-0 ml-75">Social Links</h4>
                </div>
            </div>
            
            <?php $socials = json_decode(Auth()->user()->profile->socials); ?>
            

            @if($socials->instagram != NULL)
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='instagram'></i></span>
                        </div>
                        <input name="instagram" type="text" class="form-control" placeholder="Instagram" aria-label="Instagram" value="{{ $socials->instagram }}" >
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='instagram'></i></span>
                        </div>
                        <input name="instagram" type="text" class="form-control" placeholder="Instagram" aria-label="Instagram">
                    </div>
                </div>
            @endif   

            @if($socials->facebook != NULL)
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='facebook'></i></span>
                        </div>
                        <input name="facebook" type="text" class="form-control" placeholder="Facebook" aria-label="Facebook" value="{{ $socials->facebook }}" 
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='facebook'></i></span>
                        </div>
                        <input name="facebook" type="text" class="form-control" placeholder="Facebook" aria-label="Facebook">
                    </div>
                </div>
            @endif 


            @if($socials->youtube != NULL)
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='youtube'></i></span>
                        </div>
                        <input name="youtube" type="text" class="form-control" placeholder="Youtube" aria-label="Youtube" value="{{ $socials->youtube }}">
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='youtube'></i></span>
                        </div>
                        <input name="youtube" type="text" class="form-control" placeholder="Youtube" aria-label="Youtube">
                    </div>
                </div>
            @endif 


            @if($socials->twitter != NULL)
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='twitter'></i></span>
                        </div>
                        <input name="twitter" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter" value="{{ $socials->twitter }}" 
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='twitter'></i></span>
                        </div>
                        <input name="twitter" type="text" class="form-control" placeholder="Twitter" aria-label="Twitter">
                    </div>
                </div>
            @endif 


            @if($socials->linkedin != NULL)
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='linkedin'></i></span>
                        </div>
                        <input name="linkedin" type="text" class="form-control" placeholder="LinkedIn" aria-label="LinkedIn" value="{{ $socials->linkedin }}" 
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='linkedin'></i></span>
                        </div>
                        <input name="linkedin" type="text" class="form-control" placeholder="LinkedIn" aria-label="LinkedIn">
                    </div>
                </div>
            @endif 

            @if($socials->github != NULL)
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='github'></i></span>
                        </div>
                        <input name="github" type="text" class="form-control" placeholder="Github" aria-label="Github" value="{{ $socials->github }}" >
                    </div>
                </div>
            @else
                <div class="col-12 col-sm-6">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i data-feather='github'></i></span>
                        </div>
                        <input name="github"  type="text" class="form-control" placeholder="Github" aria-label="Github">
                    </div>
                </div>
            @endif 

            <!-- divider -->
            <div class="col-12">
                <hr class="my-2" />
            </div>

            <div class="col-12">
                <!-- submit and cancel button -->
                <input type="submit" class="btn btn-primary mr-1 mt-1">
            </div>
        </div>
    </form>
    <!--/ form -->
</div>