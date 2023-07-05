@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-4 mb-5 text-center">
        <h1>Find <span class="text-decoration-underline">KerjaTech</span> in Malaysia 🇲🇾</h1>
        <p class="text-secondary">Description</p>
    </div>
    <p class="fw-bold fs-5 mb-1">1 positions available ✅</p>
    <p class="text-secondary">⌛ Last updated on 1 July 2023</p>
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
        <div class="col">
            <div class="card text-bg-light h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text mb-2">HeiTech Padu Berhad</p>
                        <span class="badge text-bg-success">NEW</span>
                    </div>
                    <h5 class="card-title">Software Engineer</h5>
                    <p class="card-text mt-3">
                        <span>📍 Kuala Lumpur</span><br>
                        <span>👨🏻‍💻 Full time | In-office</span><br>
                        <span>💵 ~RM4,000</span>
                    </p>
                    <small class="text-secondary">Posted on 1 July 2023</small>
                    <a href="#" class="btn btn-outline-dark mt-3 w-100">✨ Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection