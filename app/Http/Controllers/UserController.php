<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $rolesList = Role::orderBy('name')->get(['id', 'name']);
        return view('users.index', compact('users', 'rolesList'));
    }

    public function store(Request $request)
    {
        $kont = $request->validate([
            'role_id' => 'required|integer',
            'nama' => 'required|string',
            'password' => 'required',
            'username' => 'required|unique:users,username',
        ]);

        try {

            User::create([
                'name' => $kont['nama'],
                'role_id' => $kont['role_id'],
                'username' => $kont['username'],
                'password' => Hash::make($kont['password']),
            ]);

            return response()->json(['message' => 'User berhasil ditambahkan!'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $user = User::findOrFail($id);

            $data = [
                'role_id' => $request->role_id,
                'name' => $request->nama,
                'username' => $request->username,
            ];
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            return response()->json(['message' => 'User berhasil diUpdate!'], 200);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Ada Masalah Diantara Input/Server'], 500);
        }
    }
    public function destroy($id)
    {
        try {

            $user = User::findOrFail($id);
            $user->delete();

            return response()->json(['message' => 'User berhasil dihapus!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
