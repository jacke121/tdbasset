<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/28
 * Time: 19:42
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Input;

class Zq extends Model
{
    const REDIS_ZQ_CACHE = 'redis_zq_cache_';
    const REDIS_ZQ_PAGE_TAG = 'redis_zq_page_tag';

    public static function getZqList($province, $city, $contry, $money_scope, $delay_scope, $limit = 4)
    {

        $page = Input::get('page', 1);
        $cacheName = $province.'_'.$city.'_'.$contry.'_'.$money_scope.'_'.$delay_scope.'_'.$page.'_'.$limit;
        if (empty($model = Cache::tags(self::REDIS_ZQ_PAGE_TAG)->get(self::REDIS_ZQ_CACHE . $cacheName))) {
            $model = self::select('id')->where(['o_province'=>$province,'o_city'=>$city,'o_contry'=>$contry,'money_scope'=>$money_scope,'delay_scope'=>$delay_scope])->orderBy('id', 'DESC')->paginate($limit);
            Cache::tags(self::REDIS_ZQ_PAGE_TAG)->put(self::REDIS_ZQ_CACHE . $cacheName, $model, self::$cacheMinutes);
        }

        $zqList = array(
            'data' => [],
        );
        foreach ($model as $key => $zq) {
            $zqList['data'][$key] = self::getZqModelById($zq->id);
        }
        $zqList['page'] = $model;
        return $zqList;
    }

    public static function getZqModelById($zid)
    {
        if (empty($zq = Cache::get(self::REDIS_ZQ_CACHE . $zid))) {
            $zq = self::find($zid);
            Cache::add(self::REDIS_ZQ_CACHE . $zid, $zq, self::$cacheMinutes);
        }
        return $zq;
    }

    public static function updateAppNumber($zid){
        return self::where('id',$zid)->increment('applys');
    }

    public static function updateCollectNumber($zid){
        return self::where('id',$zid)->increment('collects');
    }
}