<?php

namespace App\Http\Controllers\dashboard;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('dashboard.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        dd($request);
    }
}
