<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\LocationMaster;
use App\Models\CompanyMaster;
use App\Models\ActivityLog;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class LocationMastersController extends Controller
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
        $this->authorize('view', LocationMaster::class);
        
        return view('location_masters/index');
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
        $this->authorize('create',LocationMaster::class);
        $companies = CompanyMaster::all();
        return view('location_masters/create',compact('companies'));
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
        $this->authorize('create',LocationMaster::class);
        
        $location_master = new LocationMaster();
        
        $company_id = request('company_id');
        //$location = LocationMaster::where('company_id', '=', $company_id)->firstOrFail();
        if (LocationMaster::where('company_id', '=', $company_id)->exists())
        {
           $lastLocationid = LocationMaster::where('company_id', '=', $company_id)->orderBy('created_at', 'desc')->first();        
           $str = $lastLocationid->location_id;    

        }
        else
        {          
              $str = 'L000';
          
        }

        $location_master->location_id = ++$str;

        $location_master->master_name = request('master_name')  ?? '';
        $location_master->address = request('address')  ?? '';
        $location_master->email = request('email')  ?? '';
        $location_master->ph = request('ph')  ?? '';
        $location_master->fax = request('fax')  ?? '';
        $location_master->web_id = request('web_id')  ?? '';
        $location_master->user_id =  Auth::user()->id  ?? '';
        $location_master->suburb = request('suburb')  ?? '';
        $location_master->post_code = request('post_code')  ?? '';
        $location_master->state = request('state')  ?? '';
        $location_master->company_id = request('company_id')  ?? '';
        $location_master->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "LocationMaster Report";
      $activity->save();

      return redirect()->route('location_masters.index')
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
        $this->authorize('show',LocationMaster::class);
        $location_master = LocationMaster::find($id);
        return view('location_masters/show',compact('location_master'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',LocationMaster::class);
        $location_master = LocationMaster::find($id);
        return view('location_masters/edit',compact('location_master'));
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
        $this->authorize('update', LocationMaster::class);

        $location_master = LocationMaster::find($id);

        $location_master->location_id = request('location_id')  ?? '';
        $location_master->master_name = request('master_name')  ?? '';
        $location_master->address = request('address')  ?? '';
        $location_master->email = request('email')  ?? '';
        $location_master->ph = request('ph')  ?? '';
        $location_master->fax = request('fax')  ?? '';
        $location_master->web_id = request('web_id')  ?? '';
        $location_master->user_id =  Auth::user()->id  ?? '';
        $location_master->suburb = request('suburb')  ?? '';
        $location_master->post_code = request('post_code')  ?? '';
        $location_master->state = request('state')  ?? '';

        $location_master->company_id = request('company_id')  ?? '';
        
        $location_master->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "LocationMaster Report";
        $activity->save();

        return redirect()->route('location_masters.index')
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
        $this->authorize('destroy', LocationMaster::class);
        LocationMaster::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "LocationMaster Report";
        $activity->save();
        return redirect()->route('location_masters.index')
                        ->with('success','deleted successfully');
    }

}
