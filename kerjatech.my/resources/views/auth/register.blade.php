@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card p-5 my-5 bg-white">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="h3 mb-3 fw-bold">Register</h1>

                    <div class="row g-2 mb-4">
                        <div class="col">
                            <a class="btn btn-dark w-100" href="{{route('register')}}">👨🏻‍💻 User</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-outline-dark w-100" href="{{route('employer.register')}}">🕵🏻‍♀️ Employer</a>
                        </div>
                    </div>

                    <div class="row row-cols-md-2 g-2">
                        <div class="form-floating mb-2">
                            <input id="fname" type="text" id="floatingInput1" placeholder="Syahir" class="form-control bg-light @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname">
                            <label for="floatingInput1">First Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input id="lname" type="text" id="floatingInput2" placeholder="Zakwan" class="form-control bg-light @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname">
                            <label for="floatingInput2">Last Name</label>
                        </div>
                    </div>

                    <div class="form-floating mb-2">
                        <input id="phone" type="phone" id="floatingInput3" placeholder="0123456789" class="form-control bg-light @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                        <label for="floatingInput3">Phone</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input id="email" type="email" id="floatingInput4" placeholder="name@example.com" class="form-control bg-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="floatingInput4">Email Address</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input id="password" type="password" id="floatingPassword1" placeholder="Password" class="form-control bg-light @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="floatingPassword1">Password</label>
                    </div>

                    <div class="form-floating mb-4">
                        <input id="password-confirm" type="password" class="form-control bg-light" name="password_confirmation" id="floatingPassword2" placeholder="Confirm Password" required autocomplete="new-password">
                        <label for="floatingPassword2">Confirm Password</label>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger pb-0 mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button class="w-100 btn btn-lg btn-dark" type="submit">Register</button>
                </form>
                <p class="mt-4 mb-0">Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
