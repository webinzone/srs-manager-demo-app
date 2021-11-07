<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\RoomItem;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use App\Models\CompanyMaster;
use App\Models\LocationMaster;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;
use DB;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class RoomItemsController extends Controller
{
    /**
     * Returns a view that invokes the ajax tables which actually contains
     * the content for the accessories listing, which is generated in getDatatable.
     *
     * @since [v1.0]
     * @return View
     */
    public function index()
    {
        $this->authorize('view', RoomItem::class);
         $room_items = RoomItem::orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
       
        return view('room_items/index', compact('room_items'));
    }

     /**
     * Returns a view with a form to create a new Accessory.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create',RoomItem::class);
        $last_roomid        =   RoomItem::orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->first();
        if ($last_roomid) {
            $str = $last_roomid->icode;
        }
        else
        {
            $str = 'I000';
        }
        $item_no = ++$str;
        return view('room_items/create', compact('item_no'));
    }


    /**
     * Validate and save new Accessory from form post
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @return Redirect
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store()
    {
        $this->authorize('store',RoomItem::class);
        $room_item = new RoomItem();
        $room_item->icode = request('icode') ?? ' ';
        $room_item->iname = request('iname') ?? ' ';

        $room_item->company_id = Auth::user()->c_id  ?? '';
        $room_item->location_id = Auth::user()->l_id  ?? '';
        $room_item->user_id =  Auth::user()->id;
        
        $room_item->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Room Items";
      $activity->save();

      return redirect()->route('room_items.index')
                    ->with('success','created successfully');
              

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show',RoomItem::class);
          
        $room_item = RoomItem::find($id);
      return view('room_items/show', compact('room_item'));
      //  $room_item = RoomItem::find($id);
       // return view('room_items/show',compact('room_item'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',RoomItem::class);
        $room_item = RoomItem::find($id);
        return view('room_items/edit', compact('room_item'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->authorize('update', RoomItem::class);
        $room_item = RoomItem::find($id);
        //$id = request('res_name');
       // $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        //$name = $res->fname." ".$res->mname." ".$res->lname;
        $room_item->icode = request('icode') ?? ' ';
        $room_item->iname = request('iname') ?? ' ';
        $room_item->company_id = Auth::user()->c_id  ?? '';
        $room_item->location_id = Auth::user()->l_id  ?? '';
        $room_item->user_id =  Auth::user()->id;
        
        $room_item->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Room Item";
        $activity->save();

        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('roomDetails', $room_item->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('room_items.index')
                        ->with('success','updated successfully');
                    }
        
    }


    public function destroy($id)
    {
        $this->authorize('destroy', RoomItem::class);
        RoomItem::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Room Item";
        $activity->save();
        return redirect()->route('room_items.index')
                        ->with('success','deleted successfully');
    }

  

           

     

}
