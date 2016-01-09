<?php namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Response;
use Illuminate\Http\Request;
use App\Model\Member;
use Log;
use Auth;

class AuthenticateController extends Controller
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
        $data = array(
            'member' => DB::select("select * from members where lifestatus=1 and authestatus=0"),
        );
        return backendView('authe.wait.index', $data);
    }

    public function getApprove($id)
    {
        $member = Member::find($id);
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
        if ($member->type == 1) {
            //律师
            return backendView('authe.approved.approvelayer')->withMember($member);
        } else if ($member->type == 2) {
            //企业
            return backendView('authe.approved.approvecompany')->withMember($member);
        } else if ($member->type == 3) {
            //个人
            return backendView('authe.approved.approveperson')->withMember($member);
        }

    }



    public function getNoapprove(Request $request)
    {
        Log::error('postAuthelayer:' . $request->get('itemname'));
        $data = array(
            'member' => DB::select("select * from members where lifestatus=1 and authestatus=0"),
        );
        return backendView('authe.noapprove.index', $data);
    }
    public function getApproved(Request $request)
    {
        Log::error('postAuthelayer:' . $request->get('itemname'));
        $data = array(
            'member' => DB::select("select *,case authestatus  WHEN 4 THEN '通过' WHEN 3 THEN '未通过' WHEN 2 THEN '已冻结' end  AS authestr
 				from members where lifestatus=1 and authestatus>1"),
        );
        return backendView('authe.approved.index', $data);
    }

    public function getAutheperson($id)//见明之意，就是提交请求到login方法，
    {
        return view('member.index.autheperson');
    }

    public function getFreeze($id)//见明之意，就是提交请求到login方法，
    {
        $array = [
            "authestatus" => 1
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
            return redirect('/backend/authe/approved');
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
