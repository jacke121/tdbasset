<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

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

}
