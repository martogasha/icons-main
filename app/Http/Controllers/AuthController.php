<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function deleteUser(Request $request){
        $output = "";
        $delete = User::find($request->id);
        $delete->delete();
        return response($output);
    }
    public function Log(Request $request){
        $user = User::where('phone',$request->phone)->first();
        if (Auth::attempt([
            'phone' => $request->phone,
            'password' => $request->password,
        ])){
                return redirect(url('admin'));
        }
        else{
            return redirect()->back()->with('error', 'CREDENTIALS DOES NOT MATCH');
        }
    }
    public function addUser(){
        return view('admin.addUsers');
    }
    public function users(){
        $users = User::all();
        return view('admin.users',[
            'users'=>$users
        ]);
    }
    public function storeUsers(Request $request){
        $store = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'dashboard'=>$request->dashboard,
            'stock'=>$request->stock,
            'users'=>$request->users,
            'sell'=>$request->sell,
            'expenses'=>$request->expenses,
            'quote'=>$request->quote,
            'password'=>Hash::make('password')
        ]);
        return redirect(url('users'))->with('success','USER ADDED SUCCESS');
    }
    public function editUser($id){
        $edit = User::find($id);
        return view('admin.editUser',[
            'edit'=>$edit
        ]);
    }
    public function eUsers(Request $request){
        $edit = User::find($request->user_id);
        $edit->first_name = $request->input('first_name');
        $edit->last_name = $request->input('last_name');
        $edit->phone = $request->input('phone');
        $edit->role = $request->input('role');
        $edit->dashboard = $request->input('dashboard');
        $edit->stock = $request->input('stock');
        $edit->users = $request->input('users');
        $edit->sell = $request->input('sell');
        $edit->expenses = $request->input('expenses');
        $edit->quote = $request->input('quote');
        $edit->save();
        return redirect(url('users'))->with('success','USER EDITED SUCCESS');

    }

}
