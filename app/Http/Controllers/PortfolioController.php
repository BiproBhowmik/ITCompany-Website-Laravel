<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
	public function addPortfolio(Request $request)
	{
    	// Validation
		$validated = $request->validate([
			'commonTitle' => 'required',
			'commonLink' => 'required',
			'commonImage' => 'required',
		]);
		$common = new Portfolio;

		$common->prTitle = $request->commonTitle;
		$common->prLink = $request->commonLink;

		// $image = $request->file('commonImage');
		// $imageName = time().'.'.$image->getClientOriginalExtension();
		// $path = public_path('/images');
		// $image->move($path, $imageName);
		// $common->osPho = 'public/images/'.$imageName;

		$common->prPho = $request->commonImage->store('public/images');

		$common->save();
		return back()->with('success', 'Data Inserted Successfully');
	}

	public function prfindByIdAjax($id)
	{
		$common = Portfolio::where('prId',$id)
		->first();

		return response()->json($common);
	}

	public function ajaxUpdatePortfolio(Request $request)
	{
		// $validated = $request->validate([
  //       	'summernote' => 'required',
		// 	'commonVlink' => 'required',
		// 	'commonImage' => 'required',
  //   	]);

		//dd($request->commonUpImage);

		$portfolio = Portfolio::select('*')->where('prId', $request->updateCommonId)->first();
		if ($portfolio->prPho) {
			Storage::delete([$portfolio->prPho]);
		}

		$prPhoto = $request->updateCommonImage->store('public/images');


		Portfolio::where('prId',$request->updateCommonId)
		->update(['prTitle'=>$request->updateCommonTitle,'prLink'=>$request->updateCommonLink,'prPho'=>$prPhoto]);

		return back()->with('success', 'Data Updated Successfully');

	}

	public function ajaxDeletePr($id)
	{
		$portF = Portfolio::select('*')->where('prId', $id)->first();
		if ($portF->prPho) {
			Storage::delete([$portF->prPho]);
		}
		$common = Portfolio::where('prId',$id)
		->delete();

		return response()->json($common);
	}

}
