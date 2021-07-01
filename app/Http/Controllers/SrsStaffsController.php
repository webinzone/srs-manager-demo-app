<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\SrsStaff;
use App\Models\ActivityLog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class SrsStaffsController extends Controller
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
        $this->authorize('view', SrsStaff::class);
        $srs_staffs = SrsStaff::all();
        return view('srs_staffs/index',compact('srs_staffs'));
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
        $this->authorize('create',SrsStaff::class);
        return view('srs_staffs/create');
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
        $this->authorize('create',SrsStaff::class);
        $srs_staff = new SrsStaff();

        $srs_staff->name = request('name');
        $srs_staff->address = request('address');
        $srs_staff->ph = request('ph');
        $srs_staff->dob = request('dob');
        $srs_staff->email = request('email');
        $srs_staff->quali = request('quali');
        $srs_staff->company_id = request('company_id');
        $srs_staff->location_id = request('location_id');
        $srs_staff->user_id =  Auth::user()->id;
        
        $srs_staff->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "SrsStaff Report";
      $activity->save();

      return redirect()->route('srs_staffs.index')
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
        $this->authorize('show',SrsStaff::class);
        $srs_staff = SrsStaff::find($id);
        return view('srs_staffs/show',compact('srs_staff'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',SrsStaff::class);
        $srs_staff = SrsStaff::find($id);
        return view('srs_staffs/edit',compact('srs_staff'));
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
        $this->authorize('update', SrsStaff::class);
        $srs_staff = SrsStaff::find($id);

        $srs_staff->name = request('name');
        $srs_staff->address = request('address');
        $srs_staff->ph = request('ph');
        $srs_staff->dob = request('dob');
        $srs_staff->email = request('email');
        $srs_staff->quali = request('quali');
        $srs_staff->company_id = request('company_id');
        $srs_staff->location_id = request('location_id');
        $srs_staff->user_id =  Auth::user()->id;
        
        $srs_staff->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "SrsStaff Report";
        $activity->save();

        return redirect()->route('srs_staffs.index')
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
        $this->authorize('destroy', SrsStaff::class);
        SrsStaff::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "SrsStaff Report";
        $activity->save();
        return redirect()->route('srs_staffs.index')
                        ->with('success','deleted successfully');
    }

}
