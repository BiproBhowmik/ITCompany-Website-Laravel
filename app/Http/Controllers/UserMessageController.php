<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserMessage;


class UserMessageController extends Controller
{
    public function ajaxSendMessage(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'name' => 'required',
			'email' => 'required',
			'subject' => 'required',
			'message' => 'required',
		]);
		$common = new UserMessage;

		$common->urName = $request->name;
		$common->urEmail = $request->email;
		$common->urSub = $request->subject;
		$common->urText = $request->message;

		$common->save();
		return response()->json($common);
    }

    public function ajaxDeleteMessage($id)
    {
    	$common = UserMessage::where('urId',$id)
		->delete();

		return response()->json($common);
    }

    public function messagefindByIdAjax($id)
    {
    	$common = UserMessage::where('urId',$id)
		->first();

		return response()->json($common);
    }

    
}
