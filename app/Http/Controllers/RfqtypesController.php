<?php

namespace App\Http\Controllers;
use App\Models\Rfqtypes;
use Illuminate\Http\Request;

class RfqtypesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-proposaltype|create-proposaltype|edit-proposaltype|delete-proposaltype', ['only' => ['index','store']]);
         $this->middleware('permission:create-proposaltype', ['only' => ['create','store']]);
         $this->middleware('permission:edit-proposaltype', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-proposaltype', ['only' => ['destroy']]);
    }
  
    public function index()
    {
        $rfqtypes = Rfqtypes::where('delete_status', 'active')->get();
        return view('rfqtypes.index',compact('rfqtypes'));
    }

    public function create()
    {
        return view('rfqtypes.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);
    
        Rfqtypes::create($request->all());
        return redirect()->route('rfqtypes.index')
                        ->with('success','RFQ type created successfully.');
    }

    public function show(Rfqtypes $rfqtype)
    {
        return view('rfqtypes.show',compact('rfqtype'));
    }

    public function edit(Rfqtypes $rfqtype)
    {
        return view('rfqtypes.edit',compact('rfqtype'));
    }

    public function update(Request $request, Rfqtypes $rfqtype)
    {
        request()->validate([
            'name' => 'required'
        ]);
    
        $rfqtype->update($request->all());
    
        return redirect()->route('rfqtypes.index')
                        ->with('success','RFQ type updated successfully');
    }

    public function destroy($id)
    {
        $rfqtypes =  Rfqtypes::find($id);
        $rfqtypes->delete_status = 'delete'; 
        $rfqtypes->save();
    
        return redirect()->route('rfqtypes.index')
                        ->with('success','RFQ type  deleted successfully');
    }
}
