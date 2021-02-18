<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class ProfileController extends Controller
{
    /**
     * Auth Middleware
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $profile = User::find(Auth::user()->id);
        $title = "Basic Info";

        return view('profile.basic')->with(compact('profile', 'title'));
    }

    /**
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        User::find(Auth::user()->id)->update($request->all());

        return redirect()->route('profile')
            ->with('success', 'Profile updated successfully');
    }
}
