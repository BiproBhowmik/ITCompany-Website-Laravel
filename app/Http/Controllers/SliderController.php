<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function addSlider(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonName' => 'required',
			'commonDiscription' => 'required',
			'commonImage' => 'required',
		]);
		$common = new Slider;

		$common->slName = $request->commonName;
		$common->slDisc = $request->commonDiscription;

		// $image = $request->file('commonImage');
		// $imageName = time().'.'.$image->getClientOriginalExtension();
		// $path = public_path('/images');
		// $image->move($path, $imageName);
		// $common->tmPho = 'public/images/'.$imageName;

		$common->slPho = $request->commonImage->store('public/images');

		$common->save();
		return back();
    }

    public function slfindByIdAjax($id)
    {
    	$common = Slider::where('slId',$id)
		->first();

		return response()->json($common);
    }

        public function UpdateSlider(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$common = Slider::select('*')->where('slId', $request->updateCommonId)->first();

		if ($common->slPho) {
		Storage::delete([$common->slPho]);
		}

    	$slPhoto = $request->updateCommonImage->store('public/images');


		Slider::where('slId',$request->updateCommonId)
		->update(['slName'=>$request->updateCommonName,'slDisc'=>$request->updateCommonDiscription,'slPho'=>$slPhoto]);

		return back();

	}

	public function ajaxDeleteSl($id)
    {
    	$slider = Slider::select('*')->where('slId', $id)->first();
		if ($slider->slPho) {
		Storage::delete([$slider->slPho]);
		}
    	$common = Slider::where('slId',$id)
		->delete();

		return response()->json($common);
    }
}
