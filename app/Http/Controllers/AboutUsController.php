<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function addAboutUs(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'summernote' => 'required',
			'commonVlink' => 'required',
			'commonImage' => 'required',
		]);
		$common = new AboutUs;

		$common->auText = $request->summernote;
		$common->auVlink = $request->commonVlink;
		$common->auPho = $request->commonImage->store('public/images');

		// if ($request->hasfile('commonImage')) {
		// 	 //dd($request->profPicture);
		// 	$common->auPho = $request->commonImage->store('public/images');
		// }

		$common->save();
		return redirect()->route('aboutUs');
    }

    public function uppAboutUs(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$aboutUs = AboutUs::select('*')->first();
		if ($aboutUs->auPho) {
			# code...
		Storage::delete([$aboutUs->auPho]);
		}

    	$auPhoto = $request->commonUpImage->store('public/images');


		AboutUs::where('auId',$request->abtId)
		->update(['auText'=>$request->summernote,'auVlink'=>$request->commonVlink,'auPho'=>$auPhoto]);

		return redirect()->route('aboutUs')->with('success', 'Data Updated Successfully!');

	}
}
