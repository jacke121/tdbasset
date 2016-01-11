<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/10
 * Time: 18:08
 */

namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Notification,Redirect, Auth,Cache;

use App\Model\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view('backend.content.message.list', ['messageList' => Message::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $result = "删除失败";
        if(Message::destroy($id)){
            $result = "删除成功";
        }
        return $result;
    }

}