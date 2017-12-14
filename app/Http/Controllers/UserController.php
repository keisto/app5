<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}

public function index() {
    $users = User::active()->orderBy('name', 'asc')->get();
    $inactive = User::inactive()->orderBy('name', 'asc')->get();
  return view('user.index', compact('users', 'inactive'));
}

public function create(){
  return view('user.create');
}
public function store() {
//	dd(request());

  // $validator = Validator::make([
  // 	'name' => 'required',
  // 	'email' => 'required|email|unique:users',
  // 	'phone' => 'required',
  // 	'password' => 'required|confirmed',
  // 	'access' => 'required'
  //  ]);
  //
  //   if ($validator->fails() {
  //      return redirect()->withErrors($validator)->withInput();
  //   }
  // $this->validate(request(),[
  //
  // ]);

    $password = bcrypt(request('password'));
    $cdl = 0;
    if(request('has_cdl')) {
      $cdl = 1;
    } else {
      $cdl = 0;
    }

    $lic = 0;
    if(request('has_license')) {
      $lic = 1;
    } else {
      $lic = 0;
    }

    $user = User::create([
      "name" => request('name'),
      "birthday" => request('birthday'),
      "hired_on" => request('hired_on'),
      "phone" => request('phone'),
      "email" => request('email'),
      "license" => request('license'),
      "has_license" => $lic,
      "has_cdl" => $cdl,
      "cdl_expire" => request('cdl_expire'),
      "access" => request('access'),
      "password" => $password
    ]);

    // auth()->login($user);

    return redirect('user');

  }

  public function show(User $employee) {
    return view('user.edit', compact('employees'));
  }

  public function destroy(User $employee) {
    if($employee->active == 1) {
      $employee->active = 0;
      $employee->save();
    }
    return redirect('employee');
  }

  public function edit(User $employee) {
    return view('user.edit', compact('employee'));
  }

  public function update(User $employee, UserRequest $request) {
    $newPassword = bcrypt($request->get('password'));
    if(empty($newPassword)){
       $employee->update($request->except('password'));
    }else{
       $employee->update($request->all());
       $employee->update(['password' => $newPassword]);
    }
    return redirect('user');
  }
}
