<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest\LoginRequest;
use App\Http\Requests\UserRequest\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])){
            return redirect()->route('show_orders');
        }else{
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'password' => ['Email is not confirmed'],
            ]);
            throw $error;
        }
    }

    public function register(RegisterRequest $request)
    {

        $user  = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username
        ]);

        $email = $user->email;
        $id = $user->id;
        $data = array(
            'email' => $email,
            'id' => $id,
        );

        \Mail::send('mail',
            ["customer" => $data],
            function($message) use($email)
            {
                $message->from('rashidliseymur@gmail.com', 'Confirm');
                $message->to($email)->subject('Confirm Email');
            });

        return redirect()->back()->with('confirm_email', 'Please confirm your email');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login_page');
    }
    public function verify($id)
    {

        $user = User::where('id',$id)->first();

        if($user->active  == 1){

            return redirect()->route('login_page')->with('message', 'Your email already confirmed');

        }else{

            User::where('id',$id)->update(['active' => 1]);

            return redirect()->route('login_page')->with('message', 'Your email confirmed');

        }

    }
}
