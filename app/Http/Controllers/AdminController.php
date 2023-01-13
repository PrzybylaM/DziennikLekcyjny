<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showListUsers()
    {
        $usersList = DB::table('users')
            ->get();

        return view('/user.users', ['users'=>$usersList]);
    }

    public function approveUserDelete(User $user)
    {
        return view('user.delete_user', ['user'=>$user]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->action([\App\Http\Controllers\DbController::class, 'showListUsers']);
    }

    public function showRegisteredUser(User $user)
    {
        return view('user.edit_registered_user', ['user'=>$user]);
    }

    public function updateRegisteredUser(Request $request, User $user)
    {
        $data = $request->all();

        $user->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'subject' => $data['subject'],
        ]);

        return redirect()->action([\App\Http\Controllers\DbController::class, 'showListUsers']);
    }
}
