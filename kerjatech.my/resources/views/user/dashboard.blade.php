@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card bg-white h-100">
                <div class="card-body">
                    <h1>Hi, Welcome {{Auth::user()->fname}} {{Auth::user()->lname}}!</h1>
                    <span class="badge text-bg-primary mt-3">Freelancer</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card bg-white h-100">
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
            <div class="card bg-white h-100">
                <div class="card-body">
                    <h5 class="card-title">🚀 Jom Freelance</h5>
                    <p class="card-text">Be your own boss, keep your hours flexible, and earn a living your own way. Start advertising yourself now at KerjaTech!</p>
                    <a href="{{route('freelance.create')}}" class="btn btn-outline-dark">🏃🏻‍♂️ Let's go!</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <p>🗄️ Your listed freelance posting: {{count($freelances)}}</p>
    </div>
    @foreach($freelances as $freelance)

    <!-- Modal -->
    <div class="modal fade" id="{{$freelance->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete job confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ⚠️ This action can be undone! Are you sure you want to delete job <span class="fw-bold">#{{$freelance->id}} - {{$freelance->title}}</span>? If yes, then click on the delete button.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{route('freelance.delete', $freelance->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{$freelance->title}}</h5>
                        <div class="dropdown">
                            <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('freelance.show', $freelance->id)}}">View</a></li>
                                <li><a class="dropdown-item" href="{{route('freelance.edit', $freelance->id)}}">Edit</a></li>
                                <hr class="my-0">
                                <li>
                                    <button type="button" class="btn btn-link text-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#{{$freelance->id}}">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="card-text">
                        <span>{{$freelance->profile}}</span>
                    </p>
                    <small class="text-secondary">Last updated {{date('d F Y', strtotime($freelance->updated_at))}}</small>
                    @if (date('Y-m-d', strtotime($freelance->updated_at)) >= date('Y-m-d', strtotime($freelance->created_at)) && date('Y-m-d', strtotime($freelance->updated_at)) <= date('Y-m-d', strtotime($freelance->updated_at. ' + 7 days')))
                        <span class="badge text-bg-success ms-1">Actively looking</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
