@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-dark">Freelancer</a></li>
                    <li class="breadcrumb-item active" aria-current="page">#{{$freelance->id}} - {{$freelance->title}}</li>
                </ol>
            </nav>

            <div class="card bg-white p-3 mt-4">
                <div class="card-body">
                    @if (date('Y-m-d', strtotime($freelance->updated_at)) >= date('Y-m-d', strtotime($freelance->created_at)) && date('Y-m-d', strtotime($freelance->updated_at)) <= date('Y-m-d', strtotime($freelance->updated_at. ' + 7 days')))
                    <div class="mb-3">
                        <span class="badge text-bg-success">Actively looking</span>
                    </div>
                    @endif
                    <h5 class="card-title">{{$freelance->title}}</h5>
                    <p class="card-text mt-1">
                        <span>{{$freelance->profile}}</span>
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
                    <small class="text-secondary">Last updated {{date('d F Y', strtotime($freelance->updated_at))}}</small>
                    <div class="text-center mt-4">
                        <a href="{{route('dashboard')}}" class="btn btn-dark w-25">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection