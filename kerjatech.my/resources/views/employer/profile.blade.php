@extends('layouts.employerApp')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h1>Hi, Welcome {{Auth::guard('employer')->user()->fname}} {{Auth::guard('employer')->user()->lname}}!</h1>
                    <p>{{Auth::guard('employer')->user()->company}}</p>
                    <span class="badge rounded-pill text-bg-success">Employer</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">👨🏻‍💻 Profile</h5>
                    <p class="mb-1">{{Auth::guard('employer')->user()->fname}} {{Auth::guard('employer')->user()->lname}}</p>
                    <p class="mb-1">{{Auth::guard('employer')->user()->phone}}</p>
                    <p>{{Auth::guard('employer')->user()->email}}</p>
                    <a href="{{route('employer.edit', Auth::guard('employer')->user()->id)}}" class="btn btn-outline-dark">Edit</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">📢 Post Jobs</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-outline-dark">Let's go!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <p>Your listed jobs posting</p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">📢 Post Jobs</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-outline-dark">Let's go!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection