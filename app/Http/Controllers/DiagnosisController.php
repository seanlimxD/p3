<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiagnosisController extends Controller
{

	/**
	* GET
	* /books/search
	* Show the form to search for a book
	*/
	public function diagnosis(Request $request)
	{
	    return view('diagnosis')->with([
        'age' => $request->session()->get('age', '18'),
        'body' => $request->session()->get('body', ''),
        'spirit' => $request->session()->get('spirit', []),
        'diagnosisResults' => $request->session()->get('diagnosisResults', '')
    	]);
	}
    /**
	* GET
	* /diagnosis-process
	* Process the form for diagnosis
    */
    public function diagnosisProcess(Request $request)
    {
    	$diagnosisResults;
    	$request->validate([
    		'age' => 'required|integer|min:1',
    		'body' => 'required',
    		'spirit' => 'required',
    	]);
    	$age = $request->input('age');
    	$body = $request->input('body');
    	$spirit = $request->input('spirit');
    	if ($body == 'steel') {
			if (in_array('brain', $spirit)) {
				if (in_array('heart', $spirit)) {
					if (in_array('soul', $spirit)) {
						$diagnosisResults = 'a cyborg';
					} else {
						$diagnosisResults = 'an incredible sentient robot';
					}
				} else {
					$diagnosisResults = 'siri';
				}
			} else {
				$diagnosisResults = 'a soulless machine';
			}
		} elseif ($body == 'flesh') {
			if ($age > 120 || !(in_array('heart', $spirit))) {
				$diagnosisResults = 'dead';
			} else {
				if (in_array('brain', $spirit)) {
					if (in_array('soul', $spirit)) {
						$diagnosisResults = 'a normal human person';
					} else {
						$diagnosisResults = 'a pretty mean dude';
					}
				} else {
					$diagnosisResults = 'a mindless beast';
				}
			}
		} else {
			$diagnosisResults = 'mysterious';
		}
		return redirect('/diagnosis')->with([
	        'age' => $age,
	        'body' => $body,
	        'spirit' => $spirit,
	        'diagnosisResults' => $diagnosisResults,
	    ]);
    }
}
