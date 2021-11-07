<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\RoomItemsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\RoomItem;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class RoomItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('index', RoomItem::class);
        
        $room_items = RoomItem::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $room_items = $room_items->TextSearch($request->input('search'));
        }
        
        $offset = (($room_items) && ($request->get('offset') > $room_items->count())) ? $room_items->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $room_items->count();
        $room_items = $room_items->skip($offset)->take($limit)->get();
        return (new RoomItemsTransformer)->transformRoomItems($room_items, $total);
    }


    
    
}
