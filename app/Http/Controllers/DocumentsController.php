<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-docType|create-docType|edit-docType|delete-docType', ['only' => ['index','store']]);
         $this->middleware('permission:create-docType', ['only' => ['create','store']]);
         $this->middleware('permission:edit-docType', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-docType', ['only' => ['destroy']]);
    }

    public function index()
    {
        $rfqList = Documents::where('delete_status', 'active')->get();
        return view('documents.index',compact('rfqList'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required'
        ]);
    
        Documents::create($request->all());
        return redirect()->route('documents.index')
                        ->with('success','Document created successfully.');
    }
    
    public function show(Documents $document)
    {
        return view('documents.show',compact('document'));
    }

    public function edit(Documents $document)
    {
        return view('documents.edit',compact('document'));
    }

    public function update(Request $request, Documents $document)
    {
        request()->validate([
            'name' => 'required'
        ]);
    
        $document->update($request->all());
    
        return redirect()->route('documents.index')
                        ->with('success','Document updated successfully');
    }

    public function destroy($id)
    {
        $document =  Documents::find($id);
        $document->delete_status = 'delete'; 
        $document->save();
    
        return redirect()->route('documents.index')
                        ->with('success','Document deleted successfully');
    }
}
