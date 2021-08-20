<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Term;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $data_ = [
            'title' => 'Odalar',

            'roomCursor' => Room::where('status', '<>', 't')->paginate(10),
        ];
        $termCursor = Term::where('status' , 'a')->where('obj', 'HOTEL')->get();

        foreach($termCursor as $term){
            $data_['term_'][$term->obj_id][] = $term;
        }
        return view('admin.room.index', $data_);
    }

    public function edit(Request $request)
    {
        $data_ = [
            'title' => "Oda Ekle/Düzenle",
            'hotel' => Hotel::where('status', '<>', 't')->get(),
        ];
        $data_['room'] = new Room();
        if ($request->input('room_id'))
        {
            $data_['room'] = Room::findOrFail($request->input('room_id'));
        }

        return view('admin.room.edit', $data_);
    }
    public function save(Request $request)
    {
        $room = Room::updateOrCreate(
            ['id' => $request->id],
            [
                'hotel_id' => $request->hotel_id,
                'stock' => $request->stock,
                'name' => $request->name,
                'info_s' => $request->info_s,
                'adt_cnt' => $request->adt_cnt,
                'kid_cnt' => $request->kid_cnt
            ]
        );
        return redirect()->route('admin.room');
    }
    public function delete(Request $request)
    {

    }
}
