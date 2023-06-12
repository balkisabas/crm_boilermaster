<?php

namespace App\Http\Controllers;

use App\Models\Rfqstatuses;
use Illuminate\Http\Request;

class RfqStatusController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-proposalstatus|create-proposalstatus|edit-proposalstatus|delete-proposalstatus', ['only' => ['index','store']]);
         $this->middleware('permission:create-proposalstatus', ['only' => ['create','store']]);
         $this->middleware('permission:edit-proposalstatus', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-proposalstatus', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $rfqstatus = Rfqstatuses::where('delete_status', 'active')->get();
        return view('rfqstatus.index',compact('rfqstatus'));
    }

  
    public function create()
    {
        return view('rfqstatus.create');
    }


    public function store(Request $request)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required'
        ]);
    
        Rfqstatuses::create($request->all());
        return redirect()->route('rfqstatus.index')
                        ->with('success','RFQ Status created successfully.');
    }

   
    public function show(Rfqstatuses $rfqstatus)
    {
        return view('rfqstatus.show',compact('rfqstatus'));
    }

   
    public function edit(Rfqstatuses $rfqstatus)
    {
        return view('rfqstatus.edit',compact('rfqstatus'));
    }

 
    public function update(Request $request, Rfqstatuses $rfqstatus)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required'
        ]);
    
        $rfqstatus->update($request->all());
    
        return redirect()->route('rfqstatus.index')
                        ->with('success','RFQ Status updated successfully');
    }

 
    public function destroy($id)
    {
        $rfqstatus =  Rfqstatuses::find($id);
        $rfqstatus->delete_status = 'delete'; 
        $rfqstatus->save();
    
        return redirect()->route('rfqstatus.index')
                        ->with('success','RFQ Status deleted successfully');
    }
}
