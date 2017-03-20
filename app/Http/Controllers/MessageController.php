<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function form()
    {
    	return view('contact.form');
    }

    public function send(Request $request)
    {
    	// validate request
    	$this->validate($request, [
    		'name' => 'required|string|max:50',
    		'email' => 'required|email|max:150',
    		'message' => 'required|string|max:2000'
    	]);

    	// do something here...


    	// return as JSON
    	return response()->json([
    		'success' => true,
    		'message' => 'Pesan berhasil dikirim.'
    	]);
    }
}
