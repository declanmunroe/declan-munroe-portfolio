<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteVisit;
use App\ApiToken;
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
        
        $email_exists = ApiToken::where('email', $email)->first();
        
        if ($email_exists)
        {
            $result = "Email address already in our system";
        }
        else
        {
            $rand = md5(time());
            
            $api_token = new ApiToken();
            $api_token->email = $request->email;
            $api_token->token = $rand;
            $api_token->save();
            
            $result = $this->sendemail($email, $rand);
        }
        
        return $result;
    }
    
    public function sendemail($email, $token)
    {
        $this->email = $email;
        
        $data = array('email' => $email, 'token' => $token);
        
        Mail::send('email.apitoken', $data, function($message) {
            $message->to($this->email, 'Api Token')
                    ->subject('Your Api token')
                    ->from('declanmunroedeveloper@gmail.com', 'Declan Munroe');
        });
        return "Mail has been sent to $this->email";
    }
}
