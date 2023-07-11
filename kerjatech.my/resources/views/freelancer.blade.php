@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 text-center">
        <h1>Hire Developers in <span class="text-decoration-underline">KerjaTech</span></h1>
        <p class="text-secondary">Why wait for candidates to apply? Connect with them through KerjaTech!</p>
    </div>
    <div class="text-center mt-4 mb-5">
        <p class="text-secondary mb-2">Are you a developer?</p>
        <a href="{{route('register')}}" class="btn btn-dark">🚀 Start your freelance today</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
        @foreach($freelances as $freelance)
        <div class="col">
            <a href="{{route('freelancer.details', $freelance->id)}}" class="text-decoration-none">
                <div class="card bg-white p-2 h-100">
                    <div class="card-body">
                        <div class="card-text">
                            @if (date('Y-m-d') <= date('Y-m-d', strtotime($freelance->created_at. ' + 7 days')))
                                <span class="badge text-bg-success mb-3">Actively looking</span>
                            @endif
                            <h6 class="fw-bold">{{$freelance->title}}</h6>
                            <p>{{$freelance->profile}}</p>
                            <small class="text-secondary">Last updated {{date('d F Y', strtotime($freelance->updated_at))}}</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection