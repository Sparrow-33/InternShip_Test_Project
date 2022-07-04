<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //create user
    public function store(Request $request){

         $formFields = $request->validate(
            [
                'name' => 'required|min:3|max:15',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|max:255|confirmed',
            ]);

        //hash
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        //login
        auth()->login($user);
        return redirect('/');

        

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->save();
        // return redirect('/');
    }

    //login
    public function login(Request $request){
        $formFields = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:255',
            ]);

        if(auth()->attempt($formFields)){
            return redirect('/');
        }
        return redirect('/login');
    }

    //show all users except the current user
    public function index(){
        $users = User::all();
        $currentUser = auth()->user();
        $users = $users->except($currentUser->id);
        return view('user/displayUsers', [
            'users' => $users,
        ]);
    }

    //update user
    public function update(Request $request, User $user){
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/');
    }

    //delete a user
    public function destroy(User $user){
        $user->delete();
        return redirect('/');
    }

    //logout
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
