<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{     
    public function privacy()
    {
        return view('privacy'); 
    }

    public function terms()
    {
        return view('terms'); 
    }

    public function about() {
        return view('about');
    }
    
    public function help() {
        return view('help');
    }

}
