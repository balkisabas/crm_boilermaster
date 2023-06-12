<?php

namespace App\Http\Controllers;
use App\Models\Positions;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-position|create-position|edit-position|delete-position', ['only' => ['index','store']]);
         $this->middleware('permission:create-position', ['only' => ['create','store']]);
         $this->middleware('permission:edit-position', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-position', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $position = Positions::where('delete_status', 'active')->get();
        return view('positions.index',compact('position'));
    }

  
    public function create()
    {
        return view('positions.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);
    
        Positions::create($request->all());
        return redirect()->route('positions.index')
                        ->with('success','Position created successfully.');
    }

   
    public function show(Positions $position)
    {
        return view('positions.show',compact('position'));
    }

   
    public function edit(Positions $position)
    {
        return view('positions.edit',compact('position'));
    }

 
    public function update(Request $request, Positions $position)
    {
        request()->validate([
            'name' => 'required'
        ]);
    
        $position->update($request->all());
    
        return redirect()->route('positions.index')
                        ->with('success','Position updated successfully');
    }

 
    public function destroy($id)
    {
        $position =  Positions::find($id);
        $position->delete_status = 'delete'; 
        $position->save();
    
        return redirect()->route('positions.index')
                        ->with('success','Position deleted successfully');
    }
}
