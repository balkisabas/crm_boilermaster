<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\branches;
use Illuminate\Http\Request;

class BranchesController  extends Controller
{

     public function index( )
    {

      
    }
   
    public function show($value)
    {

        $variables = explode("@", $value);
        $id = $variables[0]; 
        $page_modual = $variables[1];

        $branch =  branches::find($id);

        return  view('branches.show',compact('branch','page_modual'));
    }

    public function create($id)
    {

    }

   
    public function store(Request $request)
    {
        $branchadd = new branches();
        $branchadd->parent_id = $request->parent_id;
        $branchadd->name = $request->name;
        $branchadd->add = $request->add;
        $branchadd->pic = $request->pic;
        $branchadd->email = $request->email;
        $branchadd->phn_no = $request->phn_no;
        $branchadd->fax_no = $request->fax_no; 
        $branchadd->status = $request->active;
        $branchadd->parent = $request->parent;
        $branchadd->save();

        
        if($request->parent == 'vendor'){
            return redirect()->route('vendors.index')->with('success','Branch created successfully.');
        }else{
            return redirect()->route('customers.index')->with('success','Branch created successfully.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($value)
    {
        $variables = explode("@", $value);

        $id = $variables[0]; 
        $page_modual = $variables[1];
        $process= $variables[2];

    if($process == "create"){

        if ($page_modual === 'vendor') {
            $data = Vendor::find($id);
        } elseif ($page_modual === 'customer') {
            $data = Customer::find($id);
        } else {
             dd($page_modual);
        }

        return  view('branches.create', compact('data','page_modual'));

    }
    else{

        $branch =  branches::find($id); 
        return  view('branches.edit',compact('branch','page_modual'));
    }

    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, branches $branches)
    {
        $branchupd =  branches::find($request->id);
        $branchupd->name = $request->name;
        $branchupd->phn_no = $request->phn_no;
        $branchupd->add = $request->add;
        $branchupd->pic = $request->pic;
        $branchupd->email = $request->email;
        $branchupd->fax_no = $request->fax_no;
        $branchupd->status = $request->active;
        $branchupd->save();

  
        
        if($request->parent == 'vendor'){
            return redirect()->route('vendors.index') ->with('success','Branch Updated successfully.');

        }else{

            return redirect()->route('customers.index') ->with('success','Branch Updated successfully.');
        }
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($value)
    {
        $variables = explode("@", $value);
        $id = $variables[0]; 
        $page_modual = $variables[1];


        $userupdate =  branches::find($id);
        $userupdate->Active_status = 'delete'; 
        $userupdate->save();

        if($page_modual == 'vendor'){
            return redirect()->route('vendors.index')->with('success','Branch eDeleted Successfully.');
        }else{

            return redirect()->route('customers.index')->with('success','Branch Deleted Successfully.');
        }

         
    }
}
