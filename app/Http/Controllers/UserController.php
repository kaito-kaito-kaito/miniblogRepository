<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', ['user'=>$user]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request)
    {

        $user = Auth::user();
        $user->fill(['filepath' => $request->file->store('user/images')] + $request->validated());
        $user->save();
        return redirect()->back()->with(['message' => '更新したンゴ']);
    }

    public function delete()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->to('/');
    }

}
