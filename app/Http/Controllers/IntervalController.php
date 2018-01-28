<?php

namespace App\Http\Controllers;

use App\Interval;
use Illuminate\Http\Request;

class IntervalController extends Controller
{
    public function index() {
    	$firstInterval = Interval::first();
    	$intervals = Interval::all();
    	$numberOfIntervals = count(Interval::all());
    	return view('intervals.index', compact('firstInterval','intervals','numberOfIntervals'));
    }

    public function create() {
    	$intervals = Interval::all();
    	return view('intervals.create', compact('intervals'));
    }

    public function store(Request $request) {
    	Interval::create($request->all());
    	return redirect()->route('intervals.index')->with('success','Interval Added successfully');
    }

    public function edit($id) {
    	$intervals = Interval::find($id);
    	return view('intervals.edit',compact('intervals'));
    }

    public function update($id) {
    	$intervals = Interval::find($id);
    	$intervals->update(request()->all());
    	return redirect()->route('intervals.index')->with('success','Interval Updated successfully');
    }

    public function destroy($id) {
    	$interval = Interval::find($id);
    	$interval->delete();
    	return redirect()->route('intervals.index')->with('danger','Deleted interval successfully');
    }

}
