<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Appointment;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use App\Models\LocationMaster;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class AppointmentsController extends Controller
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
        $this->authorize('view', Appointment::class);
        return view('appointments/index');
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
        $this->authorize('create',Appointment::class);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('appointments/create',compact('residents','emps'));
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
        $this->authorize('create',Appointment::class);
        $appointment = new Appointment();
        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        
        $appointment->res_name = $name;
        $appointment->client_id = $id;


        $appointment->app_date = request('app_date')  ?? '';
        $appointment->app_time = request('app_time')  ?? '';
        $appointment->app_with = request('app_with')  ?? '';

        $appointment->app_address = request('app_address')  ?? '';
        $appointment->app_reason = request('app_reason')  ?? '';
        $appointment->app_bookby = request('app_bookby')  ?? '';
        $appointment->app_note = request('app_note')  ?? '';
        $appointment->status = request('status')  ?? '';
        $appointment->resc_date = request('resc_date')  ?? '';
        $appointment->fasting = request('fasting')  ?? '';
        
        $appointment->a_email = request('a_email')  ?? '';
        $appointment->a_ph = request('a_ph')  ?? '';

        $appointment->company_id = Auth::user()->c_id  ?? '';
        $appointment->location_id = Auth::user()->l_id  ?? '';
        $appointment->user_id =  Auth::user()->id;
        
        $appointment->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Appointment";
      $activity->company_id = Auth::user()->c_id  ?? '';
      $activity->location_id = Auth::user()->l_id  ?? '';
      $activity->user_id = Auth::user()->id;
      $activity->res_name = $appointment->res_name;
      $activity->client_id = $appointment->client_id;
      $activity->item_id = $appointment->id;
      $activity->item_route = "appointments";
      $activity->save();

      return redirect()->route('appointments.index')
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
        $this->authorize('show',Appointment::class);
        $appointment = Appointment::find($id);
        return view('appointments/show',compact('appointment'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Appointment::class);
        $appointment = Appointment::find($id);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';

        return view('appointments/edit',compact('appointment','residents','emps'));
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
        $this->authorize('update', Appointment::class);
        $appointment = Appointment::find($id);

        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        
        $appointment->res_name = $name;
        $appointment->client_id = $id;
        
        $appointment->app_date = request('app_date')  ?? '';
        $appointment->app_time = request('app_time')  ?? '';
        $appointment->app_with = request('app_with')  ?? '';
        $appointment->app_address = request('app_address')  ?? '';
        $appointment->app_reason = request('app_reason')  ?? '';
        $appointment->app_bookby = request('app_bookby')  ?? '';
        $appointment->app_note = request('app_note')  ?? '';
        $appointment->status = request('status')  ?? '';
        $appointment->fasting = request('fasting')  ?? '';
        
        $appointment->resc_date = request('resc_date')  ?? '';
        $appointment->a_email = request('a_email')  ?? '';
        $appointment->a_ph = request('a_ph')  ?? '';
        
        $appointment->company_id = Auth::user()->c_id  ?? '';
        $appointment->location_id = Auth::user()->l_id  ?? '';
        $appointment->user_id =  Auth::user()->id;
        
        $appointment->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Appointment";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->res_name = $appointment->res_name;
        $activity->client_id = $appointment->client_id;
        $activity->item_id = $appointment->id;
        $activity->item_route = "appointments";
        $activity->save();

        return redirect()->route('appointments.index')
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
        $this->authorize('destroy', Appointment::class);
        $appointment = Appointment::find($id);
        
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Appointment";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->res_name = $appointment->res_name;
        $activity->client_id = $appointment->client_id;
        $activity->item_id = 0;
        $activity->item_route = "appointments";
        $activity->save();


        ActivityLog::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('item_route', '=', "appointments")->where('item_id', '=', $appointment->id)->update(['item_id' => 0]);

       
        Appointment::destroy($id);

        return redirect()->route('appointments.index')
                        ->with('success','deleted successfully');
    }

    public function app_generate()
    {
        return view('appointments/report_show');

    }

    public function generateAppReport()
    {
         $sdate = request('sdate');
         $appointments = Appointment::where('app_date', '=', $sdate)->orderBy('app_date', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
         $apps = Appointment::where('resc_date', '=', $sdate)->orderBy('resc_date', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
         $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

         return view('appointments/report',compact('appointments','sdate', 'apps','locations'));


    }
}
