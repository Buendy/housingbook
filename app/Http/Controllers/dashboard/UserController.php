<?php

namespace App\Http\Controllers\dashboard;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        if($user->id == auth()->user()->id) {
            $this->validate($request,
                ['name' => 'required | min:3 | regex:/^[a-zA-Z ]*$/ | unique:apartments,name' ,
                    'last_name' => 'required | min:3 | max:300 | regex:/^[a-zA-Z ]*$/',
                    'email' => ['required', 'min:10', 'max:100', Rule::unique('users','email')->ignore($user->id)],
                    'address' => 'required',
                    'phone' => ['required', 'regex:/^[9|6|7|8][0-9]{8}$/']]);

            if($request->file('photo'))
            {
                $photo = Helper::uploadFile($request->file('photo'));
                $user->photo = $photo;
            }

            $user->fill($request->all());
            $user->save();

            return back()->with('success',__('profile.profileupdatedocorrectly'));
        } else {
            return redirect('/dashboard/'. auth()->user()->id . '/edit');
        }
    }

    public function telegram(User $user)
    {
        return view('dashboard.user.telegram',compact('user'));
    }

    public function telegramUpdate(User $user, Request $request)
    {
        if($user->id == auth()->user()->id)
        {
            $this->validate($request,User::$rulesTelegram);

            $user->fill($request->all());
            $user->save();

            return back()->with('success',__('profile.telegramupdatedcorrectly'));
        } else {
            return redirect('/dashboard/'. auth()->user()->id . '/telegram');
        }
    }

    public function password(User $user)
    {
        return view('dashboard.user.password',compact('user'));
    }

    public function passwordUpdate(User $user, Request $request)
    {
        if($user->id == auth()->user()->id)
        {
            $this->validate($request,User::$rulesPassword);

            $user->password = bcrypt($request->password);
            $user->save();

            return back()->with('success',__('profile.passwordupdatedcorrectly'));
        } else {
            return redirect('/dashboard/'. auth()->user()->id . '/password');
        }
    }
}
