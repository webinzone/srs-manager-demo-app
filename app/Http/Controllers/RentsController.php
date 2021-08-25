<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Rent;
use App\Models\ActivityLog;
use App\Models\ClientDetail;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class RentsController extends Controller
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
        $this->authorize('view', Rent::class);
        return view('rents/index');
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
        $this->authorize('create',Rent::class);
         $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';
        return view('rents/create',compact('residents'));
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
        $this->authorize('create',Rent::class);
        $rent = new Rent();
        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $rent->res_name = $name ?? '';


        $rent->client_id = $id ?? '';
        $rent->adm_date = request('adm_date') ?? '';
        $rent->tof = request('tof') ?? '';
        $rent->rent_pay = request('rent_pay') ?? '';
        $rent->pay_date = request('pay_date') ?? '';
        $rent->nextpay_date = request('nextpay_date') ?? '';
        $rent->adv_pay = request('adv_pay') ?? '';
        $rent->status = request('status') ?? 'Unpaid';
        $rent->roomno = request('roomno') ?? '';
        $rent->room_type = request('room_type') ?? '';
        $rent->company_id = request('company_id') ?? '';
        $rent->location_id = request('location_id') ?? '';
        $rent->user_id =  Auth::user()->id;
        
        $rent->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Rent Report";
      $activity->save();

      return redirect()->route('rents.index')
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
        $this->authorize('show',Rent::class);
        $rent = Rent::find($id);
        return view('rents/show',compact('rent'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Rent::class);
        $rent = Rent::find($id);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';
        return view('rents/edit',compact('rent','residents'));
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
        $this->authorize('update', Rent::class);
        $rent = Rent::find($id);

        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $rent->res_name = $name ?? '';


        $rent->client_id = $id ?? '';
        $rent->adm_date = request('adm_date') ?? '';
        $rent->tof = request('tof') ?? '';
        $rent->rent_pay = request('rent_pay') ?? '';
        $rent->pay_date = request('pay_date') ?? '';
        $rent->nextpay_date = request('nextpay_date') ?? '';
        $rent->adv_pay = request('adv_pay') ?? '';
        $rent->status = request('status') ?? '';
        $rent->roomno = request('roomno') ?? '';
        $rent->room_type = request('room_type') ?? '';
        $rent->company_id = request('company_id') ?? '';
        $rent->location_id = request('location_id') ?? '';
        $rent->user_id =  Auth::user()->id;
        
        $rent->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Rent Report";
        $activity->save();

        return redirect()->route('rents.index')
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
        $this->authorize('destroy', Rent::class);
        Rent::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Rent Report";
        $activity->save();
        return redirect()->route('rents.index')
                        ->with('success','deleted successfully');
    }

    public function rent_generate(){
        

        $rents = Rent::get();

         return view('rents/report_show',compact('rents'));
    }

    public function generateRentReport(){
      $res = request('res_name');
      $rents = Rent::where('client_id', '=', $res)->get();
      $resi = Rent::where('client_id', '=', $res)->firstOrFail();

      return view('rents/report',compact('rents','resi'));
    }


}
