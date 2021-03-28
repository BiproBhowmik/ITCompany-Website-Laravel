<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function goToAdmin(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'username' => 'required',
			'code' => 'required',
		]);

		$sessionCheck = Admin::select('*')
					->orderBy('adId', 'desc')
					->first();

			//dd($sessionCheck);
			//dd($sessionCheck->adUrName);

		if ($sessionCheck->adUrName == $request->username && $sessionCheck->adCode == $request->code) {
			$request->session()->put('username', $request->username);
			$request->session()->put('code', $request->code);
		}

    	
    	return redirect()->route('adminPage');;
    }

    public function adminPage()
    {
    	return view('backend/adminPage');

    }

    public function fQna()
    {
    	return view('backend/fQnaPage');

    }

    public function contact()
    {
    	return view('backend/contactPage');

    }

    public function aboutUs()
    {
        return view('backend/aboutUsPage');

    }

    public function ourService()
    {
        return view('backend/ourServicePage');

    }

    public function portfolio()
    {
        return view('backend/portfolioPage');

    }
public function ourTeam()
    {
        return view('backend/ourTeamPage');

    }

    public function userMessage()
    {
        return view('backend/userMessagePage');

    }

    public function slider()
    {
        return view('backend/sliderPage');

    }

    public function logOut()
    {
        if (session()->has('username') || session()->has('code'))
        {
            session()->pull('username');
            session()->pull('code');

        }        

        return redirect()->route('joy');

    }

    
}
