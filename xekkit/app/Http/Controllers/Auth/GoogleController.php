<?php
  
namespace App\Http\Controllers\Auth;
  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request)
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            } else {
                // register google account
                $request->session()->flash('user', $user);
                return redirect('/registerGoogle');
                //return view('auth.registerGoogle', ['user' => $user]);
                // $newUser = User::create([
                //     'username' => $user->name,
                //     'email' => $user->email,
                //     'google_id'=> $user->id,
                //     'password' => encrypt('123456dummy'),                
                //     'birthdate' => $user->birthdate,
                //     'gender' => $user->gender
                // ]);
    
                // Auth::login($newUser);
     
                // return redirect('/');
            }
        } catch (Exception $e) {
            return redirect('login')->withErrors(['Google Account' => $e->getMessage()]);
        }
    }

    public function showRegistrationForm(Request $request)
    {
        dd( $request->session()->get('user'));
        $request->session()->reflash();
        return view('auth.registerGoogle', ['user' => $request->session()->get('user')]);
    }
}
