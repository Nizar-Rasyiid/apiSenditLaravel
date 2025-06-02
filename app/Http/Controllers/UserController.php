<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getUser($id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        if ($user) {
            return response()->json([
            'user' => $user,
            'password' => $user->password
            ], 200);    
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, $id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        if ($user) {
            $user->update($request->all());
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function uploadImage(Request $request, $id_user)
    {
        $user = User::where('id_user', $id_user)->first();
        if ($user) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/images', $filename);
                $user->image = $filename;
                $user->save();
                return response()->json(['message' => 'Image uploaded successfully', 'image' => asset('storage/images/' . $filename)], 200);
            } else {
                return response()->json(['message' => 'No image file found'], 400);
            }
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
