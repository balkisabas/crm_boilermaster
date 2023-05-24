<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Customer;
use App\Models\branches;
use App\Models\Personinchanrge;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    


    public function index()
    {
        $page_modual= 'customer';

        return view('new-customer',compact('page_modual'));
    }

    public function store(Request $request)
   {

        $page_modual= 'customer';
       
        // code for file destination 
        $file = $request->file("doc");
        $filedes = "doc_upload";
        if($file->move($filedes, $file->getClientOriginalName())){
            echo "FILE WAS UPLODED ";
        }else{
            echo "ERROR TO UPLOAS FILE";
        }

        //code for insert into tbale 
        $userReg = new Customer();
        $userReg->name = $request->name;
        $userReg->ph_no = $request->ph_no;
        $userReg->add = $request->add;
        $userReg->reg_no = $request->reg_no;
        $userReg->web_url = $request->web_url;
        $userReg->fax_no = $request->fax_no;
        $userReg->pic = $request->pic;
        $userReg->status = 'Active';
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
            
            $picreg = new Personinchanrge();
            $picreg->fk = $userReg->id;
            $picreg->name = $field1Value;
            $picreg->phn_no = $field2Value;
            $picreg->fax_no = $field3Value;
            $picreg->email = $field4Value;
            $picreg->Designation = $field5Value;
            $picreg->assign = $page_modual;
            $picreg->save();

        }

        return redirect('list-customer');
    }

    public function list(Customer $customer)
    {
        $page_modual= 'customer';
        $data =  Customer::where('status', 'active')
            ->get();
        $branch =  branches::all();
        return  view('list-customer', compact('branch','data', 'page_modual'));
        

    }  
    
    public function view_cus($id, $page_modual )
    {

        $customer =  Customer::find($id);
        
        $personic = Personinchanrge::where('fk', '=', $id )
                ->where('assign', '=', $page_modual )
                ->get();

        return  view('view-customer',compact('personic','customer','page_modual'));
    } 

    public function edit_index($id, $page_modual)
    {
        $customer =  Customer::find($id);

        $personic =  Personinchanrge::where('fk',$id )
                    ->where('assign', '=', $page_modual )
                    ->get(); 
         
        return  view('Edit-customer',compact('customer','personic', 'page_modual'));
    }

    public function edit(Request $request)
    {
        $userupdate =  Customer::find($request->cust_id);
        $userupdate->name = $request->name;
        $userupdate->ph_no = $request->ph_no;
        $userupdate->add = $request->add;
        $userupdate->reg_no = $request->reg_no;
        $userupdate->web_url = $request->web_url;
        $userupdate->fax_no = $request->fax_no;
        $userupdate->pic = $request->pic;
        $userupdate->assign = $request->assign; 

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

        return  redirect('list-customer' );
    }

    public function delete($id,$page_modual)
    {
        $page_modual= 'customer';

        $userupdate =  Customer::find($id);
        $userupdate->status = 'delete'; 
        $userupdate->save();
        return  redirect('list-customer' );

        
    }



   
}
