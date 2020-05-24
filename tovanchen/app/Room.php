<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['name', 'slug', 'user_id', 'is_active', 'status'];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public static function getAll(){
      return self::with('user')->orderBy('id', 'desc')->paginate(10);
    }

    public static function createRoom($requests){
      $room = new self();
        $room->name = $requests['name'];
        $room->slug = str_slug($requests['name']);
        $room->is_active = $requests['is_active'] ? $requests['is_active']  : 0;
        $room->status = $requests['status'] ? $requests['status']  : 0;
        $room->user_id = $requests['user_id'];
        $room->save();
        return $room;
    }

    public static function updateRoom($id){
      $room = self::findOrFail($id);
      $room->status = $room->status == 0 ? 1 : 0;
      $room->save();
      return $room;
    }
}
