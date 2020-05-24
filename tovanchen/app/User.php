<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = ['email', 'password'];

    public function user_profile(){
        return $this->hasOne(UserProfile::class);
    }

    public static function getAll(){
      return self::with('user_profile')->orderBy('id', 'desc')->paginate(10);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }

    public static function getUser($id){
        return self::with('user_profile')->where('id', $id)->first();
    }

    public static function createUser($requests){
        $user = new self();
        $user->email = $requests['email'];
        $user->password = $requests['password'];
        $user->save();
        return $user;
    }

    public static function deleteUser($id){
        return self::find($id)->delete();
    }
}
