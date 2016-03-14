<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/30
 * Time: 20:34
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Input;

class Apply extends Model
{

    public static function getApplyList($uid, $zid)
    {
        $model = self::select()->where(['uid'=>$uid,'zid'=>$zid]);
        return $model;
    }

    public static function getApplyListByZid($zid)
    {
        $model = self::select()->where(['zid'=>$zid])->orderBy('id', 'DESC')->paginate(10);;
        return $model;
    }
}