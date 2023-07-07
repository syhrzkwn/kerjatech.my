@extends('layouts.employerApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('employer.dashboard')}}" class="link-dark">Dashboard</a></li>
                    <li class="breadcrumb-item">{{$employer->fname}} {{$employer->lname}}</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span>{{session('success')}}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card bg-white mb-3">
                <div class="card-body">
                    <form action="{{route('employer.profile.update', $employer->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row row-cols-md-2 g-2">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                <input type="text" name="fname" value="{{ (old('fname')) ? old('fname') : $employer->fname }}" class="form-control @error('fname') is-invalid @enderror" id="exampleFormControlInput1">
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Last Name</label>
                                <input type="text" name="lname" value="{{ (old('lname')) ? old('lname') : $employer->lname }}" class="form-control @error('lname') is-invalid @enderror" id="exampleFormControlInput2">
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Phone</label>
                            <input type="number" name="phone" value="{{ (old('phone')) ? old('phone') : $employer->phone }}" class="form-control @error('phone') is-invalid @enderror" id="exampleFormControlInput3">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput8" class="form-label">Company</label>
                            <input type="text" name="company" value="{{ (old('company')) ? old('company') : $employer->company }}" class="form-control @error('company') is-invalid @enderror" id="exampleFormControlInput8">
                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Edit Profile</button>
                    </form>
                </div>
            </div>
            <div class="card bg-white mb-3">
                <div class="card-body">
                    <form action="{{route('employer.email.update', $employer->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ (old('email')) ? old('email') : $employer->email }}" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput4">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Change Email</button>
                    </form>
                </div>
            </div>
            <div class="card bg-white mb-3">
                <div class="card-body">
                    <form action="{{route('employer.password.update', $employer->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput5">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput6" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput6">
                        </div>
                        <button type="submit" class="btn btn-dark">Change Password</button>
                    </form>
                </div>
            </div>
            <div class="card bg-white">
                <div class="card-body">
                    <form action="{{route('delete.employer', $employer->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <div class="mb-3">
                            <label for="exampleFormControlInput7" class="form-label fw-bold">Danger Zone</label>
                            <p>This action cannot be undone. This will permanently delete your account. Please type <strong>{{$employer->email}}</strong> to confirm.</p>
                            <input type="text" name="delete_email" class="form-control @if(session('error')) is-invalid @endif" id="exampleFormControlInput7">
                            @if(session('error'))
                                <small class="text-danger fw-bold">{{session('error')}}</small>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection