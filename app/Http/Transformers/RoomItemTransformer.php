<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\RoomItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class RoomItemsTransformer
{

    public function transformRoomItems (Collection $room_items, $total)
    {
        $array = array();
        foreach ($room_items as $room_item) {
            $array[] = self::transformRoomItem($room_item);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformRoomItem (RoomItem $room_item = null)
    {
        if ($room_item) {

            $array = [
                'id' => (int) $room_item->id,
                'icode' => e($room_item->icode),

                'iname' => e($room_item->iname),
                
                'created_at' => e(date('d-m-Y', strtotime($room_item->created_at))),
                'actions' => view('room_items/datatables_actions', compact('room_item'))->render() 
                
            ];


            return $array;
        }


    }



}
