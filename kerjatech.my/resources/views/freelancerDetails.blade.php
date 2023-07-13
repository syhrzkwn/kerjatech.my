@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @foreach($freelances as $freelance)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('freelancer')}}" class="link-dark">Freelancer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">#{{$freelance->id}} - {{$freelance->title}}</li>
                </ol>
            </nav>

            <div class="card p-3 mt-4 bg-white">
                <div class="card-body">
                    @if (date('Y-m-d') <= date('Y-m-d', strtotime($freelance->created_at. ' + 7 days')))
                        <div class="mb-3">
                            <span class="badge text-bg-success">Actively looking</span>
                        </div>
                    @endif
                    <h5 class="card-title">{{$freelance->title}}</h5>
                    <p class="card-text mt-1">
                        <span>{{$freelance->profile}}</span>
                        <div class="mt-1 mb-4">
                            <a href="mailto:{{$freelance->email}}" target="_blank" class="btn btn-outline-dark">💼 Contact Developer</a>
                        </div>
                        <span>
                            <p class="fw-bold mb-0">Available date</p>
                            <p>{{date('d F Y', strtotime($freelance->available_date))}}</p>
                        </span>
                        <span>
                            <p class="fw-bold mb-0">Available in</p>
                            <p>{{$freelance->available_in}}</p>
                        </span>
                        <span>
                            <p class="fw-bold mb-0">Looking for</p>
                            <p>{{$freelance->looking_for}}</p>
                        </span>
                        <span>
                            <p class="fw-bold mb-0">Preferred position</p>
                            <p>{{$freelance->preferred_position}}</p>
                        </span>
                        <span>
                            <p class="fw-bold mb-0">Interested in role as</p>
                            <p>{{$freelance->interested_role}}</p>
                        </span>
                        <span>
                            <p class="fw-bold mb-0">Work arrangements</p>
                            <p>{{$freelance->mode}}</p>
                        </span>
                        <span>
                            <p class="fw-bold mb-0">Portfolio</p>
                            <a href="{{$freelance->url}}" target="_blank">{{$freelance->url}}</a>
                        </span>
                    </p>
                    <small class="text-secondary text-end">Last updated {{date('d F Y', strtotime($freelance->updated_at))}}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection