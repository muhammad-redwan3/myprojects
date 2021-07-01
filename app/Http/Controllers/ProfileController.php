<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Symfony\Component\String\b;

class ProfileController extends Controller
{

    public function index()
    {
        return view('profile');
    }
    public function update()
    {
        $userID = auth()->user()->id;
        $user = User::findOrFail($userID);
        $data = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'image' => ['mimes:jpeg,jpg,png'],
        ]);
        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }

        if (request()->hasFile('image')) {
            $path = request('image')->store('user', 'uploads');
            // dd($path);
            $data['image'] = $path;
        }

        $user->update($data);
        return back();
    }
}
