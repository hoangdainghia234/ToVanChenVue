<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Room;
class RoomController extends Controller
{
    protected $room;

    public function __construct(Room $room){
      $this->room = $room;
    }

    public function index()
    {
      $rooms = $this->room::getAll();
      return response()->json($rooms, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validation = Validator::make($request->all(),
            [ 
                'name' => 'required|unique:rooms,name',
                'user_id' => 'required',
            ],

            [
                'name.required' => "Tên phòng không được để trống",
                'name.unique' => "Tên phòng đã tồn tại",
                'user_id.required' => "Người tạo không được để trống"
            ]
        );
        if($validation->fails()){
            $errors = $validation->errors();
            return response()->json([ 'messages' => $errors], 400);
        } else{
            $room = $this->room->createRoom($request->all());
            return response()->json(['messages' => 'success', 'data' => $room], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $room = $this->room->updateRoom($id);
      return response()->json(['messages' => 'success', 'data' => $room], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
