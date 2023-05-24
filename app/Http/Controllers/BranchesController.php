<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\branches;
use Illuminate\Http\Request;

class BranchesController extends Controller
{

 
    public function index_branch($id, $page_modual)
    {

        if ($page_modual === 'vendor') {
            $data = Vendor::find($id);
        } elseif ($page_modual === 'customer') {
            $data = Customer::find($id);
        } else {
             dd($page_modual);
        }


        return  view('add-branches', compact('data','page_modual'));
    }
    public function add_branch(Request $request)
    {
        
        $branchadd = new branches();
        $branchadd->cust_id = $request->cust_id;
        $branchadd->name = $request->name;
        $branchadd->add = $request->add;
        $branchadd->pic = $request->pic;
        $branchadd->email = $request->email;
        $branchadd->phn_no = $request->phn_no;
        $branchadd->fax_no = $request->fax_no; 
        $branchadd->active = '1';
        $branchadd->parent = $request->parent;
        $branchadd->status = 'active';
        $branchadd->save();

        return  redirect('list-' . $request->parent);
    }

    public function index_branch_edit($id, $page_modual)
    {
        $branch =  branches::find($id);

        return  view('Edit-branches',compact('branch','page_modual'));
        
        
        ;
    }

     public function edit_branch(Request $request )
    {
        
        $branchupd =  branches::find($request->id);
        $branchupd->name = $request->name;
        $branchupd->phn_no = $request->phn_no;
        $branchupd->add = $request->add;
        $branchupd->pic = $request->pic;
        $branchupd->email = $request->email;
        $branchupd->fax_no = $request->fax_no;
        $branchupd->active = $request->active;
        $branchupd->save();

  


        return  redirect('list-' . $request->parent);
    }

    public function view_branch($id, $page_modual)
    {
        $branch =  branches::find($id);

        return  view('view-branches',compact('branch','page_modual'));
    }
    public function delete_branch($id, $page_modual)
    {
        $userupdate =  branches::find($id);
        $userupdate->status = 'delete'; 
        $userupdate->save();

        return  redirect('list-' . $page_modual);

        
    }


}
