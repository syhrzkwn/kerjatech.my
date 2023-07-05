@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4 text-center">
        <h1>Hire Developers in <span class="text-decoration-underline">KerjaTech</span></h1>
        <p class="text-secondary">Why wait for candidates to apply? Connect with them through KerjaTech!</p>
    </div>
    <div class="text-center mt-4 mb-5">
        <p class="text-secondary mb-1">Are you a developer?</p>
        <a href="{{route('register')}}" class="btn btn-dark">🚀 Start your freelance today</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-3">
        <div class="col">
            <a href="#" class="text-decoration-none">
                <div class="card text-bg-light p-2 h-100">
                    <div class="card-body">
                        <div class="card-text">
                            <span class="badge text-bg-success mb-3">Actively looking</span>
                            <h6 class="fw-bold">Web developer with 3+ years of experience | Open for freelance</h6>
                            <p> I'm a web developer with a passion for creating beautiful and functional websites. I have 3+ years of work experience and my go-to stack is LEMP [Linux, NGINX, MySQL, PHP (Laravel | CodeIgniter)], but I can work with other technologies as well and constantly eager to learn new skills. </p>
                            <p class="text-secondary mb-0">Last updated 2 days ago</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection