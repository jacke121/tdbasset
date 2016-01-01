<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id','name', 'type','mobile','email', 'password','photo','desc'];

	/**
	 * The attributes excluded from the model's JSON form.
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    static $users = [];

    public static function getUserInfoModelByUserId($userId){
        return self::select('id','type','name','mobile','email','photo','desc')->find($userId);
    }

    public static function getUserArr($userId){

        if(!isset(self::$users[$userId])){
            $user = self::select('name')->find($userId)->toArray();
            if(empty($user)){
                return false;
            }
            self::$users[$userId] = $user['name'];
        }

        return self::$users[$userId];
    }

    public static function getUserNameByUserId($userId){

        $userName = self::getUserArr($userId);

        return !empty($userName)?$userName:'用户不存在';

    }

    /**
     * 更新用户
     * @param $id
     * @param $data
     * @return bool
     */
    public static function updateUserInfo($id,$data){

        if(!empty($id) && !empty($data)){


            $user = self::find($id);
            $user->name = $data['name'];
            $user->mobile = $data['mobile'];
            $user->email = $data['email'];
            if(!empty($data['password'])){
                $user->password = bcrypt($data['password']);
            }
            $photo = uploadFile('img','photo','uploads');
            if(!empty($photo)){
                $user->photo = $photo;
            }

            $user->desc = $data['desc'];

            return $user->save();
        }
        return false;
    }

}
