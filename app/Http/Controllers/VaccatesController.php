<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Vaccate;
use App\Models\ClientDetail;
use App\Models\RoomDetail;
use App\Models\Bed;
use App\Models\LocationMaster;

use App\Models\ActivityLog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class VaccatesController extends Controller
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
        $this->authorize('view', Vaccate::class);
        return view('vaccates/index');
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
        $this->authorize('create',Vaccate::class);
        $residents = ClientDetail::where('status', '=', 'Active')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('vaccates/create',compact('residents'));
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
        $this->authorize('create',vaccate::class);
        $vaccate = new vaccate();
        $id = request('res_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $vaccate->res_name  = $name;
        $vaccate->client_id = $id;
        $rroom = request('roomno') ?? '';
        $bed = $res->bed_no;
        $vaccate->v_date = request('v_date') ?? '';
        $vaccate->address = request('address') ?? '';
        $vaccate->gender = request('gender') ?? '';
        $vaccate->dob = request('dob') ?? '';
        $vaccate->ph = request('ph') ?? '';
        $vaccate->email = request('email') ?? '';
        $vaccate->reason = request('reason') ?? '';
        $vaccate->roomno = request('roomno') ?? '';
        $vaccate->ex_date = request('ex_date') ?? '';
        $vaccate->al_res = request('al_res') ?? '';
        $vaccate->f_addr = request('f_addr') ?? '';
        $vaccate->pay_status = request('pay_status') ?? '';
        $vaccate->pay_amt = request('pay_amt') ?? '';
        $vaccate->p_nomini = request('p_nomini') ?? '';
        $vaccate->srs_name = request('srs_name') ?? '';
        $vaccate->srs_addr = request('srs_addr') ?? '';
        $vaccate->pr_name = request('pr_name') ?? '';
        $vaccate->pr_noti = request('pr_noti') ?? '';
        $vaccate->pr_posi = request('pr_posi') ?? '';
        $vaccate->pr_ph = request('pr_ph') ?? '';
        $vaccate->pr_adr = request('pr_adr') ?? '';
        $vaccate->ter_sec = request('ter_sec') ?? '';
        $vaccate->ter_sup = request('ter_sup') ?? '';
        $vaccate->ter_days = request('ter_days') ?? '';
        $vaccate->ter_date = request('ter_date') ?? '';
        $vaccate->act_date = request('act_date') ?? '';
        $vaccate->del_by = request('del_by') ?? '';
        $vaccate->ress_date = request('ress_date') ?? '';
        $vaccate->nomini_by = request('nomini_by') ?? '';
        $vaccate->nom_date = request('nom_date') ?? '';
        $vaccate->del_date = request('del_date') ?? '';
        $vaccate->company_id = Auth::user()->c_id  ?? '';
        $vaccate->location_id = Auth::user()->l_id  ?? '';
        $vaccate->user_id =  Auth::user()->id;

        
        $vaccate->save();

        $roomdetails = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrrid = $roomdetails->id;
        $r_beds = $roomdetails->beds_no;

        $bed_details = Bed::where('room_id', '=', $rrrid)->where('bed_no', '=', $bed)->firstOrFail();
        $bed_details->status = "Vacant";
        $bed_details->res_name = " ";
        $bed_details->save();
        $booked = "Booked";
        $bed_det = Bed::where('room_id', '=', $rrrid)->where('status', '=', $booked)->get();
        $b_count = count($bed_det);
        $r_count = (int)$r_beds;

        if($b_count == $r_count){
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Booked";
            $roomdeta->save();
        }else{
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Vacant";
            $roomdeta->save();
        }

        $ress = ClientDetail::where('id', '=', $id)->firstOrFail();
        $ress->status = "Vaccate";
        $ress->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Vaccate Report";
      $activity->save();

      return redirect()->route('vaccates.index')
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
        $this->authorize('show',Vaccate::class);
        $vaccate = Vaccate::find($id);
        return view('vaccates/show',compact('vaccate'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Vaccate::class);
        $vaccate = Vaccate::find($id);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('vaccates/edit',compact('vaccate','residents'));
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
        $this->authorize('update', Vaccate::class);
        $vaccate = Vaccate::find($id);
        $id = request('res_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $vaccate->res_name  = $name;
        $vaccate->client_id = $id;
        $bed = $res->bed_no;
        $rroom = request('roomno') ?? '';
        $vaccate->v_date = request('v_date') ?? '';
        $vaccate->address = request('address') ?? '';
        $vaccate->gender = request('gender') ?? '';
        $vaccate->dob = request('dob') ?? '';
        $vaccate->ph = request('ph') ?? '';
        $vaccate->email = request('email') ?? '';
        $vaccate->reason = request('reason') ?? '';
        $vaccate->roomno = request('roomno') ?? '';
        $vaccate->ex_date = request('ex_date') ?? '';
        $vaccate->al_res = request('al_res') ?? '';
        $vaccate->f_addr = request('f_addr') ?? '';
        $vaccate->pay_status = request('pay_status') ?? '';
        $vaccate->pay_amt = request('pay_amt') ?? '';
        $vaccate->p_nomini = request('p_nomini') ?? '';
        $vaccate->srs_name = request('srs_name') ?? '';
        $vaccate->srs_addr = request('srs_addr') ?? '';
        $vaccate->pr_name = request('pr_name') ?? '';
        $vaccate->pr_noti = request('pr_noti') ?? '';
        $vaccate->pr_posi = request('pr_posi') ?? '';
        $vaccate->pr_ph = request('pr_ph') ?? '';
        $vaccate->pr_adr = request('pr_adr') ?? '';
        $vaccate->ter_sec = request('ter_sec') ?? '';
        $vaccate->ter_sup = request('ter_sup') ?? '';
        $vaccate->ter_days = request('ter_days') ?? '';
        $vaccate->ter_date = request('ter_date') ?? '';
        $vaccate->act_date = request('act_date') ?? '';
        $vaccate->del_by = request('del_by') ?? '';
        $vaccate->ress_date = request('ress_date') ?? '';
        $vaccate->nomini_by = request('nomini_by') ?? '';
        $vaccate->nom_date = request('nom_date') ?? '';
        $vaccate->del_date = request('del_date') ?? '';
        $vaccate->company_id = Auth::user()->c_id  ?? '';
        $vaccate->location_id = Auth::user()->l_id  ?? '';
        $vaccate->user_id =  Auth::user()->id;
        
        $vaccate->save();

      
        
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Vaccate Report";
        $activity->save();

        return redirect()->route('vaccates.index')
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
        $this->authorize('destroy', Vaccate::class);
        Vaccate::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Vaccate Report";
        $activity->save();
        return redirect()->route('vaccates.index')
                        ->with('success','deleted successfully');
    }

    public function generatevaccate()
    {
        $residents = Vaccate::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('vaccates/report_show',compact('residents'));
    }

    public function generateVaccateReport(){
      
      $name = request('res_name');
      $vaccate = Vaccate::where('client_id', '=', $name)->firstOrFail();
      $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

      return view('vaccates/report',compact('vaccate','locations'));
    }

}
