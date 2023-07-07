@extends('layouts.employerApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('employer.dashboard')}}" class="link-dark">Dashboard</a></li>
                    <li class="breadcrumb-item">Job</li>
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
                    <form action="{{route('job.store')}}" method="post">
                        @csrf
                        <p class="fw-bold mb-1 fs-5">Job Details</p>
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
                            <label for="exampleFormControlInput2" class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="exampleFormControlInput2"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Employment Type</label>
                            <select class="form-select" name="employment_type" id="exampleFormControlInput3">
                                <option selected>Select option</option>
                                <option value="Full time">Full time</option>
                                <option value="Part time">Part time</option>
                                <option value="Internship">Internship</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Salary</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">RM</span>
                                <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" id="exampleFormControlInput4">
                                <span class="input-group-text">.00</span>
                            </div>
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput5" class="form-label">Mode</label>
                            <select class="form-select" name="mode" id="exampleFormControlInput5">
                                <option selected>Select option</option>
                                <option value="Remote">Remote</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="In-office">In-office</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput6" class="form-label">Experience</label>
                            <select class="form-select" name="experience" id="exampleFormControlInput6">
                                <option selected>Select option</option>
                                <option value="0 to 1 year">0 to 1 year</option>
                                <option value="1 to 3 years">1 to 3 years</option>
                                <option value="3 to 5 years">3 to 5 years</option>
                                <option value="5 to 10 years">5 to 10 years</option>
                                <option value="10+ years">10+ years</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput7" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="exampleFormControlInput7" placeholder="Shah Alam, Selangor">
                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <p class="fw-bold mb-1 fs-5">Company Details</p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput8" class="form-label">Name</label>
                            <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="exampleFormControlInput8">
                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput9" class="form-label">Website</label>
                            <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" id="exampleFormControlInput9">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <p class="fw-bold mb-1 fs-5">Application Details</p>
                        <div class="mb-3">
                            <label for="exampleFormControlInput10" class="form-label">URL</label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="exampleFormControlInput10">
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput11" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput11">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="employer_id" value="{{Auth::guard('employer')->user()->id}}">
                        <button type="submit" class="btn btn-dark">Submit</button>
                        <a href="{{route('employer.dashboard')}}" class="btn btn-link link-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection