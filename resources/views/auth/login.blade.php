@extends('auth.main')

@section('title')
    Login
@endsection

@section('bottom-js')
    <script src="../../../app-assets/js/scripts/pages/page-auth-login.js"></script>
@endsection


@section('content')
<div class="content-header row">
</div>
<div class="content-body">
    <div class="auth-wrapper auth-v1 px-2">
        <div class="auth-inner py-2">
            <!-- Login v1 -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="{{ route('home') }}" class="brand-logo">
                        <!-- logo -->
                        <h2 class="brand-text text-primary /*ml-1*/">Atlas</h2>
                    </a>

                    <h4 class="card-title mb-1">Welcome to Atlas! 👋</h4>
                    <p class="card-text mb-2">Please sign-in to your account and join us</p>

                    @if ($errors->any())
                    <div class="demo-spacing-0" >

                        <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                            <div class="alert-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info mr-50 align-middle">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="16" x2="12" y2="12"></line>
                                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                </svg>
                                    @foreach ($errors->all() as $error)
                                    <span> {{ $error }} </span>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    @endif



                    <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="form-group">
                            <label for="login-email" class="form-label">Email</label>
                            <input name="email" 
                                type="text" 
                                class="form-control {{ $errors->any() ? 'border-danger' : ''  }}" 
                                id="login-email"  
                                value="{{ old('email') }}" 
                                aria-describedby="login-email" 
                                tabindex="1" 
                                autofocus 
                                required
                            />
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <label for="login-password">Password</label>
                                <a href="{{ route('password.request') }}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input name="password" 
                                    type="password" 
                                    class="form-control form-control-merge {{ $errors->any() ? 'border-danger' : ''  }}" 
                                    id="login-password" 
                                    tabindex="2" 
                                    required
                                />
                                <div class="input-group-append">
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                            </div>
                        </div>

                        <!-- Remember me -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox ">
                                <input class="custom-control-input " type="checkbox" id="remember-me" tabindex="3" name="remember"/>
                                <label class="custom-control-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>

                        
                        <!-- Submit -->
                        <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                    </form>

                    <!-- New Member -->
                    <p class="text-center mt-2">
                        <span>New on our platform?</span>
                        <a href="{{ route('register') }}">
                            <span>Create an account</span>
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
            <!-- /Login v1 -->
        </div>
    </div>

</div>
@endsection