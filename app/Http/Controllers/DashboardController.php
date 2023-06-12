<?php

namespace App\Http\Controllers;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        
        return view('indexhome'); 
    }
    
    public function rfqSubmitted()
    {
        $rfq = Proposal::where('rfq_status', '=', 'Submitted') 
                            ->where('pic', Auth::user()->name)
                            ->get();
                
        return view('proposals.index', compact('rfq'));
    }

    public function rfqinporgress()
    {
        $rfq =Proposal::where('rfq_status', '=', 'In Progress')
                            ->where('pic', Auth::user()->name) 
                            ->get();

        return view('proposals.index', compact('rfq'));

    }

    public function rfqnotsubmited()
    {
        $rfq =Proposal::where('rfq_status', '=', 'Not Submitted')
                            ->where('pic', Auth::user()->name) 
                            ->get();

        return view('proposals.index', compact('rfq'));
    }

    public function rfqawarded()
    { 
        $rfq =Proposal::where('rfq_status', '=', 'Awarded') 
                        ->where('pic', Auth::user()->name)
                        ->get();

        return view('proposals.index', compact('rfq'));
    }
    
}
