@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4 mb-5 text-center">
        <h1>Find <span class="text-decoration-underline">KerjaTech</span> in Malaysia 🇲🇾</h1>
        <p class="text-secondary">
            Find available vacancies specifically for IT tech jobs across Malaysia.
        </p>
    </div>

    <p class="fw-bold fs-5 mb-1">{{count($jobs)}} positions available ✅</p>
    <p class="text-secondary">⌛ Last updated on {{date('d F Y')}}</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-4">
        @foreach($jobs as $job)
        <div class="col">
            <div class="card bg-white h-100">
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
                    <a href="{{route('job.details', $job->id)}}" class="btn btn-outline-dark mt-3 w-100">✨ Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection