<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
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
        $id = Auth::guard('employer')->user()->id;
        $jobs = DB::table('jobs')->where('employer_id', $id)->orderBy('created_at', 'desc')->get();
        return view('employer.dashboard', compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['employer'] = Employer::findOrFail($id);
        return view('employer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request, string $id)
    {
        $employer = Employer::findOrFail($id);
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'company' => 'required|string',
            'phone' => 'required|string',
        ]);

        try {
            $employer->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'company' => $request->company,
                'phone' => $request->phone,
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function emailUpdate(Request $request, string $id)
    {
        $employer = Employer::findOrFail($id);
        $request->validate([
            'email'   => 'required|email|max:255|unique:employers',
        ]);

        try {
            $employer->update([
                'email' => $request->email,
            ]);

            return redirect()->back()->with('success', 'Email updated successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function passwordUpdate(Request $request, string $id)
    {
        $employer = Employer::findOrFail($id);
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $employer->update([
                'password' => Hash::make($request['password']),
            ]);

            return redirect()->back()->with('success', 'Password updated successfully.');

        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. ' .$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request, string $id)
    {
        $employer = Employer::findOrFail($id);

        if($employer->email == $request['delete_email'])
        {
            $employer->delete();
            Auth::guard('employer')->logout();
            $request->session()->invalidate();
            return redirect()->route('employer.login');
        }
        else
        {
            return redirect()->back()->with('error', 'Input does not match with your email.');
        }
    }
}
