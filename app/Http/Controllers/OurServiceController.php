<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurService;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\file;

class OurServiceController extends Controller
{
    public function ajaxAddOurSer(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonTitle' => 'required',
			'commonDisc' => 'required',
			'commonImage' => 'required',
		]);
		$common = new OurService;

		$common->osTitle = $request->commonTitle;
		$common->osDisc = $request->commonDisc;

		// $image = $request->file('commonImage');
		// $imageName = time().'.'.$image->getClientOriginalExtension();
		// $path = public_path('/images');
		// $image->move($path, $imageName);
		// $common->osPho = 'public/images/'.$imageName;

		$common->osPho = $request->commonImage->store('public/images');

		$common->save();
		return back()->with('success', 'Data Inserted Successfully');
    }

    public function osfindByIdAjax($id)
    {
    	$common = OurService::where('osId',$id)
		->first();

		return response()->json($common);
    }

        public function ajaxUpdateOurSer(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$ourServ = OurService::select('*')->where('osId', $request->updateCommonId)->first();
		if ($ourServ->osPho) {
		Storage::delete([$ourServ->osPho]);
		}

    	$osPhoto = $request->updateCommonImage->store('public/images');


		OurService::where('osId',$request->updateCommonId)
		->update(['osTitle'=>$request->updateCommonTitle,'osDisc'=>$request->updateCommonDisc,'osPho'=>$osPhoto]);

		return back()->with('success', 'Data Updated Successfully');

	}

	public function ajaxDeleteOS($id)
    {
    	$ourServ = OurService::select('*')->where('osId', $id)->first();
		if ($ourServ->osPho) {
		Storage::delete([$ourServ->osPho]);
		}
    	$common = OurService::where('osId',$id)
		->delete();

		return response()->json($common);
    }
}
