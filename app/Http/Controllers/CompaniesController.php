<?php
    
namespace App\Http\Controllers;
    
use App\Models\Companies;
use Illuminate\Http\Request;
    
class CompaniesController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:list-company|create-company|edit-company|delete-company', ['only' => ['index','store']]);
         $this->middleware('permission:create-company', ['only' => ['create','store']]);
         $this->middleware('permission:edit-company', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-company', ['only' => ['destroy']]);
    }
    

    public function index()
    {
        $companyList = Companies::where('delete_status', 'active')->get();
        return view('companies.index',compact('companyList'));
    }
    
    public function create()
    {
        return view('companies.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'company_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
    
        Companies::create($request->all());
    
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }
 
    public function show(Companies $company)
    {
        return view('companies.show',compact('company'));
    }
    
    public function edit(Companies $company)
    {
        return view('companies.edit',compact('company'));
    }
    
    public function update(Request $request, Companies $company)
    {
        request()->validate([
            'company_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);
    
        $company->update($request->all());
    
        return redirect()->route('companies.index')
                        ->with('success','Company updated successfully');
    }
    
    public function destroy($id)
    {
        $company =  Companies::find($id);
        $company->delete_status = 'delete'; 
        $company->save();
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}