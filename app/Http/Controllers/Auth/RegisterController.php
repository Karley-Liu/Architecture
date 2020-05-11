<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Http\UploadedFile;
use Captcha;
use Session;

use App\Model\Users;
use App\Model\Global_area;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'captcha' => ['required','captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    public function register(Request $request){
    	if(Input::method()=='POST'){
			$rules=Captcha::check($request['captcha']);
			if(!$rules){
				return ['code'=>0,'msg' =>'验证码错误'];
			}else{
                $isEmail=Users::where('email',$request['email']) ->first();
                if($isEmail){
                    return ['code'=>1,'msg'=>'邮箱已存在'];
                }else if($request->hasFile('avatar')&& $request -> file('avatar') -> isValid()){
		    		$avatarNewName = $request['name'] . md5(time() . rand(100000,999999)) . '.' . $request -> file('avatar')
		    		->getClientOriginalExtension();
		//  			dd($avatarNewName);
		    		$request -> file('avatar') -> move('./audit/',$avatarNewName);
		    			
		    		$data=$request -> all();
		    			
		    		$data['avatar'] = './audit/' . $avatarNewName;
		    		$data['password']=md5($data['password']);
		    		$result = Users::create($data);
		    		return ['code'=>3,'msg'=>'注册成功'];
		    	}else{
                    return ['code'=>2,'msg'=>'请上传有效审核文件'];
                }				
			}
    	}else{
    		return '/';
    	}
   }
    
    public function dataform(Users $users){
    	if(Input::method()=='POST'){
            $id=$users['id'];
            $data=request() ->all();

            $continent_id=$data['continent'];
            $country_id=$data['country'];
            $city_id=$data['city'];

            $continent_detail=Global_area::where('area_id',$continent_id) ->first() ->toArray();
            $country_detail=Global_area::where('area_id',$country_id) ->first() ->toArray();
            $city_detail=Global_area::where('area_id',$city_id) ->first() ->toArray();
            // dump($country_detail);
            $continent=$continent_detail['area_name'];
            $country=$country_detail['area_name'];
            $city=$city_detail['area_name'];
            // dump($data);
            // $user_id=Session::get('user.id');
            // dd($user_type_id);
            Users::where('id',$id) ->update([
                // 'user_type_id' => $user_type_id,
                'tag_user' => $data['tags'],
                'continent' => $continent,
                'country' => $country,
                'city' => $city,
                'address' => $data['address'],
                'phone' => $data['phone'],
                'com_url' => $data['com_url'],
                'introduce' => $data['introduce']
            ]);
            $user=Users::where('id',$id) ->first();
            Session::put('user',$user);
            return ['code'=>1,'msg'=>'提交成功'];
    	}else{
    	return view('user.dataform'); 
        }
    }
}
