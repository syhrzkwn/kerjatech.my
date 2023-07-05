@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h1>Hi, Welcome {{Auth::user()->fname}} {{Auth::user()->lname}}!</h1>
                    <span class="badge rounded-pill text-bg-primary mt-2">User</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">👨🏻‍💻 Profile</h5>
                    <p class="mb-1">{{Auth::user()->fname}} {{Auth::user()->lname}}</p>
                    <p class="mb-1">{{Auth::user()->phone}}</p>
                    <p>{{Auth::user()->email}}</p>
                    <a href="{{route('profile.edit', Auth::user()->id)}}" class="btn btn-outline-dark">Edit</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">🏃🏻‍♂️ Jom Freelance</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-outline-dark">Let's go!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <p>Your listed freelance posting</p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">🏃🏻‍♂️ Jom Freelance</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-outline-dark">Let's go!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
