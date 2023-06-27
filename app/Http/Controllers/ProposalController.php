<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\ProposalDoc;
use App\Models\Companies;
use App\Models\Rfqstatuses;
use App\Models\Rfqtypes;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Personincharge;

class ProposalController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:list-proposal|create-proposal|edit-proposal|delete-proposal', ['only' => ['index','store']]);
         $this->middleware('permission:create-proposal', ['only' => ['create','store']]);
         $this->middleware('permission:edit-proposal', ['only' => ['edit','update']]);
         $this->middleware('permission:delete-proposal', ['only' => ['destroy']]);
         $this->middleware('permission:view_proposalreport', ['only' => ['rfq_report']]);

    }
    public function fetchData($id)
    {
        $data = Personincharge::where('fk', $id)->where('active_status', 'active')->where('assign', 'customer')->get();
        return response()->json($data);
    }
    public function fetchDatapiccompny($id)
    {
        $data = User::where('company', $id)->where('delete_status', 'active')->get();
        return response()->json($data);
    }

    public function index()
    {
        $rfq = Proposal::where('delete_status', 'active')
                        ->where('company', Auth::user()->company)
                        ->get();
        return view('proposals.index', compact('rfq'));
    }


    public function create()
    {
        $company = Companies::where('delete_status', 'active')->get();
        $rfq_type = Rfqtypes::where('delete_status', 'active')->get();
        $rfq_status = Rfqstatuses::where('delete_status', 'active')->get();
        $docs = Documents::where('delete_status', 'active')->get();
        $pic = Personincharge::select(['name'])
                                ->where('status', 'Active')
                                ->where('assign', 'customer')
                                ->get();
        $customer = Customer::where('assign', 'customer')
                                ->where('active_status', 'Active')
                                ->get();
        $picUser = User::where('delete_status', 'active')->get();
        return view('proposals.create', compact('company', 'rfq_type', 'rfq_status', 'docs', 'pic', 'customer', 'picUser'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'company' => 'required',
            'pic' => 'required',
            'type' => 'required',
            'cust_name' => 'required',
           
        ]);
    
     
        $customer = Customer::find($request->cust_name); 
        
        $proposal = new Proposal();
        $proposal->company = $request->company;
        $proposal->pic = $request->pic;
        $proposal->type = $request->type;
        $proposal->cust_name = $request->cust_name;
        $proposal->cust_pic = $request->cust_pic;
        $proposal->cust_email = $request->cust_email;
        $proposal->rfq_no = $request->rfq_no;
        $proposal->rfq_title = $request->rfq_title;
        $proposal->due_date = $request->due_date;
        $proposal->final_pricing = $request->final_pricing;
        $proposal->rfq_status = $request->rfq_status;
        $proposal->cust_po_no = $request->cust_po_no;
        $proposal->date_award = $request->date_award;
        $proposal->award_amount = $request->award_amount;
        $proposal->delete_status = 'Active';
        $proposal->save();
        

        
        $field1Data = $request->input('data1');
        $field2Data = $request->input('data2');
        $files = $request->file('files');

        if(isset($files)){
           
                foreach ($field1Data as $key => $field1Value) {
                        
                    $field2Value = $field2Data[$key];
                
                    $file = $files[$key];

                    if ($file->isValid()) {
                        
                        $name = $file->getClientOriginalName();
                        $folder = 'uploads';
                        $path = $file->move($folder,$name);

                        $proposal_docs = new ProposalDoc();
                        $proposal_docs->rfqid = $proposal->id;
                        $proposal_docs->document_name = $field1Value;
                        $proposal_docs->document_type = $field2Value;
                        $proposal_docs->filename =  $name;
                        $proposal_docs->status = 'Active';
                        $proposal_docs->save();  
                    }
                }
        }else{
            
        }


        return redirect()->route('proposals.index')
                        ->with('success','Document created successfully.');
    }


    public function show($id)
    {
        $rfq = Proposal::with('proposalDoc')->findOrFail($id);
        return view('proposals.show', compact('rfq'));
    }


    public function edit(Proposal $proposal)
    {
        $company = Companies::where('delete_status', 'active')->get();
        $rfq_type = Rfqtypes::where('delete_status', 'active')->get();
        $rfq_status = Rfqstatuses::where('delete_status', 'active')->get();
        $docs = Documents::where('delete_status', 'active')->get();
        $customer = Customer::select(['name', 'status', 'id'])
                                ->where('Active_status', 'Active')
                                ->get();

        $pic = Personincharge::select(['name','id'])
                                ->where('fk',  $proposal->cust_name)
                                ->where('assign', '=', 'customer' )
                                ->where('active_status', '=', 'Active' )
                                ->get();
        
        $proposalDoc = ProposalDoc::where('rfqid', '=', $proposal->id)
                                        ->where('status', 'active')
                                        ->get();
          

        $picUser = User::where('delete_status', 'active')->where('company',  $proposal->company)->get();
        //dd($proposalDoc);
        return view('proposals.edit', compact('company', 'rfq_type','rfq_status', 'docs', 'customer' , 'pic', 'proposal', 'proposalDoc', 'picUser'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'company' => 'required',
            'pic' => 'required',
            'type' => 'required',
            'cust_name' => 'required'
        ]);
        
       //dd($request);
        


        $proposal = Proposal::find($id);
        $proposal->company = $request->input('company');
        $proposal->pic = $request->input('pic');
        $proposal->type = $request->input('type');
        $proposal->cust_name = $request->input('cust_name');
        $proposal->cust_pic = $request->input('cust_pic');
        $proposal->cust_email = $request->input('cust_email');
        $proposal->rfq_no = $request->input('rfq_no');
        $proposal->rfq_title = $request->input('rfq_title');
        $proposal->due_date = $request->input('due_date');
        $proposal->final_pricing = $request->input('final_pricing');
        $proposal->rfq_status = $request->input('rfq_status');
        $proposal->cust_po_no = $request->input('cust_po_no');
        $proposal->date_award = $request->input('date_award');
        $proposal->award_amount = $request->input('award_amount');
        $proposal->delete_status = 'Active';
        $proposal->save();

         

        $field1Data = $request->input('data1');
        $field2Data = $request->input('data2');
        $files = $request->file('files');
        $fieldidData = $request->input('data3');
         
        foreach ($field1Data as $key => $field1Value) {
                
                $field2Value = $field2Data[$key];
                $fieldidValue = $fieldidData[$key];

                if(isset($files[$key])){
                    $file = $files[$key];
                }
                else if(empty($field1Value) && empty($field2Value)) {
                    $file = 'non';
                    
                }else{
                    $file = 'nofile';
                }

                if ($fieldidValue === 'new' && $file != 'non') {
                            
                            $name = $file->getClientOriginalName();
                            $folder = 'uploads';
                            $path = $file->move($folder,$name);
            
                            $proposal_docs = new ProposalDoc();
                            $proposal_docs->rfqid = $proposal->id;
                            $proposal_docs->document_name = $field1Value;
                            $proposal_docs->document_type = $field2Value;
                            $proposal_docs->filename =  $name;
                            $proposal_docs->status = 'Active';
                            $proposal_docs->save();  
              
                }else if($file === 'nofile') {
                        
                    ProposalDoc::find($fieldidValue);
                        $proposal_docs = ProposalDoc::find($fieldidValue);
                        $proposal_docs->rfqid = $proposal->id;
                        $proposal_docs->document_name = $field1Value;
                        $proposal_docs->document_type = $field2Value;
                        $proposal_docs->status = 'Active';
                        $proposal_docs->save();  
                }else if ($file != 'non'){
                        ProposalDoc::find($fieldidValue);
                            
                        $name = $file->getClientOriginalName();
                        $folder = 'uploads';
                        $path = $file->move($folder,$name);
        
                        $proposal_docs = ProposalDoc::find($fieldidValue);
                        $proposal_docs->rfqid = $proposal->id;
                        $proposal_docs->document_name = $field1Value;
                        $proposal_docs->document_type = $field2Value;
                        $proposal_docs->filename =  $name;
                        $proposal_docs->status = 'Active';
                        $proposal_docs->save();  
                }else{

                }
        }

       
         
        return redirect()->route('proposals.index')
                        ->with('success','Proposal updated successfully');
    }

    public function destroy($id)
    {
        $document =  Proposal::find($id);
        $document->delete_status = 'delete'; 
        $document->save();

        ProposalDoc::where('rfqid', $id) 
                    ->update(['status' => 'delete']);
                    
        return redirect()->route('proposals.index')
                        ->with('success','Proposal deleted successfully');
    }

    public function delete_doc($id, $rfqid)
    {
        $docupdate =  ProposalDoc::find($id);
        $docupdate->status = 'delete'; 
        $docupdate->save();

        return redirect()->route('proposals.edit', ['proposal' => $rfqid]);     
    }


    //farhan's part
    public function senaraiRfq()
    {
        $rfq = Proposal::where('status', 'active')->get();
        return view('proposals.index', compact('rfq'));
    }

    public function rfq_report(Request $request)
    {
        $selectedOption = $request->input('option');
        $table =  Proposal::orderBy('due_date', 'asc')
                ->get();
        if( $selectedOption == 'PIC'){
            $data = $table->unique('pic');
        }
        
        else{
            $data = $table->unique('cust_name');
        }
        
        return view('rfq-report', compact('data','selectedOption'));
    }

    public function rfq_report_filter(Request $request)
    {
        $filter = $request->input('option');
        $variables = explode("/", $filter);

        $selectedOption = $variables[0]; 
        $datefrom = $variables[1]; 
        $dateto = $variables[2]; 

        $table =  Proposal::orderBy('due_date', 'asc')
                ->whereBetween ('created_at',[ $datefrom, $dateto])
                ->get();

        if( $selectedOption == 'PIC'){
            $data = $table->unique('pic');
        }
        
        else{
            $data = $table->unique('cust_name');
        }
        
        return view('rfq-report', compact('data','selectedOption','datefrom', 'dateto'));
    }

    public function rfqSubmitted($name,$type)
    {
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'Submitted')->where('pic', '=', $name)->get();
            
        }else{
            $rfq =Proposal::where('rfq_status', '=', 'Submitted')->where('cust_name', '=', $name)->get();
            
        }
                
        return view('proposals.index', compact('rfq'));
    }

    public function rfqinporgress($name,$type)
    {
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'In Progress')->where('pic', '=', $name)->get();
            
        }else{
          $rfq =Proposal::where('rfq_status', '=', 'In Progress')->where('cust_name', '=', $name)->get();
        }
         
        return response()->json($rfq);

    }

    public function rfqnotsubmited($name,$type)
    {
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'Not Submitted')->where('pic', '=', $name)->get();
            
        }else{
            $rfq =Proposal::where('rfq_status', '=', 'Not Submitted')->where('cust_name', '=', $name)->get();  
        }

        return view('proposals.index', compact('rfq'));
    }

    public function rfqawarded($name,$type)
    { 
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'awarded')->where('pic', '=', $name)->get();
            
        }else{
            $rfq =Proposal::where('rfq_status', '=', 'awarded')->where('cust_name', '=', $name)->get();
            
        }
        return view('proposals.index', compact('rfq'));
    }

    public function rfqSubmitted_filter($name,$type,$date_from,$date_to)
    {

        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'Submitted')->where('pic', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
            
        }else{
            $rfq =Proposal::where('rfq_status', '=', 'Submitted')->where('cust_name', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
            
        }    
        return view('proposals.index', compact('rfq'));
    }

    public function rfqinporgress_filter($name,$type,$date_from,$date_to)
    {
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'In Progress')->where('pic', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
            
        }else{
          $rfq =Proposal::where('rfq_status', '=', 'In Progress')->where('cust_name', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
           
        }

        return view('proposals.index', compact('rfq'));

    }

    public function rfqnotsubmited_filter($name,$type,$date_from,$date_to)
    {
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'Not Submitted')->where('pic', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
            
        }else{
            $rfq =Proposal::where('rfq_status', '=', 'Not Submitted')->where('cust_name', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
            
        }

        return view('proposals.index', compact('rfq'));
    }

    public function rfqawarded_filter($name,$type,$date_from,$date_to)
    { 
        if($type === 'pic'){ 

        $rfq =Proposal::where('rfq_status', '=', 'awarded')->where('pic', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to])->get();
     
            
        }else{
            $rfq =Proposal::where('rfq_status', '=', 'awarded')->where('cust_name', '=', $name)->whereBetween ('created_at',[ $date_from, $date_to]) ->get();
            
        }
       

        return view('proposals.index', compact('rfq'));
    }

    public function try( )
    { 
       // Retrieve the data you want to update
       $view =Proposal::where('rfq_status', '=', 'awarded')->where('cust_name', '=', 'farhan')->get();
       // Return the data as a JSON response
       return response()->json($view);
    }
}
