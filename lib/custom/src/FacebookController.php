<?php
namespace App\Http\Controllers;

class FacebookController extends SocialLoginBase
{
    public function index()
    {
        return \Socialite::driver('facebook')->redirect();
    }
    public static function button($platform='facebook', $echo=true){
        return parent::facebookButton();
    }

	function getPassword(){
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
            $user = \Socialite::driver('facebook')->user();
            $finduser = User::where('email', $user->getEmail())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }	
			else if( $user->getEmail() == null){ 
                return redirect('/login')->with('error', 'Please update the e-mail information you used on your Facebook account and try to connect to EkolMeat again.');
				//return view('auth.social')->with(["name"=> "Facebook"]);	
			}
			else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
					'fb_id' => $user->id,
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
