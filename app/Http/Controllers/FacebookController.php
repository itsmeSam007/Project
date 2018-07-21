<?php

	namespace App\Http\Controllers;

	use App\User;
	use App\Http\Controllers\Controller;
	use Socialite;
	use Exception;
	use Auth;

	use Illuminate\Support\Facades\DB;

	class FacebookController extends Controller
	{

	    /**

	     * Create a new controller instance.

	     *

	     * @return void

	     */

	    public function redirectToFacebook()
	    {
	        return Socialite::driver('facebook')->redirect();
	    }

	    /**

	     * Create a new controller instance.

	     *

	     * @return void

	     */

	    public function handleFacebookCallback()

	    {

	        try {

	            $user = Socialite::driver('facebook')->user();

	            $chk_user = User::where('email',$user->getEmail()) -> first();

	            if(isset($chk_data)){
	            	User::where('email',$user->getEmail())->update([
	            		'facebook_id' => $user->getId()
	            	]);

	            	auth()->loginUsingId($chk_user->id);
	            }
	            else{
	            	$create['name'] = $user->getName();
		            $create['email'] = $user->getEmail();
		            $create['password'] = \Hash::make('12345'); // This is just for demo purpose otherwise we can create the password as required
					$create['facebook_id'] = $user->getId();	

					$userModel = new User;
					$createdUser = $userModel->addNew($create);
					auth()->loginUsingId($createdUser->id);
	            }
				/*  WE CAN IMPLEMENT MAIL TO SEND THE CREATED PASSWORD */
				
				return redirect()->route('home');


	        } catch (Exception $e) {
	            return redirect('auth/facebook');
	        }
	    }
	}