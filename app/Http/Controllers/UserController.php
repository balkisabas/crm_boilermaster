<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Positions;
use App\Models\Companies;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Permission;
    
class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-user|create-user|edit-user|delete-user', ['only' => ['index','store']]);
         $this->middleware('permission:create-user', ['only' => ['create','store']]);
         $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(Request $request)
    {
        $data = User::where('delete_status', 'active')->get();
        return view('users.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Positions::where('delete_status', 'active')->get();
        $company = Companies::where('delete_status', 'active')->get();
        $roles = Role::all();
        return view('users.create',compact('roles', 'position','company'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required'
        ]);
        
        //dd($request);
        $input = $request->all();
        // Check if password is provided in the request
        if ($request->filled('password')) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = null;
        }
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Positions::where('delete_status', 'active')->get();
        $company = Companies::where('delete_status', 'active')->get();
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        // $permission = Permission::get();
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //                 ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //                 ->all();
    
        return view('users.edit',compact('user','roles','userRole', 'position', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'roles' => 'required'
        ]);
    
        //dd($request);
        $input = $request->all();
       // Check if password is provided in the request
        if ($request->filled('password')) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input['password'] = null;
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        
        // $user->syncPermissions($request->input('permission'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =  User::find($id);
        $user->delete_status = 'delete'; 
        $user->save();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}