<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteVisit;
use Mail;

class PagesController extends Controller
{
    private $email;
    
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
        
        $result = $this->sendemail($email);
        
        return $result;
    }
    
    public function sendemail($email)
    {
        $this->email = $email;
        
        $data = array('email' => $email);
        
        Mail::send('email.apitoken', $data, function($message) {
            $message->to($this->email, 'Api Token')
                    ->subject('Your Api token')
                    ->from('declanmunroedeveloper@gmail.com', 'Declan Munroe');
        });
        return "Mail has been sent to $this->email";
    }
}
