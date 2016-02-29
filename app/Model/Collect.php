<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/31
 * Time: 10:20
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Input;

class Collect extends Model
{
    public static function geCollectList($uid, $zid)
    {
        $model = self::select()->where(['uid'=>$uid,'zid'=>$zid]);
        return $model;
    }

    public static function geCollectListByZid($zid)
    {
        $model = self::select()->where(['zid'=>$zid])->orderBy('id', 'DESC')->paginate(10);
        return $model;
    }
}