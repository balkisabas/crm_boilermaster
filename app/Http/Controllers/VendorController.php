<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Customer;
use App\Models\branches;
use App\Models\Personinchanrge;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
     
    public function index()
    {

        $page_modual= 'vendor';

        return view('new-customer', compact( 'page_modual'));
            
        
    }

    public function store(Request $request)
    {
 
         $page_modual= 'vendor';
        // foreach ($request->inputs as $key => $value) {
         //   people::create($value);}
              
         $file = $request->file("doc");
         $filedes = "doc_upload";
         if($file->move($filedes, $file->getClientOriginalName())){
             echo "FILE WAS UPLODED ";
         }else{
             echo "ERROR TO UPLOAS FILE";
         }
 
         $vendorReg = new Vendor();
         $vendorReg->name = $request->name;
         $vendorReg->ph_no = $request->ph_no;
         $vendorReg->add = $request->add;
         $vendorReg->reg_no = $request->reg_no;
         $vendorReg->web_url = $request->web_url;
         $vendorReg->fax_no = $request->fax_no;
         $vendorReg->pic = $request->pic;
         $vendorReg->status = 'Active';
         $vendorReg->assign = $page_modual; 
         $vendorReg->doc =  $file->getClientOriginalName();
         $vendorReg->save();
        
        
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
             
             $picreg = new Personinchanrge();
             $picreg->fk = $vendorReg->id;
             $picreg->name = $field1Value;
             $picreg->phn_no = $field2Value;
             $picreg->fax_no = $field3Value;
             $picreg->email = $field4Value;
             $picreg->Designation = $field5Value;
             $picreg->assign = 'Vendor';
             $picreg->save();
 
         }
         return redirect('list-vendor' );
     }

     public function list(Customer $customer)
     {
         $page_modual= 'vendor';

         $data =  Vendor::where('status', 'active')
                ->get();
 
         
         return  view('list-customer', compact('data','page_modual'));
         
 
     }

     public function view_vendor($id, $page_modual )
    {

        $customer =  Vendor::find($id);
        
        $personic = Personinchanrge::where('fk', '=', $id )
                ->where('assign', '=', $page_modual )
                ->get();

        return  view('view-customer',compact('personic','customer','page_modual'));
    }

    public function edit_index($id, $page_modual)
    {
        $customer =  Vendor::find($id);

        $personic =  Personinchanrge::where('fk',$id )
                    ->where('assign', '=', $page_modual )
                    ->get(); 
         
        return  view('Edit-customer',compact('customer','personic', 'page_modual'));
    }

    public function edit(Request $request)
    {
        $vendorupdate =  Vendor::find($request->cust_id);
        $vendorupdate->name = $request->name;
        $vendorupdate->ph_no = $request->ph_no;
        $vendorupdate->add = $request->add;
        $vendorupdate->reg_no = $request->reg_no;
        $vendorupdate->web_url = $request->web_url;
        $vendorupdate->fax_no = $request->fax_no;
        $vendorupdate->pic = $request->pic;
        $vendorupdate->assign = $request->assign; 

        if ($request->hasFile('doc')) {
            $file = $request->file("doc");
            $filedes = "doc_upload";

                if($file->move($filedes, $file->getClientOriginalName())){
                echo "FILE WAS UPLODED ";
                }
                else{
                echo "ERROR TO UPLOAS FILE";
                }
                $vendorupdate->doc =  $file->getClientOriginalName();;
        }
        else{
                $vendorupdate->doc =  $request->doc;
        }

        $vendorupdate->save();


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
                            $picreg = new Personinchanrge();
                            $picreg->fk = $request->cust_id;
                            $picreg->name = $field1Value;
                            $picreg->phn_no = $field2Value;
                            $picreg->fax_no = $field3Value;
                            $picreg->email = $field4Value;
                            $picreg->Designation = $field5Value ;
                            $picreg->assign = $request->assign;
                            $picreg->save();
                        } else {

                            $picupd = Personinchanrge::find($field6Value);
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

        return  redirect('list-vendor' );
    }

    public function delete($id,$page_modual)
    {
        $page_modual= 'vendor';

        $userupdate =  vendor::find($id);
        $userupdate->status = 'delete'; 
        $userupdate->save();
        return  redirect('list-vendor' );

        
    }


}
