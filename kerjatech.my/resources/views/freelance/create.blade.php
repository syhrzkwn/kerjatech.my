@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="link-dark">Dashboard</a></li>
                    <li class="breadcrumb-item">Freelance</li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                    <form action="{{route('freelance.store')}}" method="post">
                        @csrf
                        <p class="fw-bold mb-1 fs-5">Freelance Details</p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput9" class="form-label">Profile</label>
                            <textarea name="profile" class="form-control @error('profile') is-invalid @enderror" id="exampleFormControlInput9" placeholder="About yourself and your experiences..."></textarea>
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Available date</label>
                            <input type="date" min="{{date('Y-m-d')}}" name="available_date" class="form-control @error('available_date') is-invalid @enderror" id="exampleFormControlInput2">
                            @error('available_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Available in</label>
                            <input type="text" name="available_in" class="form-control @error('available_in') is-invalid @enderror" id="exampleFormControlInput3" placeholder="Kuala Lumpur, Petaling Jaya, Johor Bahru">
                            @error('available_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Looking for</label>
                            <select class="form-select" name="looking_for" id="exampleFormControlInput4">
                                <option selected>Select option</option>
                                <option value="Full time">Full time</option>
                                <option value="Part time">Part time</option>
                                <option value="Internship">Internship</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Preferred position</label>
                            <input type="text" name="preferred_position" class="form-control @error('preferred_position') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Software Engineer, Frontend Developer, Fullstack">
                            @error('preferred_position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput6" class="form-label">Interested in role as</label>
                            <select class="form-select" name="interested_role" id="exampleFormControlInput6">
                                <option selected>Select option</option>
                                <option value="Junior">Junior</option>
                                <option value="Senior">Senior</option>
                                <option value="Entry-Level">Entry-Level</option>
                                <option value="Mid-Level">Mid-Level</option>
                                <option value="High-Level">High-Level</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput7" class="form-label">Work arrangements</label>
                            <select class="form-select" name="mode" id="exampleFormControlInput7">
                                <option selected>Select option</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="In-office">In-office</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput8" class="form-label">Portfolio URL</label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="exampleFormControlInput8">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-dark">Submit</button>
                        <a href="{{route('dashboard')}}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection