<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\RoomDetailsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\RoomDetail;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class RoomDetailsController extends Controller
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
        $this->authorize('index', RoomDetail::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $room_details = RoomDetail::where('user_id', '=', Auth::user()->id);
       

        if ($request->filled('search')) {
            $room_details = $room_details->TextSearch($request->input('search'));
        }
        
        $offset = (($room_details) && ($request->get('offset') > $room_details->count())) ? $room_details->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $room_details->count();
        $room_details = $room_details->skip($offset)->take($limit)->get();
        return (new RoomDetailsTransformer)->transformRoomDetails($room_details, $total);
    }


    
    
}
