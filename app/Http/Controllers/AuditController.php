<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Support\Str;

class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit::with('user')->latest()->get();
        // $audits->transform(function ($audit) {
        //     $audit->new_values = $this->cleanValues($audit->new_values);
        //     return $audit;
        // });
        return view('audits.index', compact('audits')); // Pass the audits to the view
    }

    // private function cleanValues($values)
    // {
    //       return Str::replace(['"', '{', '}', '\"'], '', $values);
    // }

}