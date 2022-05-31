<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimluateController extends Controller
{
    public function Institution(Request $request) {
        $institutionID = $request->id;
        
        return view('institution');
    }
}
