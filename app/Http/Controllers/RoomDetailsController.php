<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\RoomDetail;
use App\Models\ClientDetail;
use App\Models\ConditionReport;
use App\Models\ResidentAgreement;
use App\Models\TransferRecord;
use App\Models\Rent;
use App\Models\Vaccate;
use App\Models\ProgressNote;

use App\Models\ActivityLog;
use App\Models\Bed;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class RoomDetailsController extends Controller
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
        $this->authorize('view', RoomDetail::class);
        $room_details = RoomDetail::all();
        return view('room_details/index',compact('room_details'));
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
         // Show the page
        $this->authorize('create',RoomDetail::class);
        $last_roomid        =   RoomDetail::orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->first();
        if ($last_roomid) {
            $str = $last_roomid->room_no;
        }
        else
        {
            $str = 'R000';
        }
        $room_no = ++$str;
        
        return view('room_details/create',compact('room_no'));
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
        $this->authorize('create',RoomDetail::class);
        $room_detail = new RoomDetail();

        $room_detail->room_no = request('room_no');
        $room_detail->type = request('type');
        $room_detail->room_rent = request('room_rent') ?? ' ';
        $room_detail->client_type = request('client_type') ?? ' ';;
        $room_detail->client_id = request('client_id') ?? ' ';
        $room_detail->status = request('status') ?? 'Vacant';
        $room_detail->beds_no = request('beds_no') ?? '1';
        $room_detail->company_id = Auth::user()->c_id  ?? '';
        $room_detail->location_id = Auth::user()->l_id  ?? '';
        $room_detail->user_id =  Auth::user()->id;
        $bedno = request('beds_no') ?? '1';
        $num = (int)$bedno;
        $room_detail->save();

        if ($num) {
           $bed = 'A';
           for ($i=0; $i < $num ; $i++) { 
                $bed_detail = new Bed();
                $bed_detail->room_id = $room_detail->id ?? ' ';
                $bed_detail->room_no = $room_detail->room_no ?? ' ';
                $bed_detail->bed_no = $bed ?? ' ';
                $bed_detail->status = 'Vacant';
                $bed_detail->res_name = $room_detail->client_id ?? ' ';
                $bed_detail->company_id = Auth::user()->c_id  ?? '';
                $bed_detail->location_id = Auth::user()->l_id  ?? '';
                $bed_detail->user_id = Auth::user()->id;
                $bed_detail->save();
                $bed = ++$bed;
           }
        }
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Room";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
      $activity->save();

      return redirect()->route('room_details.index')
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
        $this->authorize('show',RoomDetail::class);
        $room_detail = RoomDetail::find($id);
        $bed_details = Bed::where('room_id', '=', $id)->get();
        return view('room_details/show',compact('room_detail','bed_details'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',RoomDetail::class);
        $room_detail = RoomDetail::find($id);
        return view('room_details/edit',compact('room_detail'));
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
        $this->authorize('update', RoomDetail::class);
        $room_detail = RoomDetail::find($id);

        $room_detail->room_no = request('room_no');
        $room_detail->type = request('type');
        $room_detail->room_rent = request('room_rent') ?? ' ';
        $room_detail->client_type = request('client_type') ?? ' ';;
        $room_detail->client_id = request('client_id') ?? ' ';
        $room_detail->status = request('status') ?? 'Vacant';
        $room_detail->beds_no = request('beds_no') ?? ' ';
        $room_detail->company_id = Auth::user()->c_id  ?? '';
        $room_detail->location_id = Auth::user()->l_id  ?? '';
        $room_detail->user_id =  Auth::user()->id;
        $bedno = request('beds_no');
        $num = (int)$bedno;
        $room_detail->save();

        Bed::where('room_id', '=', $id)->delete();

        if ($num) {
           $bed = 'A';
           for ($i=0; $i < $num ; $i++) { 
                $bed_detail = new Bed();
                $bed_detail->room_id = $room_detail->id ?? ' ';
                $bed_detail->room_no = $room_detail->room_no ?? ' ';
                $bed_detail->bed_no = $bed ?? ' ';
                $bed_detail->status = 'Vacant';
                $bed_detail->res_name = $room_detail->client_id ?? ' ';
                $bed_detail->company_id = Auth::user()->c_id  ?? '';
                $bed_detail->location_id = Auth::user()->l_id  ?? '';
                $bed_detail->user_id = Auth::user()->id;
                $bed_detail->save();
                $bed = ++$bed;
           }
        }
        
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Room";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect()->route('room_details.index')
                        ->with('success','updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('destroy', RoomDetail::class);
        RoomDetail::destroy($id);
        Bed::where('room_id', '=', $id)->delete();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Room";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('room_details.index')
                        ->with('success','deleted successfully');
    }

    public function getBed($id){
      
         $st = "Vacant";
         return response()->json([
            'beds' => Bed::where('room_id', '=', $id)->where('status', '=', $st)->get()
        ]);
     }

    public function roomexchange(){
        $rooms = RoomDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('room_details/roomexchange',compact('rooms','residents'));
    }

    public function exchange(){
        $cid = request('res_name');
        $roomid = request('room_no');
        $bed =  request('bed');
        
        $client_detail = ClientDetail::where('id', '=', $cid)->firstOrFail();
        $client_r = $client_detail->room_no;
        $client_b = $client_detail->bed_no;

        $roomdetails = RoomDetail::where('room_no', '=', $client_r)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrrid = $roomdetails->id;
        $r_beds = $roomdetails->beds_no;

        $bed_details = Bed::where('room_id', '=', $rrrid)->where('bed_no', '=', $client_b)->firstOrFail();
        $bed_details->status = "Vacant";
        $bed_details->res_name = " ";
        $bed_details->save();
        $booked = "Booked";
        $bed_det = Bed::where('room_id', '=', $rrrid)->where('status', '=', $booked)->get();
        $b_count = count($bed_det);
        $r_count = (int)$r_beds;

        if($b_count == $r_count){
            $roomdeta = RoomDetail::where('room_no', '=', $client_r)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Booked";
            $roomdeta->save();
        }else{
            $roomdeta = RoomDetail::where('room_no', '=', $client_r)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Vacant";
            $roomdeta->save();
        }
        


        $roomm = RoomDetail::where('id', '=', $roomid)->firstOrFail();
        $room = $roomm->room_no;
        $roomdetails = RoomDetail::where('room_no', '=', $room)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrrid = $roomdetails->id;
        $r_beds = $roomdetails->beds_no;

         $roomdetails->client_id = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
        $roomdetails->save();

        $bed_details = Bed::where('room_id', '=', $rrrid)->where('bed_no', '=', $bed)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $bed_details->status = "Booked";
        $bed_details->res_name = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
        $bed_details->save();
        $booked = "Booked";
        $bed_det = Bed::where('room_id', '=', $rrrid)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('status', '=', $booked)->get();
        $b_count = count($bed_det);
        $r_count = (int)$r_beds;

        if($b_count == $r_count){
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Booked";
            $roomdeta->save();
        }

        $res = ClientDetail::where('id', '=', $cid)->firstOrFail();
        $res->room_no = $room;
        $res->bed_no = $bed;
        $res->save();

        $checker1 = ConditionReport::select('client_id')->where('client_id', '=', $cid)->exists();
        $checker2 = ResidentAgreement::select('client_id')->where('client_id', '=', $cid)->exists();
        $checker3 = Vaccate::select('client_id')->where('client_id', '=', $cid)->exists();
        $checker4 = Rent::select('client_id')->where('client_id', '=', $cid)->exists();
        $checker5 = ProgressNote::select('client_id')->where('client_id', '=', $cid)->exists();

        if ($checker1 == true) {
            $condi = ConditionReport::where('client_id', '=', $cid)->firstOrFail();
            $condi->room = $room;
            $condi->save();
        }
        
        if ($checker2 == true) {
            $condi = ResidentAgreement::where('client_id', '=', $cid)->firstOrFail();
            $condi->room_no = $room;
            $condi->save();
        }

        if ($checker3 == true) {
            $condi = Vaccate::where('client_id', '=', $cid)->firstOrFail();
            $condi->roomno = $room;
            $condi->save();
        }

        if ($checker4 == true) {

            $condi = Rent::where('client_id', '=', $cid)->firstOrFail();
            $condi->roomno = $room;
            $condi->save();
        }
        if ($checker5 == true) {
            $condi = ProgressNote::where('client_id', '=', $cid)->firstOrFail();
            $condi->room = $room;
            $condi->save();
        }
        return redirect()->route('room_details.index')
                        ->with('success','Room Changed Successfully');
    }

}
