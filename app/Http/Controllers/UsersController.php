<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;

class UsersController extends Controller
{
  //注册页
  public function create()
  {
    return view('users.create');
  }
  //显示用户信息页
  public function show($id)
  {
      $user = User::findOrFail($id);
      return view('users.show', compact('user'));
  }
  //用户信息存储
  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required|min:3|max:50',
          'email' => 'required|email|unique:users|max:255',
          'password' => 'required|confirmed'
      ]);
      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => $request->password,
      ]);
      session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
      return redirect()->route('users.show',[$user]);
  }
}
