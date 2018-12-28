<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteVisit;

class PagesController extends Controller
{
    public function siteviews(Request $request)
    {
        // Insert into database
        $visit = new SiteVisit();
        $visit->visit = $request['value'];
        $visit->date = now();
        $visit->save();
        return array('status' => 1);
    }
    
    public function home()
    {
        return SiteVisit::all();
    }
}
