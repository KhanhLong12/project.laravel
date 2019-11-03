<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function set(){
    	Cookie::queue(Cookie::make('id',1));
    	Cookie::queue(Cookie::make('email','Long@gmail.com'));
    	return response('hello')->cookie('giohang','2',4);
    }
    public function get(){
    // public function get(Request $request){
    	// $value = $request->cookie('giohang');
    	// $id = $request->cookie('id');
    	// $email = $request->cookie('email');
    	$value = Cookie::get('giohang');
    	$id = Cookie::get('id');
    	$email = Cookie::get('email');
    	echo $value;
    	echo "<br>";
    	echo $id;
    	echo "<br>";
    	echo $email;
    	echo "<br>";
    }
}
