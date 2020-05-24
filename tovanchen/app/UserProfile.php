<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public static function updateUser($requests, $id){
        $user = self::where('user_id', $id)->first();
        $user->first_name = $requests['first_name'] ;
        $user->last_name = $requests['last_name'] ;
        $user->address = $requests['address'];
        $user->save();
        return $user;
    }


}
