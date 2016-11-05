<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Unis\School\Room;

class RoomController extends Controller
{
    protected $fillable = ['dorm_id', 'number'];

    public function index()
    {
    	$rooms = Room::with('dorm.campus.school')->withCount('users')->paginate(config('site.perPage'));
    	return view('backend.room.index', compact('rooms'));
    }

    public function destroy(Room $room)
    {
    	if ( 0 == $room->users->count()){
    		$room->delete();
    		return redirect()->back()->with('success', '删除成功！');
    	}
    	return redirect()->back()->with('failed', '还有住户，不能删除！');
    }
}
