@extends('layouts.employerApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('employer.dashboard')}}" class="link-dark">Dashboard</a></li>
                    <li class="breadcrumb-item">Job</li>
                    <li class="breadcrumb-item active" aria-current="page">#{{$job->id}} - {{$job->title}}</li>
                </ol>
            </nav>

            <div class="card bg-white mb-3">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text mb-2">{{$job->company}}</p>
                            @if (date('Y-m-d', strtotime($job->created_at)) == date('Y-m-d'))
                                <span class="badge text-bg-success">NEW</span>
                            @endif
                        </div>
                        <h5 class="card-title">{{$job->title}}</h5>
                        <p class="card-text mt-3">
                            <span>📍 {{$job->location}}</span><br>
                            <span>👨🏻‍💻 {{$job->employment_type}} | {{$job->mode}}</span><br>
                            <span>💵 ~RM{{$job->salary}}</span>
                        </p>
                        <small class="text-secondary">Posted on {{date('d F Y', strtotime($job->created_at))}}</small>
                        <hr>
                        <p class="card-text mt-4">
                            <h6>Experiences</h6>
                            <span>{{$job->experience}}</span>
                        </p>
                        <p class="card-text mt-4">
                            <h6>Job Description</h6>
                            <span>{{$job->description}}</span>
                        </p>
                        <p class="card-text mt-4">
                            <h6>Contacts</h6>
                            <span>🌐 <a href="{{$job->website}}" target="_blank">{{$job->company}}</a> | 📩 <a href="mailto:{{$job->email}}">{{$job->email}}</a></span>
                        </p>
                        <div class="text-center mt-4">
                            <a href="{{route('employer.dashboard')}}" class="btn btn-dark w-25">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection