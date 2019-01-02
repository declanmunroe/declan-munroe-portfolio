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
        $no_of_visits = SiteVisit::all()->sum('visit');
        
        $data = array('visit' => $no_of_visits);
        
        return view('home')->with($data);
    }
    
    public function testapi(Request $request)
    {
        $token = $request->query('token');
        
        if ($token != '1234')
        {
            return "Invalid";
        }
        else {
            return SiteVisit::all();
        }
    }
    
    public function requestapitoken()
    {
        return view('requestapitoken');
    }
    
    public function apitoken(Request $request)
    {
        $email = $request->email;
        die(var_dump($email));
    }
}
