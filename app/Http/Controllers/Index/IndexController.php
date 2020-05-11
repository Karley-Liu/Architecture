<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Route;
use View;
use Session;
use DB;
use Mail;
use App\Model\Users;
use App\Model\Global_area;
use App\Model\Stories;
use App\Model\Architects;
use App\Model\Projects;
use App\Model\Functions;
use App\Model\Materials;
use App\Model\Status;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    //
    public function project(){
        $projects=Projects::where('p_delete',0)->orderby('p_id','DESC') ->get() ->toArray();
    	return view('project.project')->with('projects',$projects);
    }
    
    // public function projectContent1(){
    // 	return view('project.projectContent1');
    // }
    
    // public function projectContent2(){
    // 	return view('project.projectContent2');
    // }
    
    public function projectDetails(Projects $projects){
        $p_id=$projects['p_id'];
        // dd($p_id);
        $project=Projects::where('p_id',$p_id) ->get() ->toArray()[0];
        // dd($project);
        $data=Functions::where('id',$project['p_type'])->first()->toArray()['f_name'];
        // dd($data);
        $project['p_type']=$data;
    	return view('project.projectDetails') ->with('project',$project);
    }

    public function projectDelete(Projects $projects){
        $p_id=$projects['p_id'];
        // dd($p_id);
        Projects::where('p_id',$p_id) ->update([
            'p_delete' =>1
        ]);

        return ['code' =>1,'msg'=>'删除成功','p_id'=>$p_id];
    }
    
    public function architectors(){
        if(Input::method()=='POST'){
            $data=request() ->all();
            // dd($data);
            $users=Users::where('user_type_id',2) ->where('is_pass',0) ->orderBy('id','DESC') ->get() ->toArray();
            return $users;
        }else{
            $users=Users::where('user_type_id',2) ->where('is_pass','0') ->orderBy('id','DESC')->get()->toArray(); //要改等于1
            // dd($users);
            // dd($users);
            return view('architectors.architectors')->with('users',$users);            
        }
    }

    public function architector(Users $users){
        $id=$users['id'];
        $user=Users::where('id',$id)->first() ->toArray(); //;
        $buildings=Architects::where('ar_user_id',$id) ->where('ar_delete',0)
        ->orderBy('ar_id','DESC') ->get();
        // dd($buildings);
        $stories=Stories::where('s_user_id',$id) ->where('s_delete',0)
        ->orderBy('s_id','DESC') ->get();
        $count=$stories ->count();
        $sum=$buildings ->count();
        return view('architectors.architector',[
            'user' => $user,
            'buildings' => $buildings,
            'sum' =>$sum,
            'count' =>$count,
            'stories' =>$stories
        ]);
    }
    
    public function architects(){
        if(Input::method()=='POST'){
            $architects=Architects::where("ar_delete",0) ->orderby('ar_id','DESC') ->get() ->toArray();
            return $architects;
        }else{
            $architects=Architects::where("ar_delete",0) ->orderby('ar_id','DESC') ->get() ->toArray();
            return view('architects.architects') ->with('architects',$architects);
        }

    }

    public function architect(Architects $architects){
        $ar_id=$architects['ar_id'];
        $architect=Architects::where('ar_id',$ar_id) ->get() ->toArray()[0];
        // dd($architect['ar_type'],$architect['ar_status']);
        // dd($architect['ar_material']);

        $aa=explode(',',$architect['ar_material']);
        // dd($data['m_name']);
        $architect['ar_material']=$aa[0];
        return view('architects.architect') ->with('architect',$architect);
    }

    public function architectDelete(Architects $architects){
        $ar_id=$architects['ar_id'];
        // dd($p_id);
        Architects::where('ar_id',$ar_id) ->update([
            'ar_delete' =>1
        ]);

        return ['code' =>1,'msg'=>'删除成功','ar_id'=>$ar_id];
    }
    
    public function stories(){
        // $url=route('story');
        $stories=Stories::where('s_delete',0)->orderBy('s_id','DESC') ->get() ->toArray();
        // dd($stories);
    	return view('stories.stories')->with('stories',$stories);
    }

    public function storiesAjax(){
        $data=request() ->all();
        $s_type_id=$data['s_type_id'];
        if($s_type_id==0){
            $stories=Stories::where('s_delete',0)->orderBy('s_id','DESC')->get()->toArray();
            return $stories;
        }else{
        $stories=Stories::where('s_type_id',$s_type_id)->orderBy('s_id','DESC')->get()->toArray();
        // dd($stories);
        return $stories;
        }
    }

    public function story(Stories $stories){
        $s_id=$stories['s_id'];
        $story=Stories::where('s_id',$s_id) ->get() ->toArray()[0];
        // dd($story);
        return view('stories.story')->with('story',$story);
    }
    
    public function competitions(){
        $url=route('competition');
    	return view('competitions.competitions',compact('url'));
    }

    public function competition(){
        return view('competitions.competition');
    }
    
    public function rankings(){
        $url=route('ranking');
    	return view('rankings.rankings',compact('url'));
    }

    public function ranking(){
        return view('rankings.ranking');
    }
    
    public function releaseStory(Users $users){
        if(Input::method()=='POST'){
            $id=$users['id'];
            $data=request() ->all();
            if($data['type']==0){
                return ["code"=>0,"msg"=>"请选择文章类型"];
            }else if(!$data['title']){
                return ["code"=>1,"msg"=>"文章标题不能为空"];
            }else if(!$data['author']){
                return ["code"=>2,"msg"=>"编辑不能为空"];
            }else if(!$data['photographer']){
                return ['code'=>3,"msg"=>"摄影师不能为空"];
            }else{
                Stories::insert([
                    's_user_id' =>$id,
                    's_title' =>$data['title'],
                    's_editors' =>$data['author'],
                    's_date' => date('Y-m-d',time()),
                    's_introduce' =>$data['introduce'],
                    's_shooter' =>$data['photographer'],
                    's_tags' =>$data['tags'],
                    's_content'=>$data['content'],
                    's_cover' =>$data['imgURL'],
                    's_type_id' =>$data['type'],
                ]);
                return ["code"=>4,"msg"=>"发布成功"];
            }
        }else{
    	    return view('user.releaseStory');
        }
    }
    
    public function releaseBuliding(Users $users){
        if(Input::method()=='POST'){
            $id=$users['id'];
            $data=request()->all();
            if(!$data['ar_zh_name']){
                return ["code"=>0,"msg"=>"建筑名称不能为空"];
            }else if($data['ar_type']=="0"){
                return ["code"=>1,"msg"=>"建筑类型不能为空"];
            }else if($data['ar_status']=="0"){
                return ["code"=>2,"msg"=>"建筑状态不能为空"];
            }else if(!$data['ar_year']){
                return ['code'=>3,"msg"=>"年份不能为空"];
            }else{
                $user=Users::where('id',$id) ->first() ->toArray();
                // dd($user);

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
                
                Architects::insert([
                "ar_zh_name" =>$data['ar_zh_name'],
                "ar_type" =>$data['ar_type'],
                "ar_material" =>$data['material'],
                "ar_status" =>$data['ar_status'],
                "ar_user_id" =>$id,
                "ar_imgs" =>$data['imgURL'],
                "ar_country" =>$country,
                "ar_continent" =>$continent,
                "ar_city" =>$city,
                "ar_year" =>$data['ar_year'],
                "ar_introduce" =>$data['introduce'],
                "ar_content" =>$data['content'],
                "ar_user_name" =>$user['name'],
                ]);
            }
            return ["code"=>4,"msg"=>"发布成功"];
            // dd(request());
        }else{
            return view('user.releaseBuilding');
        }
    }
    
    public function releaseCompetition(){
    	return view('user.releaseCompetition');
    }
    
    public function release101(){
    	return view('user.release101');
    }

    public function releaseProject(Users $users){
        if(Input::method()=='POST'){
            $id=$users['id'];
            $data=request()->all();
            if(!$data['title']){
                return ["code"=>0,"msg"=>"项目名称不能为空"];
            }else if(!$data['place']){
                return ["code"=>1,"msg"=>"项目地点不能为空"];
            }else if($data['type']==0){
                return ["code"=>2,"msg"=>"建筑状态不能为空"];
            }else{
                Projects::insert([
                    "p_name" =>$data['title'],
                    "p_area" =>$data['place'],
                    "p_type" =>$data['type'],
                    "p_user_id" =>$id,
                    "p_content" =>$data['content'],
                    "p_imgURL" =>$data['imgURL'],
                    "p_date" =>date('Y-m-d',time()),
                    "p_jiafang" =>$data['jiafang'],
                ]);
                return ["code"=>4,"msg"=>"发布成功"];
            }
        }else{
            return view('user.releaseProject');
        }
        
    }
    
    public function img_save(){
        // dd(request());
        $img = request()->file('file');
        // dd($img);exit;
        $extension=$img -> getClientOriginalExtension();
        // dd($extension);exit;
		// 移动到框架应用根目录/public/uploads/ 目录下
		$info = $img->move('./logo/' . date('Y') . '/' . date('m-d'),md5(microtime(true)) . '.jpg'); // .  . $extension
//		 dd($info);
		if($info){
				// 成功上传后 获取上传信息
				// dd($info);
                $imgPath = "/logo/" . date('Y') . '/' . date('m-d') . '/' . $info->getFileName();
                $session_id=Session::get('user.id');
                Users::where('id',$session_id) ->update([
                    'logo' =>$imgPath
                ]);
                $user=Users::where('id',$session_id) ->first();
                Session::put('user',$user);
				return ["code"=>1,"msg"=>"上传成功","url" => $imgPath];
		}else{
				// 上传失败获取错误信息0
				return ["code"=> 0, "msg" => $img->getError(), "url" => ''];
		}
    }

    public function mail(Users $users){
        $id=$users['id'];
        $user=Users::where('id',$id)->first() ->toArray();
        if($user['user_type_id']==1){
            $name=$user['name'];
            $email=$user['email'];
            // dd($name);
            Mail::send("mailblade.mailtojiafang",['name'=>$name,'id'=>$id],function($message)use($email){
                $message ->from('361983537@qq.com');
                $message ->subject('你有一封私信');
                $message ->to($email);
            });
            return ['code' =>1,'msg' =>'发送成功'];
        }else{
            $name=$user['name'];
            $email=$user['email'];
            // dd($name);
            Mail::send("mailblade.mail",['name'=>$name,'id'=>$id],function($message)use($email){
                $message ->from('361983537@qq.com');
                $message ->subject('你有一封私信');
                $message ->to($email);
            });
            return ['code' =>1,'msg' =>'发送成功'];            
        }

    }

    public function manager(){
        $users=Users::where('is_pass',1)->orderBy('id','DESC')->get();
        $projects=Projects::where('p_delete',1)->orderBy('p_id','DESC')->get();
        $buildings=Architects::where('ar_delete',1) ->orderBy('ar_id','DESC')->get();
        return view('user.manager')->with(['users'=>$users,'projects'=>$projects,'buildings'=>$buildings]);
    }

    public function userManage(Users $users){
        $id=$users['id'];
        $user=request() ->all();
        if($user['idvalue']==1){
            Users::where('id',$id) ->update([
                'is_pass' =>0
            ]);
            return ['code'=>1,'msg'=>'审核通过','id' =>$id];
        }else{
            Users::where('id',$id) ->update([
                'refuse_reason' =>$user['text'],
                'refuse_status' =>1
            ]);
            return ['code'=>2,'msg'=>'原因发送成功'];
        }
    }

    public function getReason(Users $users){
        $id=$users['id'];
        $user=Users::where('id',$id) ->where('refuse_status',1) ->first();
        // dd($user);
        $text=$user['refuse_reason'];
        if($text){
            Users::where('id',$id) ->update([
                'refuse_status' =>0,
            ]);
            return ['text'=>$text];            
        }
        return null;
    }

    public function downloadFile(Users $users){
        $id=$users['id'];
        $avatar=Users::select('avatar') ->where('id',$id)->first()->toArray()['avatar'];
        // dd($avatar);
        $name=basename($avatar);
        return response() ->download($avatar,$name,$headers = ['Content-Type'=>'application/zip;charset=utf-8']);
    }

    public function projectManage(Projects $projects){
        $p_id=$projects['p_id'];
        $project=request() ->all();
        if($project['idvalue']==1){
            Projects::where('p_id',$p_id) ->update([
                'p_delete' =>0
            ]);
            return ['code'=>1,'msg'=>'审核通过','p_id' =>$p_id];
        }else{
            Projects::where('p_id',$p_id) ->update([
                'p_refuse_reason' =>$project['text'],
                'p_refuse_status' =>1
            ]);
            return ['code'=>2,'msg'=>'原因发送成功'];
        }
    }

    public function buildingManage(Architects $architects){
        $ar_id=$architects['ar_id'];
        $architect=request() ->all();
        if($architect['idvalue']==1){
            Architects::where('ar_id',$ar_id) ->update([
                'ar_delete' =>0
            ]);
            return ['code'=>1,'msg'=>'审核通过','ar_id' =>$ar_id];
        }else{
            Architects::where('ar_id',$ar_id) ->update([
                'ar_refuse_reason' =>$architect['text'],
                'ar_refuse_status' =>1
            ]);
            return ['code'=>2,'msg'=>'原因发送成功'];
        }
    }
}
