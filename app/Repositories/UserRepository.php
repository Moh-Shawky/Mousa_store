<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserRepository
{
    public function index()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::find($id);
    }
    public function store($request)
    {
        $valid_data = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed']
        ]);
        $user = User::create([
            'name' => $valid_data['name'],
            'email' => $valid_data['email'], 'password' => Hash::make($valid_data['password']),
            'role' => 1
        ]);
        return $user;
    }
    public function authentication($request)
    {
        $valid_data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $valid_data['email'])->first();
        if (!$user || !Hash::check($valid_data['password'], $user['password'])) {
        } else {
            auth()->login($user);
        }
    }
    public function edit($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update($request)
    {
        // dd($request);
        $id = $request->id;
        $user = User::find($id);
        $valid_data = $request->validate([
            'email' => 'required',
            'name' => 'required',
            'role' => 'required'
        ]);

        $user->update($valid_data);
        return $user;
    }

    public function destory($id)
    {
        $user = User::find($id);
        return $user->delete();
    }
}
