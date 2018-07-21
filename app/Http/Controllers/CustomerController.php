<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Vendor;
use \Session, \Validator,\Redirect;

class CustomerController extends Controller
{
    //
	public function customer(){
		return Customer::orderBy('name','ASC')->get(['name', 'id']);	
	}
	
	public function vendor(){
		return Vendor::orderBy('name','ASC')->get(['name', 'id']);	
	}    

	public function saveData(Request $request){
		$inputs = $request->all(); 
		
		$customer_id = $inputs['customerName'];
		$vendor_ids = implode(",",$inputs['vendor_id']);
		
		$get_data = Customer::find($customer_id);

		try{
			foreach($inputs['vendor_id'] as $vendor_list){
				$query = Customer::where('id',$customer_id)->whereRaw('FIND_IN_SET("'.$vendor_list.'",vendor_id)')
	         	->first();
	         
		        if(count($query) >=1){
		        	return response()->json(array('status'=>2,'msg'=>'vendor name already exist.'));	
		        }	
			}	        
        	Customer::where('id', $customer_id)->update(['vendor_id' => $get_data->vendor_id.','.$vendor_ids]);	        	

			return response()->json(array('status'=>1,'msg'=>' Data Store'));		        			
			
		}
		catch (Exception $e) {
            return response()->json(array('status'=>0,'msg'=>' Something Went Wrong.'));	
        }
	}    
}
