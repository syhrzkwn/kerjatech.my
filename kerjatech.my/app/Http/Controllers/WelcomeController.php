<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')
        ->orderBy('jobs.created_at', 'desc')
        ->get();
        return view('welcome', compact('jobs'));
    }

    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobDetails', compact('job'));
    }
}
