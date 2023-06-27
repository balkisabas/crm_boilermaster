<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Branches;
use App\Models\Personincharge;
use App\Models\Vendor; 
use App\Models\User; 
use Illuminate\Http\Request;

class VendorController  extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-vendor|create-vendor|edit-vendor|delete-vendor', ['only' => ['index','store']]);
         $this->middleware('permission:create-vendor', ['only' => ['create','store']]);
         $this->middleware('permission:edit-vendor', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-vendor', ['only' => ['destroy']]);
    }

    public function index()
    {
        $page_modual= 'vendor';
        $data =  vendor::where('active_status', 'Active') ->get();
        $branch =  Branches::all();
        return  view('vendors.index', compact('branch','data', 'page_modual'));

    }
    
    public function create()
    {
        $page_modual= 'vendor';
        $pic = User::select(['name', 'status'])
                            ->where('status', 'Active')
                            ->get();
        $picUser = User::where('delete_status', 'active')->get();
        return view('vendors.create',compact('page_modual', 'pic', 'picUser'));

    }
    public function store(Request $request)
    {
        $regno = $request->input('reg_no');
        $regnovalidate = vendor::where('reg_no', $regno)->first();

       if ($regnovalidate) {
           return redirect()->back()->with('status', 'Vendor With The Registration Number Alredy Exist');
       }
            $page_modual= 'vendor';
            
            // code for file destination 
            $file = $request->file("doc");
            $filedes = "doc_upload";
            if($file->move($filedes, $file->getClientOriginalName())){
                echo "FILE WAS UPLODED ";
       }else{

             echo "ERROR TO UPLOAD FILE";
       }

       //code for insert into tbale 
       $userReg = new vendor();
       $userReg->name = $request->name;
       $userReg->ph_no = $request->ph_no;
       $userReg->add = $request->add;
       $userReg->reg_no = $request->reg_no;
       $userReg->web_url = $request->web_url;
       $userReg->fax_no = $request->fax_no;
       $userReg->email = $request->email;
       $userReg->pic = $request->pic;
       $userReg->status = 'Active';
       $userReg->bank_name = $request->bank_name;
       $userReg->bank_acc_no = $request->bank_acc_no;
       $userReg->swift_code = $request->swift_code;
       $userReg->assign = $page_modual; 
       $userReg->doc =  $file->getClientOriginalName();
       $userReg->save();
      
      //code for where multiply add and remove field which insert into table 
       $field1Data = $request->input('data1');
       $field2Data = $request->input('data2');
       $field3Data = $request->input('data3');
       $field4Data = $request->input('data4');
       $field5Data = $request->input('data5');
        
       foreach ($field1Data as $index => $field1Value) {

           $field2Value = $field2Data[$index];
           $field3Value = $field3Data[$index];
           $field4Value = $field4Data[$index];
           $field5Value = $field5Data[$index];
           
           $picreg = new Personincharge();
           $picreg->fk = $userReg->id;
           $picreg->name = $field1Value;
           $picreg->phn_no = $field2Value;
           $picreg->fax_no = $field3Value;
           $picreg->email = $field4Value;
           $picreg->Designation = $field5Value;
           $picreg->assign = $page_modual;
           $picreg->status = 'Active';
     
           $picreg->save();

       }

       
       return redirect()->route('vendors.index')->with('success','Vendor created successfully.');

    }
    
  
    public function show($value)
    {
        $variables = explode("@", $value);

        $id = $variables[0]; 
        $page_modual = $variables[1];

        $vendor =  vendor::find($id);
        
        $personic = Personincharge::where('fk', '=', $id )
                ->where('assign', '=', $page_modual )
                ->where('status', '=', 'Active')
                ->get();

        return  view('vendors.show',compact('personic','vendor','page_modual'));  
    } 
    
    
    public function edit($value )
    {
        $variables = explode("@", $value);

        $id = $variables[0]; 
        $page_modual = $variables[1];

        $vendor =  vendor::find($id);
        
        $personic =  Personincharge::where('fk',$id )
                    ->where('assign', '=', $page_modual )
                    ->where('status', '=', 'Active' )
                    ->get(); 
        $picUser = User::where('delete_status', 'active')->get();
        return  view('vendors.edit',compact('vendor','personic', 'page_modual', 'picUser'));
        
    }
    public function update(Request $request, Vendor $vendor)
    {
                $userupdate =  vendor::find($request->cust_id);
                $userupdate->name = $request->name;
                $userupdate->ph_no = $request->ph_no;
                $userupdate->add = $request->add;
                $userupdate->reg_no = $request->reg_no;
                $userupdate->web_url = $request->web_url;
                $userupdate->fax_no = $request->fax_no;
                $userupdate->email = $request->email;
                $userupdate->pic = $request->pic;
                $userupdate->assign = $request->assign; 
                $userupdate->status = $request->active;
                $userupdate->bank_name = $request->bank_name;
                $userupdate->bank_acc_no = $request->bank_acc_no;
                $userupdate->swift_code = $request->swift_code; 

                if ($request->hasFile('doc')) {
                    $file = $request->file("doc");
                    $filedes = "doc_upload";

                        if($file->move($filedes, $file->getClientOriginalName())){
                        echo "FILE WAS UPLODED ";
                        }
                        else{
                        echo "ERROR TO UPLOAS FILE";
                        }
                        $userupdate->doc =  $file->getClientOriginalName();;
                }
                else{
                        $userupdate->doc =  $request->doc;
                }
                
                $userupdate->save();

                $field1Data = $request->input('data1');
                $field2Data = $request->input('data2');
                $field3Data = $request->input('data3');
                $field4Data = $request->input('data4');
                $field5Data = $request->input('data5');
                $field6Data = $request->input('data6');
                
                foreach ($field1Data  as $index => $field1Value) 
                        {
                                $field2Value = $field2Data[$index];
                                $field3Value = $field3Data[$index];
                                $field4Value = $field4Data[$index];
                                $field5Value = $field5Data[$index];
                                $field6Value = $field6Data[$index];
                                
                                if ($field6Value === 'new')  {
                                    $picreg = new Personincharge();
                                    $picreg->fk = $request->cust_id;
                                    $picreg->name = $field1Value;
                                    $picreg->phn_no = $field2Value;
                                    $picreg->fax_no = $field3Value;
                                    $picreg->email = $field4Value;
                                    $picreg->Designation = $field5Value ;
                                    $picreg->assign = $request->assign;
                                    $picreg->status = 'Active';
                                    $picreg->save();
                                } else {

                                    $picupd = Personincharge::find($field6Value);
                                    $picupd->fk = $request->cust_id;
                                    $picupd->name = $field1Value;
                                    $picupd->phn_no = $field2Value;
                                    $picupd->fax_no = $field3Value;
                                    $picupd->email = $field4Value;
                                    $picupd->Designation = $field5Value ;
                                    $picupd->assign = $request->assign;
                                    $picupd->save();  
                                }
                        }

                return redirect()->route('vendors.index')->with('success','Vendor Updated successfully.');
         
    }

 
    public function destroy($id)
    {
        $userupdate =  vendor::find($id);
        $userupdate->active_status = 'delete'; 
        $userupdate->reg_no = $userupdate->reg_no.'/deletedregno'; 
        $userupdate->save();
       
        Personincharge::where('fk', $id)
                        ->where('assign', 'vendor')
                        ->update(['Active_status' => 'delete', 'status' => 'delete' ]);
        return redirect()->route('vendors.index')->with('success','Vendor Deleted Successfully.');
    }

    public function delete_pic($id,$page_modual,$parent_id)
    {
        $picupdate =  Personincharge::find($id);
        $picupdate->status = 'delete'; 
        $picupdate->Active_status = 'delete'; 
        $picupdate->save();

        $value = $parent_id."@".$page_modual;

        return redirect()->route('vendors.edit', ['vendor' => $value]);     
    }
}
