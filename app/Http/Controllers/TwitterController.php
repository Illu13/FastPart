<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class TwitterController extends Controller

{

    /**
 * Create a new controller instance.
 *

     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */

    public function redirectToTwitter(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse

    {
        return Socialite::driver('twitter')->redirect();
    }
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->userFromTokenAndSecret('F7iWzwm8amJ370vBPhztbKgN7', 'XJz6Hnrp2tSr0KlMHOoXkIPcfGLf54M7SK04RTFMW7RNOiXiHG');
            $finduser = User::where('twitter_id', $user->getEmail())->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            }else{
                return view('dashboard')->with('user', $user);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
