<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Exception;
class SocialLoginBase extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public static function button($platform, $echo=true){
        if($platform=='google'){
            $button = self::googleButton();
        } elseif($platform=='facebook'){
            $button =  self::facebookButton();
        } elseif($platform=='vkontakte'){
            $button =  self::vkontakteButton();
        } else{
            $button =  'The '.$platform.' is not supported...';
        }
        if($echo){
            echo $button;
        } else{
            return $button;
        }
    }
    public static function googleButton(){
        return '<a href="'.url('auth/google').'" class="btn btn-link sw-sociallogin google">Google</a>';
    }
    public static function facebookButton(){
        return '<a href="'.url('auth/fb').'" class="btn btn-link sw-sociallogin google">Facebook</a>';
    }
    public static function vkontakteButton(){
        return '<a href="'.url('auth/vk').'" class="btn btn-link sw-sociallogin google">VKontakte</a>';
    }

}
