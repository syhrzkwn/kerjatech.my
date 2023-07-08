<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $freelances = DB::table('freelances')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('user.dashboard', compact('freelances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string',
        ]);

        try {
            $user->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
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
        $user = User::findOrFail($id);
        $request->validate([
            'email'   => 'required|email|max:255|unique:users',
        ]);

        try {
            $user->update([
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
        $user = User::findOrFail($id);
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user->update([
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
        $user = User::findOrFail($id);

        if($user->email == $request['delete_email'])
        {
            $user->delete();
            Auth::user()->logout();
            $request->session()->invalidate();
            return redirect()->route('login');
        }
        else
        {
            return redirect()->back()->with('error', 'Input does not match with your email.');
        }
    }
}
