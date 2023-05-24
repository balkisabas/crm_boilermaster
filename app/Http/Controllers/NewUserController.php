<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\References;
use App\Models\NewUser;
use Illuminate\Support\Facades\Hash;

class NewUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = References::where('type','position')->get();
        $branches = References::where('type','branch')->get();
        $activation_status = References::where('type','activation_status')->get();
        //dd($positions);
        return view('new-user', compact('positions', 'branches', 'activation_status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function daftarUser(Request $request)
    {
        $message = [
            'name.required',
            'password.required',
            'email.required',
            'Alternative_Email.required',
            'phone.required'
            
        ];

        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'Alternative_Email' => 'required',
            'phone' => 'required'


        ], $message);

        //dd($request);
        $userReg = new NewUser();
        $userReg->name = $request->name;
        $userReg->password = Hash::make($request->password);
        $userReg->email = $request->email;
        $userReg->Alternative_Email = $request->Alternative_Email;
        $userReg->phone = $request->phone;
        $userReg->position = $request->position;
        $userReg->branch = $request->branch;
        $userReg->role = $request->role;
        $userReg->activation_status = $request->activation_status;
        $userReg->status = 'Active';
        $userReg->save();
        session()->flash('success', 'Data saved successfully.');
        return redirect('new-user');
        
    }

    /**
     * Display the specified resource.
     */
    public function userList()
    {   
        $user = NewUser::where('status', 'active')->get();
        return view('user-list', compact('user'));

    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editUser(string $id)
    {
        $branches = References::where('type','branch')->get();
        $activation_status = References::where('type','activation_status')->get();
        $user = NewUser::find($id);
        return view('edit-users', compact('user', 'branches', 'activation_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUsers(Request $request, string $id)
    {
        $user = NewUser::find($id);
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->Alternative_Email = $request->input('Alternative_Email');
        $user->phone = $request->input('phone');
        $user->position = $request->input('position');
        $user->branch = $request->input('branch');
        $user->role = $request->input('role');
        $user->activation_status = $request->input('activation_status');
        $user->update();
        return redirect()->back()->with('status','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUser(string $id)
    {
        $user =  NewUser::find($id);
        $user->status = 'delete'; 
        $user->save();
        session()->flash('success', 'Record deleted successfully.');
        return redirect('user-list');
    }

    
}
