<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Handover;
use App\Models\ActivityLog;
use App\Models\SrsStaff;
use App\Models\ClientDetail;
use App\Models\Mngshift;
use App\Models\Evngshift;
use App\Models\LocationMaster;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class HandoversController extends Controller
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
        $this->authorize('view', Handover::class);
        $handovers = Handover::all();
        return view('handovers/index',compact('handovers'));
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
        $this->authorize('create',Handover::class);
        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
        return view('handovers/create',compact('residents', 'emps'));
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
        $this->authorize('create',Handover::class);
        $handover = new Handover();

        $handover->room = request('room');

        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $handover->res_name = $name;

        $handover->me_staffs = request('me_staffs');
        $handover->em_staffs = request('em_staffs');
        $handover->user_id =  Auth::user()->id;
        
        $handover->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Handover Report";
      $activity->save();

      return redirect()->route('handovers.index')
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
        $this->authorize('show',Handover::class);
        $handover = Handover::find($id);
        return view('handovers/show',compact('handover'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Handover::class);
        $handover = Handover::find($id);
        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
        return view('handovers/edit',compact('handover', 'residents', 'emps'));
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
        $this->authorize('update', Handover::class);
        $handover = Handover::find($id);

        $handover->room = request('room');
        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $handover->res_name = $name;
        $handover->me_staffs = request('me_staffs');
        $handover->em_staffs = request('em_staffs');
        $handover->user_id =  Auth::user()->id;
        
        $handover->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Handover Report";
        $activity->save();

        return redirect()->route('handovers.index')
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
        $this->authorize('destroy', Handover::class);
        Handover::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Handover Report";
        $activity->save();
        return redirect()->route('handovers.index')
                        ->with('success','deleted successfully');
    }

    public function generateHandoverReport()
    {
         $sdate = request('sdate');
         $i = 1;         
         
         $mngshift = Mngshift::where('mng_date', '=', $sdate)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail() ?? '';

        $res_name = explode(',', $mngshift->res_name);
        $room = explode(',', $mngshift->room);
        $notes = explode(',', $mngshift->notes);        
         $i = 0;
        $item_last= count($res_name);
        $num = (int)$item_last;
        $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

        // $mngsss = Mngshift::where('mng_date', '=', $sdate)->firstOrFail() ?? '';
        // $mstaf = $mngsss->mng_staff ?? '';

        // $evngsss = Evngshift::where('eveng_date', '=', $sdate)->firstOrFail() ?? '';
        // $estaf = $evngsss->evng_staff ?? '';

        // $evngs = Evngshift::where('eveng_date', '=', $sdate)->get() ?? '';   

         return view('handovers/report',compact('mngshift','i','res_name','room','notes','num','locations'));
    }

    public function shiftreports()
    {
        return view('handovers/report_show');
    }

    public function generateHandoverEvngReport(){
        $sdate = request('sdate');
         
        // $mngs = Mngshift::where('mng_date', '=', $sdate)->get() ?? '';

         //$mngsss = Mngshift::where('mng_date', '=', $sdate)->firstOrFail() ?? '';
         //$mstaf = $mngsss->mng_staff ?? '';

         $evngshift = Evngshift::where('eveng_date', '=', $sdate)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail() ?? '';
         $res_name = explode(',', $evngshift->res_name);
        $room = explode(',', $evngshift->room);
        $notes = explode(',', $evngshift->notes);        
         $i = 0;
        $item_last= count($res_name);
        $num = (int)$item_last;  
        $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

         return view('handovers/evng_report',compact('evngshift','i','res_name','room','notes','num','locations'));

    }

    public function generateHandoverfullReport(){


          $sdate = request('sdate');
         $i = 0;         
         
         $mngshift = Mngshift::where('mng_date', '=', $sdate)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail() ?? '';

        $res_name = explode(',', $mngshift->res_name);
        $room = explode(',', $mngshift->room);
        $notes = explode(',', $mngshift->notes);        

        $item_last= count($res_name);
        $num = (int)$item_last;
         
        

         $evngshift = Evngshift::where('eveng_date', '=', $sdate)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail() ?? '';
         
        $enotes = explode(',', $evngshift->notes);        
        $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

         return view('handovers/full_report',compact('evngshift','mngshift','i','res_name','room','notes','num','enotes','locations'));

    }

}
