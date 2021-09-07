<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Evngshift;
use App\Models\Mngshift;

use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class EvngshiftsController extends Controller
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
        $this->authorize('view', Evngshift::class);
        return view('evngshifts/index');
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
        $this->authorize('create',Evngshift::class);
        
        $date = Carbon::now();
        $date = $date->toDateString();
        $last        =   Evngshift::where('eveng_date', '=', $date)->orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->first();

        $ms = $last->mng_staff ?? '';

        $lastt        =   Mngshift::where('mng_date', '=', $date)->orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->first();

        $es = $lastt->evng_staff ?? '';

        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $i = 0;
        return view('evngshifts/create',compact('residents','emps','ms','es','i'));
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
        $this->authorize('create',Evngshift::class);
        $evngshift = new Evngshift();

        $evngshift->mng_staff = request('mng_staff') ?? '';
        $evngshift->evng_staff = request('evng_staff') ?? '';

        $evngshift->res_name = implode(',', (array) request('res_name')) ?? '';
        $evngshift->room = implode(',', (array) request('room')) ?? '';        
        $evngshift->notes = implode(',', (array) request('notes')) ?? '';

        $evngshift->eveng_date = request('eveng_date') ?? '';
        $evngshift->company_id = Auth::user()->c_id  ?? '';
        $evngshift->location_id = Auth::user()->l_id  ?? '';
        $evngshift->user_id =  Auth::user()->id;
        
        $evngshift->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Evngshift Report";
      $activity->save();

      return redirect()->route('evngshifts.create')
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
        $this->authorize('show',Evngshift::class);
        $evngshift = Evngshift::find($id);
        $res_name = explode(',', $evngshift->res_name);
        $room = explode(',', $evngshift->room);
        $notes = explode(',', $evngshift->notes);        
         $i = 0;
        $item_last= count($res_name);
        $num = (int)$item_last;
        $emps = SrsStaff::orderBy('name')->get();
        return view('evngshifts/show',compact('evngshift','emps','res_name','room','notes','num','i'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Evngshift::class);
        $evngshift = Evngshift::find($id);
        $res_name = explode(',', $evngshift->res_name);
        $room = explode(',', $evngshift->room);
        $notes = explode(',', $evngshift->notes);        
         $i = 0;
        $item_last= count($res_name);
        $num = (int)$item_last;
        $emps = SrsStaff::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('name')->get();
        return view('evngshifts/edit',compact('evngshift','emps','res_name','room','notes','num','i'));
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
        $this->authorize('update', Evngshift::class);
        $evngshift = Evngshift::find($id);

        $evngshift->mng_staff = request('mng_staff') ?? '';
        $evngshift->evng_staff = request('evng_staff') ?? '';

        $evngshift->res_name = implode(',', (array) request('res_name')) ?? '';
        $evngshift->room = implode(',', (array) request('room')) ?? '';        
        $evngshift->notes = implode(',', (array) request('notes')) ?? '';

        $evngshift->eveng_date = request('eveng_date') ?? '';
        $evngshift->company_id = Auth::user()->c_id  ?? '';
        $evngshift->location_id = Auth::user()->l_id  ?? '';
        $evngshift->user_id =  Auth::user()->id;
               
        $evngshift->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Evngshift Report";
        $activity->save();

        return redirect()->route('evngshifts.index')
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
        $this->authorize('destroy', Evngshift::class);
        Evngshift::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Evngshift Report";
        $activity->save();
        return redirect()->route('evngshifts.index')
                        ->with('success','deleted successfully');
    }

}
