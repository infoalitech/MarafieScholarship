<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Group;
use App\Models\Scholarship;
use App\Models\Permission;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('type','admin')->paginate(10);  // Fetch all roles
    
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Group::all();  // Fetch all roles
        $permissions = Permission::all();  // Fetch all permissions
        $jobs = Scholarship::all();  // Fetch all jobs
    
        return view('admin.user.create', compact('roles', 'permissions', 'jobs'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required',
            'roles' => 'array',
            'permissions' => 'array',
            'jobs' => 'required|array',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'type' => 'admin'
        ]);
        $user->type="admin";
        $user->save();
        // Assign roles, permissions, and jobs to the user
        $user->roles()->sync($request->roles);
        $user->permissions()->sync($request->permissions);
        $user->jobs()->sync($request->jobs);
    
        return redirect()->route('admin.user.index')->with('success', 'User created successfully!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Return the view with user details
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $roles = Group::all();  // Fetch all roles
        $permissions = Permission::all();  // Fetch all permissions
        $jobs = Scholarship::all();  // Fetch all jobs
    
        // dd($jobs);
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user','roles','permissions','jobs'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'gender' => 'required',
            'roles' => 'array',
            'permissions' => 'array',
            'jobs' => 'array',
        ]);
    
        // Find the user
        $user = User::findOrFail($id);
    
        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
    

    
        // Sync roles, permissions, and jobs
        $user->roles()->sync($request->roles);
        $user->permissions()->sync($request->permissions);
        $user->jobs()->sync($request->jobs);
    
        $user->save();
    
        // Redirect back to the detail page with success message
        return redirect()->route('admin.user.show', $user->id)->with('success', 'User updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
