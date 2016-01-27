<?php namespace App\Http\Controllers\backend;

use App\Http\Controllers\PagesController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model\Member;
use Log;
use Auth;

class CheckNoController extends PagesController
{
    /**
     * Create a new authentication controller instance.
     */
    public function __construct(Guard $auth)
    {
        $this->auth = Auth::member();// $auth;
    }

    public function getIndex(Request $request)
    {
        return view('backend.authe.index');
    }

    public function getAwaiting(Request $request)
    { 
    	$pageindex=1;
    	if(!empty($request->get('page'))){
    		$pageindex=$request->get('page');
    	}
        $querystr=  $this->getParas($request);
//     	$sql ="select `id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`photo`,
// `desc`,`type`,`mobile`,`lifestatus`,`itemname`,`cardno`,`cardnourl`,`ownername`,`capacity`,`authestatus`,
// `authemsg`,`address`,`roletype`,`addresscode`,case type  WHEN 1 THEN '律师' WHEN 2 THEN '企业' WHEN 3 THEN '个人' end  AS typename,
//                 case roletype  WHEN 1 THEN '代理方' WHEN 2 THEN '委托方' end  AS rolename
//  				from members where lifestatus=1 and (authestatus=1 or authestatus=3) order by id desc";
    	$sql ="select *,case type  WHEN 1 THEN '律师' WHEN 2 THEN '企业' WHEN 3 THEN '个人' end  AS typename,
                case roletype  WHEN 1 THEN '代理方' WHEN 2 THEN '委托方' end  AS rolename
 				from members where lifestatus=1 ".$querystr." and (authestatus=1 or authestatus=3) order by id desc";
       
      $memlist=array();
        Log::error('getAwaiting:'.$sql);
      parent::query_listinfo($sql,$pageindex,10,$memlist);
        return backendView('authe.wait.memberlist', $memlist);
    }
    public function getAwaitindex(Request $request)
    {
    	return backendView('authe.wait.index');
    }
   
    public function getNoapprove(Request $request){

        $pageindex=1;
        if(!empty($request->get('page'))){
            $pageindex=$request->get('page');
        }
        $querystr=  $this->getParas($request);
      $sql="select *,'未认证' AS authestr from members where lifestatus=1 and authestatus=0".$querystr;
        $data=array();
        parent::query_listinfo($sql,$pageindex,10,$data);
        //         ['zqList' => Zq::orderBy('id', 'DESC')->paginate(10)]);
        return backendView('authe.noapprove.memberlist', $data);
    }
    public function getNoapproveindex(Request $request)
    {
        return backendView('authe.noapprove.index');
    }
    public function getParas(Request $request){
        $querystr="";
        if($request->get('way')==2){
            $querystr =  Session::get("querystr");
        }else {
            if (!empty($request->get('name'))) {
                $querystr .= " and name like '%" . $request->get('name') . "%'";
            }
            if (!empty($request->get('mobile'))) {
                $querystr .= " and mobile like '%" . $request->get('mobile') . "%'";
            }
            if (!empty($request->get('itemname'))) {
                $querystr .= " and itemname like '%" . $request->get('itemname') . "%'";
            }
            Session::put("querystr", $querystr);
        }
        return $querystr;
    }
    public function getApproved(Request $request)
    {
        $pageindex=1;
        if(!empty($request->get('page'))){
            $pageindex=$request->get('page');
        }
        $querystr=  $this->getparas($request);
        $sql="select *,case authestatus  WHEN 4 THEN '通过' WHEN 3 THEN '未通过' WHEN 2 THEN '已冻结' end  AS authestr,
                case type  WHEN 1 THEN '律师' WHEN 2 THEN '企业' WHEN 3 THEN '个人' end  AS typename,case roletype  WHEN 1 THEN '代理方' WHEN 2 THEN '委托方' end  AS rolename
 				from members where lifestatus=1  ".$querystr." and (authestatus=2 or authestatus=4)";
        $data=array();
        parent::query_listinfo($sql,$pageindex,10,$data);
        return backendView('authe.approved.memberlist', $data);
    }
    public function getApprovedindex(Request $request)
    {
        return backendView('authe.approved.index');
    }
    public function getApprove($id)
    {
        $member = Member::find($id);
        $member->cardnourl = explode(";",$member->cardnourl);
        if ($member->type == 1) {
            //律师
            return backendView('authe.wait.approvelayer')->withMember($member);
        } else if ($member->type == 2) {
            //企业
            return backendView('authe.wait.approvecompany')->withMember($member);
        } else if ($member->type == 3) {
            //个人
            return backendView('authe.wait.approveperson')->withMember($member);
        }

    }

    public function getView($id)
    {
        $member = Member::find($id);
        $member->cardnourl = explode(";",$member->cardnourl);
        if ($member->type == 1) {
            //律师
            return backendView('authe.approved.approvelayer')->withMember($member);
        } else if ($member->type == 2) {
            //企业
            return backendView('authe.approved.approvecompany')->withMember($member);
        } else if ($member->type == 3) {
            //个人
            return backendView('authe.approved.approveperson')->withMember($member);
        }  else  {
            //个人
            return backendView('authe.noapprove.member')->withMember($member);
        }
    }

    public function getAutheperson($id)//见明之意，就是提交请求到login方法，
    {
        return view('member.index.autheperson');
    }

    public function getFreeze($id,$authestatus)//见明之意，就是提交请求到login方法，
    {
        if($authestatus==2){
            $authestatus=4;
        }else{
            $authestatus=2;
        }
        $array = [
            "authestatus" => $authestatus
        ];
        if (Member::where('id', $id)->update($array)) {
            return redirect('/backend/authe/approved');
        }
    }

    public function postApprove(Request $request)
    {
        // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
        Log::error('postApprove:' . $request->get("authemsg"));

        $array = [
            "authestatus" => $request->get("authestatus"),
            "authemsg" => $request->get("authemsg")
        ];
        $member = new Member();
        $member->authestatus = $request->get("authestatus");
        $member->authemsg = $request->get("authemsg");
        if (Member::where('id', $request->get("id"))->update($array)) {
            return redirect('/backend/authe/approvedindex');
        }
//				   DB::table('members')
//						   ->where('id', $request->get("id"))
//						   ->update(array('authestatus' =>  $request->get("authestatus"),'authemsg' =>  $request->get("authemsg")));

        return parent::returnJson(0, "提交成功");
    }

    public function getAuthecompany(Request $request)//见明之意，就是提交请求到login方法，
    {
        return view('member.index.authecompany');
    }

    public function postAuthecompany(Request $request)
    {

        // $this->validate($request, ['itemname' => 'required|min:3', 'email' =>'required','no'=>'required']);
        $member = new Member();
        $member->id = $this->auth->get()->id;
        $member->type = 3;
        $member->roletype = $request->get('roletype');
        $member->itemname = $request->get('itemname');
        $member->email = $request->get('email');
        $member->no = $request->get('no');
        $member->updatememberInfo($member->id, $member);
        return parent::returnJson(0, "提交成功");
    }
}
