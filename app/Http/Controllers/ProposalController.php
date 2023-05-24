<?php

namespace App\Http\Controllers;
use App\Models\Proposalnew;
use Illuminate\Http\Request;
use App\Models\References;
use App\Models\ProposalDocs;

class ProposalController extends Controller
{
    public function index()
    {
       
        $branches = References::where('type','branch')->get();
        $rfq_status = References::where('type','rfq_status')->get();
        $rfq_type = References::where('type','rfq_type')->get();
        $docs = References::where('type','document_type')->get();
        return view('proposal-form', compact('branches','rfq_status','rfq_type', 'docs'));
    }

    public function senaraiRfq()
    {
        $rfq = Proposalnew::where('status', 'active')->get();
       
        return view('proposal-list', compact('rfq'));
    }

    public function daftarRfq(Request $request)
    {
        $message = [
            'branch.required',
            'rfq_status.required',
            'cust_email.required',
        ];
        $validated = $request->validate([
            'branch' => 'required',
            'rfq_status' => 'required',
            'cust_email' => 'required',
        ], $message);

        //dd($request);
        $rfqReg = new Proposalnew();
        $rfqReg->branch = $request->branch;
        $rfqReg->pic = $request->pic;
        $rfqReg->type = $request->type;
        $rfqReg->cust_name = 'farhan';
        $rfqReg->cust_pic = 'balkis';
        $rfqReg->cust_email = $request->cust_email;
        $rfqReg->rfq_no = $request->rfq_no;
        $rfqReg->rfq_title = $request->rfq_title;
        $rfqReg->due_date = $request->due_date;
        $rfqReg->final_pricing = $request->final_pricing;
        $rfqReg->rfq_status = $request->rfq_status;
        $rfqReg->cust_po_no = $request->cust_po_no;
        $rfqReg->date_award = $request->date_award;
        $rfqReg->award_amount = $request->award_amount;
        $rfqReg->status = 'Active';
        $rfqReg->save();


        $field1Data = $request->input('data1');
        $field2Data = $request->input('data2');

        foreach ($field1Data as $index => $field1Value) {
        
            $field2Value = $field2Data[$index];
                       
            foreach ($request->files as $file) {
                $filename = $file->getClientOriginalName();
                    // Store the file and perform any necessary actions
                    // $filename = $file->getClientOriginalName();
                    // $file->move(public_path('/proposal_documents/'), $filename);
                    $file->storeAs('public/',$filename);

                    $proposal_docs = new ProposalDocs();
                    $proposal_docs->rfqid = $rfqReg->id;
                    $proposal_docs->document_name = $field1Value;
                    $proposal_docs->document_type = $field2Value;
                    $proposal_docs->filename = 'storage/'.$filename;
                    $proposal_docs->status = 'Active';
                    $proposal_docs->save();
                
                }
            }
        return redirect()->back()->with('status','Data saved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProposal(string $id)
    {
        $branches = References::where('type','branch')->get();
        $rfq_status = References::where('type','rfq_status')->get();
        $rfq_type = References::where('type','rfq_type')->get();
        $rfqupdate = Proposalnew::find($id);
        return view('edit-proposal', compact('rfqupdate', 'branches', 'rfq_status', 'rfq_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProposal(Request $request, string $id)
    {
        //dd($request);
        $rfqupdate = Proposalnew::find($id);
        $rfqupdate->branch = $request->input('branch');
        $rfqupdate->pic = $request->input('pic');
        $rfqupdate->type = $request->input('type');
        $rfqupdate->cust_name = 'farhan';
        $rfqupdate->cust_pic = 'balkis';
        $rfqupdate->cust_email = $request->input('cust_email');
        $rfqupdate->rfq_no = $request->input('rfq_no');
        $rfqupdate->rfq_title = $request->input('rfq_title');
        $rfqupdate->due_date = $request->input('due_date');
        $rfqupdate->final_pricing = $request->input('final_pricing');
        $rfqupdate->rfq_status = $request->input('rfq_status');
        $rfqupdate->cust_po_no = $request->input('cust_po_no');
        $rfqupdate->date_award = $request->input('date_award');
        $rfqupdate->award_amount = $request->input('award_amount');
        $rfqupdate->update();
        return redirect()->back()->with('status','Record update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function viewDocsForm($id)
    {
        $rfq = Proposalnew::find($id);
        $docs = References::where('type','document_type')->get();
        // $listDocs = ProposalDocs::where('rfqid', $id)->where('status', 'active')->get();
        $listDocs = ProposalDocs::where('status', 'active')->get();
        return view('add-docs', compact('rfq', 'docs', 'listDocs'));
    }

    public function tambahPropsalDocs(Request $request)
    {
        $message = [
            'document_name.required',
            'document_type.required',
            'filename.required' => 'Please Choose file to upload',
        ];
        $validated = $request->validate([
            'document_name' => 'required',
            'document_type' => 'required',
            'filename' => 'required',
        ], $message);

        $file = $request->file("filename");
        $fileLocation = "proposal_docs";
        if($file->move($fileLocation, $file->getClientOriginalName())){
            echo "File upload successfully!";
        }else{
            echo "Error, cannot upload file!";
        }

        $rdfDocs = new ProposalDocs();
        $rdfDocs->rfqid = $request->rfqid;
        $rdfDocs->document_name = $request->document_name;
        $rdfDocs->document_type = $request->document_type;
        $rdfDocs->filename =  $file->getClientOriginalName();
        $rdfDocs->status = 'Active';
        $rdfDocs->save();
        return redirect()->back()->with('status','Data saved successfully.');
    }
    
    public function deleteProposal(string $id)
    {
          
        $rfq =  Proposalnew::find($id);
        $rfq->status = 'delete'; 
        $rfq->save();
        session()->flash('success', 'Record deleted successfully.');
        return redirect('proposal-list');
        
    }

    public function deleteDocs(string $id)
    {
          
        $listDocs =  ProposalDocs::find($id);
        $listDocs->status = 'Delete'; 
        $listDocs->save();
        session()->flash('success', 'Record deleted successfully.');
        return redirect('proposal-list');
        
    }
}
