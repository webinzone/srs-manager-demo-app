<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\CompanyMaster;
use App\Models\ActivityLog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class CompanyMastersController extends Controller
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
        $this->authorize('view', CompanyMaster::class);
        return view('company_masters/index');
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
        $this->authorize('create',CompanyMaster::class);
        $lastCompanyid        =   CompanyMaster::orderBy('created_at', 'desc')->first();
        if ($lastCompanyid) {
            $str = $lastCompanyid->company_id;
        }
        else
        {
            $str = 'C000';
        }
        $company_id = ++$str;
        return view('company_masters/create',compact('company_id'));
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
        $this->authorize('create',CompanyMaster::class);
        
        //$lastCompanyid        =   CompanyMaster::orderBy('created_at', 'desc')->first();
        //if ($lastCompanyid) {
            //$str = $lastCompanyid->company_id;
        //}
        //else
        //{
            //$str = 'C000';
        //}
        
        $company_master = new CompanyMaster();

        $company_master->company_name = request('company_name');
        $company_master->address = request('address');
        $company_master->location_id = "null";
        $company_master->email = request('email');
        $company_master->ph = request('ph');
        $company_master->fax = request('fax');
        $company_master->user_id =  Auth::user()->id;
        $company_master->suburb = request('suburb');
        $company_master->post_code = request('post_code');
        $company_master->state = request('state');
        $company_master->web = request('web');

        $company_master->company_id = request('company_id');
        
        $company_master->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "CompanyMaster Report";
      $activity->save();

      return redirect()->route('company_masters.index')
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
        $this->authorize('show',CompanyMaster::class);
        $company_master = CompanyMaster::find($id);
        return view('company_masters/show',compact('company_master'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',CompanyMaster::class);
        $company_master = CompanyMaster::find($id);
        return view('company_masters/edit',compact('company_master'));
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
        $this->authorize('update', CompanyMaster::class);
        $company_master = CompanyMaster::find($id);

        $company_master->company_name = request('company_name');
        $company_master->address = request('address');
        $company_master->location_id = request('location_id');
        $company_master->email = request('email');
        $company_master->ph = request('ph');
        $company_master->fax = request('fax');
        $company_master->user_id =  Auth::user()->id;
        $company_master->suburb = request('suburb');
        $company_master->post_code = request('post_code');
        $company_master->state = request('state');
        $company_master->web = request('web');
        
        $company_master->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "CompanyMaster Report";
        $activity->save();

        return redirect()->route('company_masters.index')
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
        $this->authorize('destroy', CompanyMaster::class);
        CompanyMaster::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "CompanyMaster Report";
        $activity->save();
        return redirect()->route('company_masters.index')
                        ->with('success','deleted successfully');
    }

}
