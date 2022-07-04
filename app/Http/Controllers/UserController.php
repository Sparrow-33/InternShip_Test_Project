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

    }

    //show login form
    public function showLogin(){
        return view('auth/login');
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

        

        // dd($request->email);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('user/displayUsers');
    }


   //show add user
    public function showAddUser(){
        return view('user/addUser');
    }


    //add user
    public function addUser(Request $request){

        $formFields = $request->validate(
           [
               'name' => 'required|min:3|max:15',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:6|max:255|confirmed',
           ]);

       //hash
       $formFields['password'] = bcrypt($formFields['password']);

       $user = User::create($formFields);

       
       return redirect('/user/displayUsers');

   }

    //show user profile
    public function showProfile(User $user){
        return view('user/profile', [
            'user' => $user,
        ]);
    }

    //delete a user
    public function destroy(User $user){
        $user->delete();
        return redirect('/user/displayUsers');
    }

    //logout
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
