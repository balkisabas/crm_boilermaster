<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\References;
use App\Models\Rfq;
use App\Models\Upload;

class ProposalRfqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $branches = References::where('type','branch')->get();
        $rfq_status = References::where('type','rfq_status')->get();
        $rfq_type = References::where('type','rfq_type')->get();
        $docs = References::where('type','document_type')->get();
        return view('rfq', compact('branches','rfq_status','rfq_type', 'docs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        foreach ($request->file as $file) {
            
            $filename = time().'_'.$file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->storeAs('public/',$filename);
            $rfqReg = new Rfq();
            $rfqReg->branch = $request->branch;
            $rfqReg->rfq_id = $request->rfq_id;
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
            $rfqReg->document_name = $request->document_name;
            $rfqReg->document_type = $request->document_type;
            $rfqReg->size = $filesize;
            $rfqReg->location = 'storage/'.$filename;
            $rfqReg->status = 'Active';
            $rfqReg->save();

            $fileModel = new Upload;
            $fileModel->name = $filename;
            $fileModel->size = $filesize;
            $fileModel->location = 'storage/'.$filename;
            $fileModel->save();       
            return redirect()->back()->with('status','Data saved successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
