<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

use App\Models\Favourite;
use Laravel\Socialite\Two\InvalidStateException;

class AuthController extends Controller
{
//    protected $pid;
    //SIGN-IN PAGE
    public function signIn(){
        return view('frontend.pages.sign-in');
    }
    //STORE SIGN-IN DATA
    public function signIn_store(Request $request)
    {
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'signInEmail' => 'required',
            'signInPassword' => 'required',
        ]);
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);
        }else{
            //CHECK EMAIL AND PASSWORD
            $email = $request->input('signInEmail');
            $password = $request->input('signInPassword');
            //PASS AUTHENTICATION
            if(Auth::attempt(['email'=>$email,'password'=>$password,'role'=>'user'])){
                $response = array('success' => '1', 'message' => 'Sign In Successfully.');
            }else{
                $response = array('success' => '0', 'message' => 'Invalid credentials.');
            }
        }

        $request->session()->put('email', $email);
        $request->session()->put('password', $password);

        return response()->json($response);
    }
    //STORE SIGN-UP DATA
    public function signUp_store(Request $request)
    {
        //APPLY VALIDATION RULES
        $validator = Validator::make($request->all(),[
            'signUpUsername' => 'required|string|unique:users,name',
            'signUpEmail' => 'required|email|unique:users,email',
            'signUpPassword' => 'required',
            'signUpReTypePassword' => 'required_with:signUpPassword|same:signUpPassword',
            'signUpTerms' => 'required'
        ]);
        if ($validator->fails())
        {
            $validation_error = "";
            foreach ($validator->errors()->getMessages() as $key => $value) {
                $validation_error .= $value[0]."<br>";
            }
            $response = array('success' => '0', 'message' => $validation_error);
        }else{
            $user = new User(array(
                'name' => $request->input('signUpUsername'),
                'email' => $request->input('signUpEmail'),
                'password' => Hash::make($request->input('signUpPassword')),
                'role' => 'user',
            ));
            $user->save();
            Auth::login($user);
            $response = array('success' => '1', 'message' => 'Sign Up successfully you can sign In now.');
        }
        return response()->json($response);
    }
    //GOOGLE LOGIN
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    //GOOGLE CALLBACK
    public function handleGoogleCallback(){
        //return "called";
        //$user = Socialite::driver('google')->stateless()->user();
        try{
            $user = Socialite::driver('google')->stateless()->user();
        }catch (InvalidStateException $e){
            $user = Socialite::driver('google')->stateless()->user();
        }

        $this->_registerOrLoginUser($user);
        //return add-property form after login
        return redirect('/my-profile');




        //$user = Socialite::driver('google')->user();
//        try{
//            $user = Socialite::driver('google')->user();
//        }catch (InvalidStateException $e){
//            $user = Socialite::driver('google')->stateless()->user();
//        }

        //$this->_registerOrLoginUser($user);
        //return add-property form after login
        //return redirect('/my-profile');
    }
    //FACEBOOK LOGIN
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    //FACEBOOK CALLBACK
    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($user);
        //return add-property form after login
        return redirect('/my-profile');
    }
    //STORE FACEBOOK & GOOGLE LOGIN DATA IN DATABASE
    protected function _registerOrLoginUser($data){
        $user = User::query()->where('email','=',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->role = 'user';
            $user->save();
        }
        Auth::login($user);
    }
    //LOGOUT
    public function auth_logout(Request $request){
        Auth::logout();
        //SESSION DESTROY
        if($request->session()->has('media_name')){
            $request->session()->remove('media_name');
        }
        return redirect('/coming-soon');
    }
    //for property favourite
    public function like($property_id){
        if(Auth::check()){
            $pid = Auth::user()->id;
            $favoriteItem = Favourite::query()->where(['property_id' => $property_id, 'user_id' => $pid,'is_fav' => '1'])->first();
            if(!$favoriteItem) {
                Favourite::query()->create([
                    'property_id'   => $property_id,
                    'user_id'       => $pid,
                    'is_fav'        => '1'
                ]);

                /*$property = Property::query()->where('id', $property_id)->first();
                $property->update([
                    'favourite' => $property + 1
                ]);*/
                /*Property::query()->where(['id','=',$pid])->update([
                    'favourite' => '1'
                ]);*/
            }
        }else{
            return redirect('/coming-soon');
//            return redirect('/sign-in')->with('error','Please Sign in first!');
        }
        return redirect('/my-favourite')->with('success','Property Favourite.');
    }
    //for property unFavourite
    public function unlike($property_id){

        if(Auth::check()){
            $pid = Auth::user()->id;
                Favourite::query()->where('property_id',$property_id)
                    ->where('user_id',$pid)->delete();
        }else{
            return redirect('/coming-soon');
//            return redirect('/sign-in')->with('error','Please Sign in first!');
        }
        return redirect('/my-favourite')->with('success','Property Unfavourite.');
    }
}
