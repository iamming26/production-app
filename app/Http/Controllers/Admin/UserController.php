<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Get data users
        $users = DB::table('users')
            ->select('employee_id', 'name', 'role')
            ->whereNot('role', 'admin')
            ->get();

        return view('admin.users.index',[
            'user' => Auth::user(),
            'list_users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.users.create', [
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:users,employee_id',
            'name' => 'required',
            'role' => 'required|in:supervisor,operator',
        ]);

        DB::table('users')->insert([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'role' => $request->role,
            'password' => bcrypt('123'), // Default password
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        return view('admin.users.edit', [
            'user' => Auth::user(),
            'editUser' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|unique:users,employee_id,' . $id,
            'name' => 'required',
            'role' => 'required|in:supervisor,operator',
        ]);

        DB::table('users')->where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', 'User not found.');
        }

        return view('admin.users.show', [
            'user' => Auth::user(),
            'viewUser' => $user,
        ]);
    }
}
