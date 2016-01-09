<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;

class Member extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;
    protected $table = 'members';

    protected $fillable = ['name', 'type', 'mobile', 'email', 'password', 'photo', 'desc'];
    protected $hidden = ['password', 'remember_token'];

    static $members = [];

    public static function getmemberInfoModelBymemberId($memberId)
    {
        return self::select(id, name, email, password, remember_token, created_at, updated_at, photo, `desc`, type, mobile, lifestatus, itemname, cardno, cardnourl, ownername, capacity, authestatus, authemsg, address)->find($memberId);
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

        return !empty($memberName) ? $memberName : '用户不存在';

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
            if (!empty($data['roletype'])) {
                $member->roletype = $data['roletype'];
            }
            if (!empty($data['mobile'])) {
                $member->mobile = $data['mobile'];
            }
            if (!empty($data['email'])) {
                $member->email = $data['email'];
            }
            if (!empty($data['cardno'])) {
                $member->cardno = $data['cardno'];
            }
            if (!empty($data['cardnourl'])) {
                $member->cardnourl = $data['cardnourl'];
            }
            if (!empty($data['capacity'])) {
                $member->capacity = $data['capacity'];
            }
            if (!empty($data['password'])) {
                $member->password = $data['password'];
            }
            if (!empty($data['ownername'])) {
                $member->ownername = $data['ownername'];
            }
            $photo = uploadFile('img', 'photo', 'uploads');
            if (!empty($photo)) {
                $member->photo = $photo;
            }
            $member->desc = $data['desc'];
            return $member->save();
        }
        return false;
    }

}
