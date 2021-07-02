<div role="tabpanel" class="tab-pane" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
    <!-- header media -->
    
    <!--/ header media -->

    <!-- form class="validate-form" -->
    <form class="mt-2" action="{{ route('profile.details') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="row flex-row-reverse">
                    <div class="media col-md-2 col-sm-12">
                        <a href="javascript:void(0);" class="mx-auto">
                            @if(Auth::user()->profile()->first()->profile_pic != NULL)
                            <img class="rounded" id="account-upload-img" width="80" height="80" alt="avatar" src="https://drive.google.com/uc?export=view&id={{ Auth::user()->profile()->first()->profile_pic }}">
                            @else
                            <img class="rounded" id="account-upload-img" width="80" height="80" alt="profile image" avatar="{{ Auth::user() ? Auth::user()->name : 'Atlas' }}">
                            @endif
                            <!-- upload and reset button -->
                            <div class="media-body mt-75" style="width: 100%;">
                                <label for="account-upload" class="btn btn-sm btn-primary" style="width: 100%;">Choose</label>
                                <input type="file" id="account-upload" hidden accept="image/*" name="image"/>
                            </div>
                        </a>
                    </div>
                    <div class="col-10 col-md-10 col-sm-12">
                    <div class="row">
                        <div class="col-12 mb-75">
                            <span class="text-primary">Email: </span>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        <div class="col-12 mb-75">
                            <span class="text-primary">Phone number: </span>
                            <span>{{ Auth::user()->profile->phone_number ? Auth::user()->profile->phone_number : 'not set yet' }}</span>
                        </div>
                        <div class="col-12 mb-75">
                            <span class="text-primary">Clubs joined: </span>
                            <span></span>
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
            <!-- Full Name -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-name">Full Name</label>
                    <input name="full-name" type="text" class="form-control" id="account-name" placeholder="Name" value="{{ Auth::user()->profile->full_name ? Auth::user()->profile->full_name : Auth::user()->name }}" />
                </div>
            </div>

            <!-- username -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-username">Username</label>
                    <input name="username" type="text" class="form-control" id="account-username" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" />
                </div>
            </div>

            <!-- phone number -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-phone">Phone</label>
                    <input name="phone-number" type="text" class="form-control" id="account-phone" placeholder="Phone number" value="{{ Auth::user()->profile->phone_number ? Auth::user()->profile->phone_number : '00 00 00 00 00' }}" name="phone" />
                </div>
            </div>

            <!-- email -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-birth-date">Email</label>
                    <input  type="email" class="form-control" placeholder="Your email" id="account-email" value="{{ Auth::user()->email }}" disabled/>
                </div>
            </div>

            <!-- birdthday -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="account-birth-date">Birth date</label>
                    <input name="birth-day" type="text" class="form-control flatpickr" placeholder="Birth date" id="account-birth-date" value="{{ Auth::user()->profile->birth_day }}" />
                </div>
            </div>

            <!-- gender -->
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label for="genderSelect">gender</label>
                    <select name="gender" class="form-control" id="genderSelect">
                        <option value="male">Mister</option>
                        <option value="female">Miss</option>
                    </select>
                </div>
            </div>

            <?php 
                $profile = Auth()->user()->profile()->first();
                if($profile->speciality()->first())
                {
                    $speciality_id = $profile->speciality()->first()->id;
                }
                else
                {
                    $speciality_id =NULL;
                }
            ?>
            <!-- speciality -->
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <label for="fieldSelect">University's field</label>
                    <select name="speciality" class="form-control" id="fieldSelect">
                        @if($speciality_id == NULL)
                            <option value="" selected>No Selected</option>

                        @endif
                        @foreach (\App\Models\Speciality::all() as $speciality)
                            <option value="{{ $speciality->id }}" {{ $speciality_id == $speciality->id ? 'selected="selected"' : '' }}
                            >{{ $speciality->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- descrtiption -->
            <div class="col-12">
                <div class="form-group">
                    <label for="accountTextarea">Bio</label>
                    <textarea name="description" class="form-control" id="accountTextarea" rows="4" placeholder="Your Bio data here..."></textarea>
                </div>
            </div>

            <div class="col-12 mt-75">
                <div class="alert alert-warning mb-50" role="alert">
                    <h4 class="alert-heading">Your email is not confirmed. Please check your inbox.</h4>
                    <div class="alert-body">
                        <a href="javascript: void(0);" class="alert-link">Resend confirmation</a>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
            </div>
        </div>
    </form>
    <!--/ form -->
</div>