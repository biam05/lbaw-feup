<?php
  
namespace App\Http\Controllers\Auth;
  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
  
class GoogleController extends Controller
{
    /**
     * Redirect to Google's login.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Login and redirect to home page or redirect to register page.
     * 
     * @param Request $request
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
                return redirect('/register_google');
            }
        } catch (Exception $e) {
            return redirect('login')->withErrors(['Google Account' => $e->getMessage()]);
        }
    }

    /**
     * Show registration with Google account form.
     * 
     * @param Request $request
     * @return view
     */
    public function showRegistrationForm(Request $request)
    {
        $request->session()->reflash();
        return view('auth.registerGoogle', ['user' => $request->session()->get('user')]);
    }

    /**
     * Login and redirect to home page or redirect to register page.
     * 
     * @param Request $request
     */
    public function register(Request $request)
    {
        $request->session()->reflash();
        
        Validator::make($request->all(), [
            'username' => 'required|string|max:16|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|confirmed',
            'birthDate' => 'required|date|before:-13 years',
            'gender' => 'required|string',
            'google_id' => 'required|string',
        ])->validate();


        $newUser = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'google_id'=> $request->google_id,
            'password' => bcrypt($request->password),                
            'birthdate' => $request->birthDate,
            'gender' => $request->gender
        ]);

        Auth::login($newUser);

        return redirect('/');
            
    }
}
