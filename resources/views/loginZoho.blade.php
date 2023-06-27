@extends('layouts.master-without-nav')

@section('title', 'BoilerMaster') 

@section('css')
<!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/build/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/build/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
@endsection
@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to BoilerMaster.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ URL::asset ('/build/images/profile-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div class="auth-logo">
                            <a href="" class="auth-logo-light">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title bg-light">
                                        <img src="{{ URL::asset ('/build/images/logo.PNG') }}" alt="" width="110" height="85">
                                    </span>
                                </div>
                            </a>

                            <a href="" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title  bg-light">
                                        <img src="{{ URL::asset ('/build/images/logo.PNG') }}" alt="" width="80" height="70">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                        <form class="form-horizontal" method="POST" action="{{ route('zohologin') }}">
                            @csrf
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="username" placeholder="Enter your Zoho Mail" autocomplete="email" required>
                            </div>
                            <div class="mb-3">
                                <div class="float-end" hidden>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                    @endif
                                </div>
                                <label class="form-label">Password</label>
                                <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter your zoho mail password" aria-label="Password" aria-describedby="password-addon" required>
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>
                            <div class="form-check" hidden>
                                <input class="form-check-input" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <br>
                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                <div class="mt-5 text-center">
                                    <p>Or <a href="{{route('login')}}">login with BoilerMaster</a></p>
                                    <p>© <script>document.write(new Date().getFullYear())</script> BoilerMaster</p>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- owl.carousel js -->
<script src="{{ URL::asset('/build/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<!-- auth-2-carousel init -->
<script src="{{ URL::asset('/build/js/pages/auth-2-carousel.init.js') }}"></script>
@endsection
