<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Model\Users;
use Captcha;
use Cookie;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(){
    	return view('user.loginorsignup');
    }
    
    public function test(Request $request){
    	// session_start();
    	if(Input::method()=='POST'){
    		$data=$request->all();
	//  	dd($data);
			if($data){
				$rules=Captcha::check($data['captcha']);
				if(!$rules){
					return ['code'=>0,'msg' =>'验证码错误'];
				}else{
			    	$user=Users::where('email',$data['email']) ->first();
			    	
			    	if(!$user || $user['password']!= md5($data['password'])){
			    		return ['code'=>1,'msg'=>'用户名或密码错误'];
			    	}else{
//			    		Session::flush();
			    		Session::put('user',$user);
//			    		dump(Session());
			    		return ['code'=>2,'msg'=>'登陆成功'];
			    	}					
				}
			}
    	}
    	
    }
    
    public function logout(){
    	Session::flush();
    	return redirect('/');
    }
}
