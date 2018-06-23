<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhitelistController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


  	public function index()
    {
        $whitelists=\App\Whitelist::all();
        return view('/whitelist/index',compact('whitelists'));
    }

    public function create()
    {
        return view('/whitelist/create');
    }


	public function store(Request $request)
    {
        
        $whitelist= new \App\Whitelist;
        $whitelist->ip=$request->get('ip');        
        $whitelist->save();
        
        return redirect('whitelists')->with('success', 'Information has been added');
    }

    public function edit($id)
    {
        $whitelist = \App\Whitelist::find($id);
        return view('/whitelist/edit',compact('whitelist','id'));
    }

    public function update(Request $request, $id)
    {
        $whitelist= \App\Whitelist::find($id);
        $whitelist->ip=$request->get('ip');        
        $whitelist->save();
        return redirect('whitelists');
    }

     public function destroy($id)
    {
        $whitelist = \App\Whitelist::find($id);
        $whitelist->delete();
        return redirect('whitelists')->with('success','Information has been  deleted');
    }

}
