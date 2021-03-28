<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fqna;

class FqnaController extends Controller
{
        public function ajaxAddfqna(Request $request)
    {
    	// Validation
		$validated = $request->validate([
			'commonQ' => 'required',
			'commonA' => 'required',
		]);
		$common = new Fqna;

		$common->fQnaQ = $request->commonQ;
		$common->fQnaA = $request->commonA;

		$common->save();
		return response()->json($common);
    }

    public function fQnafindByIdAjax($id)
    {
    	$common = Fqna::where('fQnaId',$id)
		->first();

		return response()->json($common);
    }

    public function ajaxUpdatefQna(Request $request)
    {
    	// Validation
		// $validated = $request->validate([
		// 	'updatelangName' => 'required',
		// 	'updatelangId' => 'required',
		// ]);

		Fqna::where('fQnaId',$request->commonId)->update(['fQnaQ'=>$request->commonQ, 'fQnaA'=>$request->commonA]);

		$common = Fqna::select('*')
		->where('fqnas.fQnaId','=',$request->commonId)
		->first();

		return response()->json($common);
    }

    public function ajaxDeletefQna($id)
    {
    	$common = Fqna::where('fQnaId',$id)
		->delete();

		return response()->json($common);
    }
}
