<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Member extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	protected $table = 'members';

	/**
	 * @var array
	 */
	protected $fillable = ['name', 'type','mobile','email', 'password','photo','desc'];
	protected $hidden = ['password', 'remember_token'];

    static $members = [];

    public static function getmemberInfoModelBymemberId($memberId){
        return self::select('id','type','name','mobile','email','photo','desc')->find($memberId);
    }

    public static function getmemberArr($memberId){
        if(!isset(self::$members[$memberId])){
            $member = self::select('name')->find($memberId)->toArray();
            if(empty($member)){
                return false;
            }
            self::$members[$memberId] = $member['name'];
        }

        return self::$members[$memberId];
    }

    public static function getmemberNameBymemberId($memberId){

        $memberName = self::getmemberArr($memberId);

        return !empty($memberName)?$memberName:'用户不存在';

    }

    /**
     * 更新用户
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updatememberInfo($id,$data){

        if(!empty($id) && !empty($data)){


            $member = self::find($id);
            $member->name = $data['name'];
            $member->mobile = $data['mobile'];
            $member->email = $data['email'];
            if(!empty($data['password'])){
                $member->password = bcrypt($data['password']);
            }
            $photo = uploadFile('img','photo','uploads');
            if(!empty($photo)){
                $member->photo = $photo;
            }

            $member->desc = $data['desc'];

            return $member->save();
        }
        return false;
    }

}
