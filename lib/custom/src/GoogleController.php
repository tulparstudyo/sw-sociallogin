<?php
namespace App\Http\Controllers;

class GoogleController extends SocialLoginBase
{
    public static function button($platform='google', $echo=true){
        return parent::googleButton();
    }

    public function redirectToGoogle()
    {
        return \Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $user = \Socialite::driver('google')->user();
            $finduser = User::where('email', $user->getEmail())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }else{
				 function getName() {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $randomString = '';
                    for ($i = 0; $i < 10; $i++) {
                        $index = rand(0, strlen($characters) - 1);
                        $randomString .= $characters[$index];
                    }
                    return $randomString;
                }
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
					'siteid'  =>"1.",
                    'password' => encrypt(getName())
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
           
            return redirect()->intended('login');
        }
    }
}
