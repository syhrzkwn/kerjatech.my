@extends('layouts.employerApp')

@section('content')
<div class="container">
    <div class="row g-3">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card bg-white h-100">
                <div class="card-body">
                    <h1>Hi, Welcome {{Auth::guard('employer')->user()->fname}} {{Auth::guard('employer')->user()->lname}}!</h1>
                    <p>🏢 {{Auth::guard('employer')->user()->company}}</p>
                    <span class="badge text-bg-danger">Employer</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="card bg-white h-100">
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
            <div class="card bg-white h-100">
                <div class="card-body">
                    <h5 class="card-title">📢 Post Jobs</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{route('job.create')}}" class="btn btn-outline-dark">📌 Start posting a job</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <p>🗄️ Your listed jobs posting: {{count($jobs)}}</p>
    </div>
    @foreach($jobs as $job)

    <!-- Modal -->
    <div class="modal fade" id="{{$job->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete job confirmation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ⚠️ This action can be undone! Are you sure you want to delete job <span class="fw-bold">#{{$job->id}} - {{$job->title}}</span>? If yes, then click on the delete button.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('job.delete', $job->id) }}" method="post">
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
                        <h5 class="card-title">{{$job->title}}</h5>
                        <div class="dropdown">
                            <button class="btn btn-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('job.show', $job->id)}}">View</a></li>
                                <li><a class="dropdown-item" href="{{route('job.edit', $job->id)}}">Edit</a></li>
                                <hr class="my-0">
                                <li>
                                    <button type="button" class="btn btn-link text-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#{{$job->id}}">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="card-text mt-3">
                        <span>🏢  {{$job->company}}</span><br>
                        <span>📍 {{$job->location}}</span><br>
                        <span>👨🏻‍💻 {{$job->employment_type}} | {{$job->mode}}</span><br>
                        <span>💵 ~RM{{$job->salary}}</span>
                    </p>
                    <small class="text-secondary">Posted on {{date('d F Y', strtotime($job->created_at))}}</small>
                    @if (date('Y-m-d', strtotime($job->created_at)) == date('Y-m-d'))
                        <span class="badge text-bg-success ms-1">NEW</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection