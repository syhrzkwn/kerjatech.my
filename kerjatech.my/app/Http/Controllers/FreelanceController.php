<?php

namespace App\Http\Controllers;

use App\Models\Freelance;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'showOutside']);
    }

    public function index()
    {
        $freelances = DB::table('freelances')
        ->orderBy('freelances.created_at', 'desc')
        ->get();
        return view('freelancer', compact('freelances'));
    }

    public function showOutside(string $id)
    {
        $freelances = DB::table('freelances')
        ->join('users', 'freelances.user_id', '=', 'users.id')
        ->select('freelances.*', 'users.email')
        ->where('freelances.id', $id)
        ->get();
        return view('freelancerDetails', compact('freelances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('freelance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'profile' => 'required|string',
            'available_date' => 'required|date',
            'available_in' => 'required|string',
            'looking_for' => 'required|string',
            'preferred_position' => 'required|string',
            'interested_role' => 'required|string',
            'mode' => 'required|string',
            'url' => 'required|url',
        ]);

        try {
            Freelance::create([
                'title' => $request->title,
                'profile' => $request->profile,
                'available_date' => $request->available_date,
                'available_in' => $request->available_in,
                'looking_for' => $request->looking_for,
                'preferred_position' => $request->preferred_position,
                'interested_role' => $request->interested_role,
                'mode' => $request->mode,
                'url' => $request->url,
                'user_id' => $request->user_id,
            ]);

            return redirect()->back()->with('success', 'Freelance post successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['freelance'] = Freelance::findOrFail($id);
        return view('freelance.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['freelance'] = Freelance::findOrFail($id);
        return view('freelance.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $freelance = Freelance::findOrFail($id);
        $request->validate([
            'title' => 'required|string',
            'profile' => 'required|string',
            'available_date' => 'required|date',
            'available_in' => 'required|string',
            'looking_for' => 'required|string',
            'preferred_position' => 'required|string',
            'interested_role' => 'required|string',
            'mode' => 'required|string',
            'url' => 'required|url',
        ]);

        try {
            $freelance->update([
                'title' => $request->title,
                'profile' => $request->profile,
                'available_date' => $request->available_date,
                'available_in' => $request->available_in,
                'looking_for' => $request->looking_for,
                'preferred_position' => $request->preferred_position,
                'interested_role' => $request->interested_role,
                'mode' => $request->mode,
                'url' => $request->url,
                'user_id' => $request->user_id,
            ]);

            return redirect()->back()->with('success', 'Freelance post updated successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $freelance = Freelance::findOrFail($id);
        $freelance->delete();
        return redirect()->back();
    }
}
