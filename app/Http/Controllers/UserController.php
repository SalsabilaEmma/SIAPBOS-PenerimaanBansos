<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::latest()->get();
        return view('user.index', compact('user'));
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name') ?? $user->name;
        $user->role = $request->input('role') ?? $user->role;
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Diubah!');
    }
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('user'))->with(['error' => 'Data Berhasil Dihapus!']);
    }
}
