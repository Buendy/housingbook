<?php

namespace App\Http\Controllers\dashboard;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','verified']);
    }

    public function show(Request $request,User $user)
    {
        if($request->ajax()){
            $view = view('dashboard.user.show', compact('user'))->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
    }

    public function edit(Request $request)
    {
        return view('dashboard.user.edit')->render();
    }

    public function update(User $user, Request $request)
    {
        if($user->id == auth()->user()->id) {
            $this->validate($request,
                ['name' => 'required | min:3 | regex:/^[a-zA-Z ]*$/ | unique:apartments,name' ,
                    'last_name' => 'required | min:3 | max:300 | regex:/^[a-zA-Záéíóú ]*$/',
                    'email' => ['required', 'min:10', 'max:100', Rule::unique('users','email')->ignore($user->id)],
                    'address' => 'required',
                    'phone' => ['required', 'regex:/^[9|6|7|8][0-9]{8}$/']]);

            if($request->file('photo'))
            {
                if(Helper::validateFile($request->file('photo')) == false){
                    session()->flash('error', 'apartments.photos_extension');
                    return back();
                }else{
                    $photo = Helper::uploadFile($request->file('photo'));
                    $user->photo = $photo;
                }
            }

            $user->fill($request->all());
            $user->save();

            return back()->with('success',__('profile.profileupdatedocorrectly'));
        } else {
            return redirect('/dashboard/'. auth()->user()->id . '/edit');
        }
    }

    public function telegram(Request $request)
    {
        return view('dashboard.user.telegram')->render();
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

    public function password(Request $request)
    {
        if($request->ajax()){
            $view = view('dashboard.user.password')->render();

            return response()->json(['html'=>$view]);

        } else {
            return back();
        }
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

    public function tutorial()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf = Facade::loadView('pdf.tutorial');
        return $pdf->stream();
    }
}
