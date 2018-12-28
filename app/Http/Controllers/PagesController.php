<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteVisit;

class PagesController extends Controller
{
    public function siteviews(Request $request)
    {
        return $request;
    }
    
    public function home()
    {
        return SiteVisit::all();
    }
}
