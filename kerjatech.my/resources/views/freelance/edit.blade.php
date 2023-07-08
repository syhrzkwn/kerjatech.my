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
                    <form action="{{route('freelance.update', $freelance->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <p class="fw-bold mb-1 fs-5">Freelance Details</p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                            <input type="text" name="title" value="{{ (old('title')) ? old('title') : $freelance->title }}" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput9" class="form-label">Profile</label>
                            <textarea name="profile" value="{{ (old('profile')) ? old('profile') : $freelance->profile }}" class="form-control @error('profile') is-invalid @enderror" id="exampleFormControlInput9" placeholder="About yourself and your experiences...">{{ (old('profile')) ? old('profile') : $freelance->profile }}</textarea>
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Available date</label>
                            <input type="date" min="{{date('Y-m-d')}}" value="{{ (old('available_date')) ? old('available_date') : $freelance->available_date }}" name="available_date" class="form-control @error('available_date') is-invalid @enderror" id="exampleFormControlInput2">
                            @error('available_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Available in</label>
                            <input type="text" name="available_in" value="{{ (old('available_in')) ? old('available_in') : $freelance->available_in }}" class="form-control @error('available_in') is-invalid @enderror" id="exampleFormControlInput3" placeholder="Kuala Lumpur, Petaling Jaya, Johor Bahru">
                            @error('available_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Looking for</label>
                            <select class="form-select" name="looking_for" id="exampleFormControlInput4">
                                <option>Select option</option>
                                <option value="Full time" {{ $freelance->looking_for == "Full time" ? "selected" : "" }}>Full time</option>
                                <option value="Part time" {{ $freelance->looking_for == "Part time" ? "selected" : "" }}>Part time</option>
                                <option value="Internship" {{ $freelance->looking_for == "Internship" ? "selected" : "" }}>Internship</option>
                                <option value="Contract" {{ $freelance->looking_for == "Contract" ? "selected" : "" }}>Contract</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Preferred position</label>
                            <input type="text" name="preferred_position" value="{{ (old('preferred_position')) ? old('preferred_position') : $freelance->preferred_position }}" class="form-control @error('preferred_position') is-invalid @enderror" id="exampleFormControlInput5" placeholder="Software Engineer, Frontend Developer, Fullstack">
                            @error('preferred_position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput6" class="form-label">Interested in role as</label>
                            <select class="form-select" name="interested_role" id="exampleFormControlInput6">
                                <option>Select option</option>
                                <option value="Junior" {{ $freelance->interested_role == "Junior" ? "selected" : "" }}>Junior</option>
                                <option value="Senior" {{ $freelance->interested_role == "Senior" ? "selected" : "" }}>Senior</option>
                                <option value="Entry-Level" {{ $freelance->interested_role == "Entry-Level" ? "selected" : "" }}>Entry-Level</option>
                                <option value="Mid-Level" {{ $freelance->interested_role == "Mid-Level" ? "selected" : "" }}>Mid-Level</option>
                                <option value="High-Level" {{ $freelance->interested_role == "High-Level" ? "selected" : "" }}>High-Level</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput7" class="form-label">Work arrangements</label>
                            <select class="form-select" name="mode" id="exampleFormControlInput7">
                                <option>Select option</option>
                                <option value="Remote" {{ $freelance->mode == "Remote" ? "selected" : "" }}>Remote</option>
                                <option value="Hybrid" {{ $freelance->mode == "Hybrid" ? "selected" : "" }}>Hybrid</option>
                                <option value="In-office" {{ $freelance->mode == "In-office" ? "selected" : "" }}>In-office</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput8" class="form-label">Portfolio URL</label>
                            <input type="text" name="url" value="{{ (old('url')) ? old('url') : $freelance->url }}" class="form-control @error('url') is-invalid @enderror" id="exampleFormControlInput8">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <button type="submit" class="btn btn-dark">Edit</button>
                        <a href="{{route('dashboard')}}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection