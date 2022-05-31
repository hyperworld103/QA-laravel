<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function Index(Request $request) {
        $select_id = $request->id;
        $subject = DB::table('subjects')->get();
        if(isset($subject)) {
            return view('question-subject')->with([
                'subject' => $subject
            ]);
        }
    }

    public function SolutionSubject(Request $request) {
        $select_id = $request->id;
        $subject = DB::table('subjects')->get();
        if(isset($subject)) {
            return view('solution-subject')->with([
                'subject' => $subject
            ]);
        }
    }

    public function Simulate(Request $request) {
        $select_id = $request ->id;
        $simulates = DB::table('simulates')->get();
        if(isset($simulates)) {
            return view('simulates')->with([
                'simulates' => $simulates
            ]);
        }
    }
}
