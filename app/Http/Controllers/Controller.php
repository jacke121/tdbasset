<?php namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Log;

abstract class Controller extends BaseController {
use DispatchesCommands, ValidatesRequests;
        function returnJson($code,$msg){
        $arr = array(); //生成一个数组
        $arr['State'] =$code;
        $arr['MsgState'] =$msg;
        echo  json_encode($arr);
        }
   
        /*取得随机字符串
        */
        function get_code($length=32,$mode=0)//获取随机验证码函数
        {
                switch ($mode)
                {
                        case '1':
                                $str='123456789';
                                break;
                        case '2':
                                $str='abcdefghijklmnopqrstuvwxyz';
                                break;
                        case '3':
                                $str='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                break;
                        case '4':
                                $str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                                break;
                        case '5':
                                $str='ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                break;
                        case '6':
                                $str='abcdefghijklmnopqrstuvwxyz1234567890';
                                break;
                        default:
                                $str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
                                break;
                }
                $checkstr='';
                $len=strlen($str)-1;
                for ($i=0;$i<$length;$i++)
                {
                        //$num=rand(0,$len);//产生一个0到$len之间的随机数
                        $num=mt_rand(0,$len);//产生一个0到$len之间的随机数
                        $checkstr.=$str[$num];

                      
                }
                return $checkstr;
        }
        function movefile(Request $request,$targetpath){

                $cart = array();
                $cart['status'] =1;
                $cart['msg'] ="图片不能为空";
                $path="";
                if ($request->hasFile('file')) {
                        $destinationPath = 'uploads/images/'.$targetpath."/";
                        if (is_array($request->File('file'))) {
                                $files = $request->File('file');
                                foreach ($files as $file) {
                                        Log::error($file->getClientOriginalName());
                                        $allowed_extensions = ["png", "jpg", "gif"];
                                        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                                                $cart['status']=1;
                                                $cart['msg'] ="图片只支持png, jpg or gif";
                                                return $cart;
                                        }
                                        Log::error('upload:'.$file-> getClientSize().",,,".$file-> getClientSize());
//                                        if ($file-> getClientSize()>2*1024*1024) {
//                                                $cart['status']=1;
//                                                $cart['msg'] ="图片只支持png, jpg or gif";
//                                                return $cart;
//                                        }


                                        $extension = $file->getClientOriginalExtension();
                                        $fileName = str_random(10) .'.'.$extension;
                                        $file->move($destinationPath, $fileName);
                                        Log::error("uploads:".$destinationPath.$fileName);
                                        if(empty($path)){
                                                $path.=$destinationPath.$fileName;
                                        }else{
                                                $path.=";".$destinationPath.$fileName;
                                        }
                                }
                        } else {
                                $file = $request->File('file');
                                $allowed_extensions = ["png", "jpg", "gif"];
                                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                                        $cart['status']=1;
                                        $cart['msg'] ="图片只支持png,jpg,gif";
                                        return $cart;
                                }
                                $extension = $file->getClientOriginalExtension();
                                $fileName = str_random(10).'.'.$extension;
                                $file->move($destinationPath, $fileName);
                                $path=$destinationPath.$fileName;
                        }
                        $cart['status'] =0;
                        $cart['msg'] =$path;
                }
                else{
                        Log::error('upload:nofile');
                }
                return $cart;
        }
}
