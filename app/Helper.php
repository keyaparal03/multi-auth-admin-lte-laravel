<?php
use Illuminate\Database\Eloquent\Model;
//#######This model callses for role management#############
use App\User;
use App\Cart;
//#######END###############

/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/
function vendorimage($id)
{
	$vendors = User::find($id);

	//print_r($vendors);
	// $course =  App\Users::find($id);
	// $photos =array();
	// $img_path = '';
	// if( !empty($course->product_image))
	// {
	// 	$photos = unserialize( $course->product_image);
	// 	if(count($photos)>0)
	// 	{
	// 		$img_path = url('/logo/'.$photos['product_image']); 
	// 	}
	// }    
	return $vendors;     
}
function cartcount()
{
	if (Auth::check())
	{
		echo  Cart::all()->where( 'user_id' , Auth::user()->id)->count();
	}
	else{
		return 0;
	}
	
}
//This functions are for role management