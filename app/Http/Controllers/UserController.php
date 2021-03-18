<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateRequest;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
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
        $form = $request->validated();
        if($request->file !== null)
        {
            $path = $request->file->getRealPath();
            $file = file_get_contents($path);
            $image = base64_encode($file);
            $form += compact('image');
        }
        $user->fill($form);
        $user->save();
        return redirect()->back()->with(['message' => '更新しました！']);
    }

    public function delete()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->to('/');
    }

}
