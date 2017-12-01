<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
    public function index()
    {
    	$items = Item::all();
    	return view('list', compact('items'));
    }

    public function create(Request $request)
    {
    	/*return $request->all(); this returns the input data from the text field*/
    	$item = new Item;
    	$item->item = $request->field;
    	$item->save();
    	return "done";
    }

    public function delete(Request $request)
    {
    	/*return $request->all();*/
    	$item = Item::where('id', $request->field);
    	$item->delete();
    }
}
