@extends('auth.main')

@section('title')
    Register
@endsection

@section('bottom-js')
    <script src="../../../app-assets/js/scripts/pages/page-auth-register.js"></script>
@endsection


@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Register v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="{{ route('home') }}" class="brand-logo">
                        <!-- logo -->
                        <h2 class="brand-text text-primary /*ml-1*/">Atlas</h2>
                    </a>

                    <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
                    <p class="card-text mb-2">Make your next steps impact !</p>

                    
                    @if (count($errors) >= 2)
                        <div class="demo-spacing-0" >
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mr-50 align-middle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg>
                                    <span>The email has already been taken.</span>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if (count($errors) == 1)
                        <div class="demo-spacing-0" >
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <div class="alert-body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mr-50 align-middle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg>
                                    <span>The password confirmation does not match.</span>
                                </div>
                            </div>
                        </div>
                    @endif



                    <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
                        @csrf

                        <!-- Username -->
                        <div class="form-group">
                            <label for="register-username" class="form-label">Username</label>
                            <input type="text" 
                                    class="form-control" 
                                    id="register-username" 
                                    value="{{ old('name') }}"
                                    name="name" 
                                    aria-describedby="register-username" 
                                    tabindex="1" 
                                    autofocus 
                                    required
                            />
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="register-email" class="form-label">Email</label>
                            <input type="text" 
                                    class="form-control {{ count($errors) >= 2 ? 'border-danger' : ''  }}" 
                                    id="register-email" 
                                    value="{{ old('email') }}"
                                    name="email" 
                                    aria-describedby="register-email" 
                                    tabindex="2" 
                                    required
                            />
                        </div>
                        

                        <!-- Password -->
                        <div class="form-group">
                            <label for="register-password " class="form-label">Password</label>

                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" 
                                        class="form-control form-control-merge {{ count($errors) == 1 ? 'border-danger' : ''  }}" 
                                        id="register-password" 
                                        name="password" 
                                        aria-describedby="register-password" 
                                        tabindex="3" 
                                        required
                                />

                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>


                        <!-- Password Confirmation -->
                        <div class="form-group">
                            <label for="register-password" class="form-label">Confirm Password</label>

                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" 
                                        class="form-control form-control-merge  {{ count($errors) == 1 ? 'border-danger' : ''  }}" 
                                        id="register-password" 
                                        name="password_confirmation" 
                                        aria-describedby="register-password" 
                                        tabindex="3" 
                                        required
                                />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>

                        <!--
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="register-privacy-policy" tabindex="4" />
                                <label class="custom-control-label" for="register-privacy-policy">
                                    I agree to <a href="javascript:void(0);">privacy policy & terms</a>
                                </label>
                            </div>
                        </div>
                        -->
                        <button class="btn btn-primary btn-block" tabindex="5">Sign up</button>
                    </form>

                    <p class="text-center mt-2">
                        <span>Already have an account?</span>
                        <a href="{{ route('login') }}">
                            <span>Sign in instead</span>
                        </a>
                    </p>

                    <!-- 
                    <div class="divider my-2">
                        <div class="divider-text">or</div>
                    </div>

                    <div class="auth-footer-btn d-flex justify-content-center">
                        <a href="javascript:void(0)" class="btn btn-facebook">
                            <i data-feather="facebook"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-twitter white">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-google">
                            <i data-feather="mail"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-github">
                            <i data-feather="github"></i>
                        </a>
                    </div>
                    -->
                </div>
            </div>
            <!-- /Register v1 -->
        </div>
    </div>

</div>

@endsection
