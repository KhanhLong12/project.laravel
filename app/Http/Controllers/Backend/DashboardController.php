<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

class DashboardController extends Controller
{
    public function index(){
    	$user = Auth::user();
    	// dd($user);
    	if (Gate::allows('check-role', $user)) {
    		return view('backend.dashboard_full');
    	}else{
    		dd('không phải admin');
    	}
    	// return view('backend.dashboard_full');
    }
}
