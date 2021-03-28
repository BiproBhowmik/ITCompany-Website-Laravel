<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonAdd' => 'required',
			'commonEmail' => 'required',
			'commonPhone' => 'required',
		]);
		$common = new Contact;

		$common->contAdd = $request->commonAdd;
		$common->contEmail = $request->commonEmail;
		$common->contPho = $request->commonPhone;

		$common->save();
		return redirect()->route('contact');
    }

    public function ajaxUpdateCont(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		Contact::where('contId',$request->commonId)->update(['contAdd'=>$request->commonAdd, 'contEmail'=>$request->commonEmail, 'contPho'=>$request->commonPhone]);

		// $common = Fqna::select('*')
		// ->where('fqnas.fQnaId','=',$request->commonId)
		// ->first();

		return response()->json("Updated");
    }
}
