<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\RoomDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class RoomDetailsTransformer
{

    public function transformRoomDetails (Collection $room_details, $total)
    {
        $array = array();
        foreach ($room_details as $room_detail) {
            $array[] = self::transformRoomDetail($room_detail);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformRoomDetail (RoomDetail $room_detail = null)
    {
        if ($room_detail) {

            $array = [
                'id' => (int) $room_detail->id,
                'room_no' => e($room_detail->room_no),
                'type' => e($room_detail->type),
                'client_type' => e($room_detail->client_type),
                'client_id' => e($room_detail->client_id),
                'status' => e($room_detail->status),
                'beds_no' => e($room_detail->beds_no),
                'created_at' => e($room_detail->created_at),
                'actions' => view('room_details/datatables_actions', compact('room_detail'))->render() 
                
            ];


            return $array;
        }


    }



}
