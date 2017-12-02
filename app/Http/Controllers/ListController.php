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

    public function update(Request $request)
    {
    	/*return $request->all();*/
    	$item = Item::find($request->id);
    	$item->item = $request->value;
    	$item->save();
    	
    }

    public function search(Request $request)
    {
    	$term = $request->term;
    	$items = Item::where('item','LIKE','%'.$term.'%')->get();
    	if(count($items) == 0)
    	{
    		$searchResult[] = 'No item found';
    	}
    	else
    	{
    		foreach ($items as $key => $value) 
    		{
    			$searchResult[] = $value->item;
    		}
    	}
    	return $searchResult;
    }

}
