<?php
namespace App\Http\Controllers;

class VkController extends SocialLoginBase
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return \Socialite::driver('vkontakte')->redirect();
    }
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public static function button($platform='vkontakte', $echo=true){
        return parent::vkontakteButton();
    }
 	
	function getPassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
   	}
		
	
    public function callback()
    {
        try {
           
            $user = \Socialite::driver('vkontakte')->user();
            $finduser = User::where('email', $user->getEmail())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }
			else if( $user->getEmail() == null){
                return redirect('/login')->with('error', 'Please update the e-mail information you used on your Vkontakte account and try to connect to EkolMeat again.');
			}
			
			else{
							
				$newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email, 
					'vk_id' => $user->id,
					'siteid'  =>"1.",
                    'password' => encrypt($this->getPassword())
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
			 
			 }
	
                
          
        } catch (Exception $e) {
  
            return redirect()->intended('login');
        }
    }
	
			
	
	
	
	
}
