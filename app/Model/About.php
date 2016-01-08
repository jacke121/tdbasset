<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/6
 * Time: 19:43
 */

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Input, Request, Cache;

class About extends Model
{
    const REDIS_ABOUT_CACHE = 'redis_about_cache_';
    const REDIS_ABOUT_PAGE_TAG = 'redis_about_page_tag';
    static $cacheMinutes = 1440;

    public static function getAboutlById($id)
    {
        if (empty($about = Cache::get(self::REDIS_ABOUT_CACHE . $id))) {
            $about = self::find($id);
            Cache::add(self::REDIS_ABOUT_CACHE . $id, $about, self::$cacheMinutes);
        }
        return $about;
    }
}