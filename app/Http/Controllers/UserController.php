<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registration()
    {
        $title = 'Registration';
        return view('user/register', compact('title'));
    }

    public function storeReg(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
        ]);

        if($request->hasFile('avatar')) {
            $folderName = date('Y-m-d');
            //сохраняем картинку в папку "images/{$folderName}" в 'storage/public'
            $avatar = $request->file('avatar')->store("images/{$folderName}");
        }

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            //хешируем пароль
            'password' => Hash::make($request->password),
            'avatar' => $avatar ?? null, //$avatar ? $avatar : nul
        ]);

        session()->flash('success', 'Successful registration');

        Auth::login($user);
        return redirect()->home();
    }

    public function loginForm()
    {
        $title = 'Authorization';
        return view('user/login', compact('title'));
    }

    public function storeLog(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->home();
        }

        //возвращаемся на предыдущую страницу
        return  redirect()->back()->with('error', 'Incorrect login or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
