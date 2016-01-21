<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Member_log extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;
    protected $table = 'members_log';

    protected $fillable = ['ip', 'type', 'event', 'action','desc'];

    static $member_logs = [];

    public static function getmemberInfoModelBymemberId($memberId)
    {
        return self::select(id,memberid, action,ip,event, created_at, updated_at,  `desc`, type,  lifestatus)->find($memberId);
    }

    public static function getmemberArr($memberId)
    {
        if (!isset(self::$members[$memberId])) {
            $member = self::select('name')->find($memberId)->toArray();
            if (empty($member)) {
                return false;
            }
            self::$members[$memberId] = $member['name'];
        }
        return self::$members[$memberId];
    }

    public static function getmemberNameBymemberId($memberId)
    {

        $memberName = self::getmemberArr($memberId);

        return !empty($memberName) ? $memberName : '日志不存在';

    }

    /**
     * 更新用户
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updatememberInfo($id, $data)
    {
        if (!empty($id) && !empty($data)) {
            $member = self::find($id);
            $member->itemname = $data['itemname'];
            if (!empty($data['name'])) {
                $member->name = $data['name'];
            }
            if (!empty($data['type'])) {
                $member->type = $data['type'];
            }
             if (!empty($data['ip'])) {
                $member->ip = $data['ip'];
            }
           
            $member->desc = $data['desc'];
            return $member->save();
        }
        return false;
    }

}
