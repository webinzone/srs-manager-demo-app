<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
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
class MngshiftsController extends Controller
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
        $this->authorize('index', Mngshift::class);
        return view('mngshifts/index');
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
        $this->authorize('create',Mngshift::class);
        $date = Carbon::now();
        $date = $date->toDateString();
        $last        =   Mngshift::where('mng_date', '=', $date)->orderBy('created_at', 'desc')->first();
        $ms = $last->mng_staff ?? '';
        $es = $last->evng_staff ?? '';

        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
        return view('mngshifts/create',compact('residents','emps','es','ms','date'));
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
        $this->authorize('create',Mngshift::class);
        $mngshift = new Mngshift();

        $mngshift->mng_staff = request('mng_staff') ?? '';
        $mngshift->evng_staff = request('evng_staff') ?? '';
        
        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;        
        $mngshift->res_name = $name ?? '';

        $mngshift->room = request('room') ?? '';
        $mngshift->notes = request('notes') ?? '';
        $mngshift->mng_date = request('mng_date') ?? '';
        $mngshift->company_id = request('company_id') ?? '';
        $mngshift->location_id = request('location_id') ?? '';
        $mngshift->user_id =  Auth::user()->id;
        
        $mngshift->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Mngshift Report";
      $activity->save();

      return redirect()->route('mngshifts.index')
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
        $this->authorize('show',Mngshift::class);
        $mngshift = Mngshift::find($id);
        return view('mngshifts/show',compact('mngshift'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Mngshift::class);
        $mngshift = Mngshift::find($id);
        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
        return view('mngshifts/edit',compact('mngshift','residents','emps'));
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
        $this->authorize('update', Mngshift::class);
        $mngshift = Mngshift::find($id);

        $mngshift->mng_staff = request('mng_staff') ?? '';
        $mngshift->evng_staff = request('evng_staff') ?? '';

        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;        
        $mngshift->res_name = $name ?? '';

        $mngshift->room = request('room') ?? '';
        $mngshift->notes = request('notes') ?? '';
        $mngshift->mng_date = request('mng_date') ?? '';
        $mngshift->company_id = request('company_id') ?? '';
        $mngshift->location_id = request('location_id') ?? '';
        $mngshift->user_id =  Auth::user()->id;
        
        $mngshift->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Mngshift Report";
        $activity->save();

        return redirect()->route('mngshifts.index')
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
        $this->authorize('destroy', Mngshift::class);
        Mngshift::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Mngshift Report";
        $activity->save();
        return redirect()->route('mngshifts.index')
                        ->with('success','deleted successfully');
    }

    public function getshiftdate($id)
    {
        $data = Mngshift::where('mng_date', '=', $date)->orderBy('created_at', 'desc')->first();
        return response()->json($data);
    }

}
