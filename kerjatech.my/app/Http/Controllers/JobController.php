<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('employer');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'company' => 'required|string',
            'website' => 'required|url',
            'employment_type' => 'required|string',
            'salary' => 'required|numeric',
            'mode' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'url' => 'required|url',
            'email' => 'required|string',
        ]);

        try {
            Job::create([
                'title' => $request->title,
                'description' => $request->description,
                'company' => $request->company,
                'website' => $request->website,
                'employment_type' => $request->employment_type,
                'salary' => $request->salary,
                'mode' => $request->mode,
                'experience' => $request->experience,
                'location' => $request->location,
                'url' => $request->url,
                'email' => $request->email,
                'employer_id' => $request->employer_id,
            ]);

            return redirect()->back()->with('success', 'Job post successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['job'] = Job::findOrFail($id);
        return view('job.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['job'] = Job::findOrFail($id);
        return view('job.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'company' => 'required|string',
            'website' => 'required|url',
            'employment_type' => 'required|string',
            'salary' => 'required|numeric',
            'mode' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',
            'url' => 'required|url',
            'email' => 'required|string',
        ]);

        try {
            $job->update([
                'title' => $request->title,
                'description' => $request->description,
                'company' => $request->company,
                'website' => $request->website,
                'employment_type' => $request->employment_type,
                'salary' => $request->salary,
                'mode' => $request->mode,
                'experience' => $request->experience,
                'location' => $request->location,
                'url' => $request->url,
                'email' => $request->email,
                'employer_id' => $request->employer_id,
            ]);

            return redirect()->back()->with('success', 'Job updated successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->back();
    }
}
