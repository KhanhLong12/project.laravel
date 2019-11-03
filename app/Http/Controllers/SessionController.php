<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function set(){
    	session([
    		'id' => '1611',
    		'name' => 'Long',
    		'class' => 'AT13I',
    	]);
    }
    public function get(){
    	$value = session()->get('id');
    	$name = session()->get('name');
    	$class = session()->get('class');
    	$phone = session()->get('phone','0979087475');
    	// if (session()->has('class')) {
    	// 	echo "có";
    	// }else{
    	// 	echo "không";
    	// }
    	// dd(session()->all());
    	// echo "id:" . $value;
    	// echo "<br>";
    	// echo "name:" . $name;
    	// echo "<br>";
    	// echo "class:" . $class;
    	// echo "<br>";
    	// echo "phone:" . $phone;
    	if (session()->exists('phone','0979087475')) {
		    echo "có";
    	}else{
    		echo "không";
    	}
    }
   public function get2(){
   		session()->pull('id');
   		$value = session()->get('id');
   		echo $value;
   }
}
