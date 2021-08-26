<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\StaffRoaster;
use App\Models\ActivityLog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class StaffRoastersController extends Controller
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
        $this->authorize('view', StaffRoaster::class);
        return view('staff_roasters/index');
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
        $this->authorize('create',StaffRoaster::class);
        return view('staff_roasters/create');
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
        $this->authorize('create',StaffRoaster::class);
        $staff_roaster = new StaffRoaster();

        $staff_roaster->s_date = request('s_date')  ?? '';

        $staff_roaster->con_1 = request('con_1')  ?? '';
        $staff_roaster->con_2 = request('con_2')  ?? '';
        $staff_roaster->con_3 = request('con_3')  ?? '';
        $staff_roaster->company_id = Auth::user()->c_id  ?? '';
        $staff_roaster->location_id = Auth::user()->l_id  ?? '';
        $staff_roaster->user_id =  Auth::user()->id;


        $staff_roaster->s_name = implode(',', (array)  request('s_name'))  ?? '';
        $staff_roaster->position = implode(',', (array)  request('position'))  ?? '';
        $staff_roaster->mon = implode(',', (array)  request('mon'))  ?? '';
        $staff_roaster->tues = implode(',', (array)  request('tues'))  ?? '';
        $staff_roaster->wed = implode(',', (array)  request('wed'))  ?? '';
        $staff_roaster->thurs = implode(',', (array)  request('thurs'))  ?? '';
        $staff_roaster->fri = implode(',', (array)  request('fri'))  ?? '';
        $staff_roaster->sat = implode(',', (array)  request('sat'))  ?? '';
        $staff_roaster->sun = implode(',', (array)  request('sun'))  ?? '';
        $staff_roaster->total_hrs = implode(',', (array)  request('total_hrs'))  ?? '';
        $staff_roaster->total = implode(',', (array)  request('total'))  ?? '';
        $staff_roaster->pr_time = implode(',', (array)  request('pr_time'))  ?? '';
        $staff_roaster->init = implode(',', (array)  request('init'))  ?? '';       

        
        
        $staff_roaster->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Staff Roaster Report";
      $activity->save();

      return redirect()->route('staff_roasters.index')
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
        $this->authorize('show',StaffRoaster::class);
        $staff_roaster = StaffRoaster::find($id);
             $s_name = explode(',', $staff_roaster->s_name);
          $position = explode(',', $staff_roaster->position);
          $mon = explode(',', $staff_roaster->mon);
          $tues = explode(',', $staff_roaster->tues);
          $wed = explode(',', $staff_roaster->wed);
          $thurs = explode(',', $staff_roaster->thurs);
          $fri = explode(',', $staff_roaster->fri);
          $sat = explode(',', $staff_roaster->sat);
          $sun = explode(',', $staff_roaster->sun);
          $total_hrs = explode(',', $staff_roaster->total_hrs);
          $total = explode(',', $staff_roaster->total);
          $pr_time = explode(',', $staff_roaster->pr_time);
          $init = explode(',', $staff_roaster->init);

          $num = count($s_name);
          $num = $num + 1;

        return view('staff_roasters/show',compact('staff_roaster','s_name','position','mon','tues','wed','thurs','fri','sat','sun','total_hrs','total','pr_time','init','num'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',StaffRoaster::class);
        $staff_roaster = StaffRoaster::find($id);
          $s_name = explode(',', $staff_roaster->s_name);
          $position = explode(',', $staff_roaster->position);
          $mon = explode(',', $staff_roaster->mon);
          $tues = explode(',', $staff_roaster->tues);
          $wed = explode(',', $staff_roaster->wed);
          $thurs = explode(',', $staff_roaster->thurs);
          $fri = explode(',', $staff_roaster->fri);
          $sat = explode(',', $staff_roaster->sat);
          $sun = explode(',', $staff_roaster->sun);
          $total_hrs = explode(',', $staff_roaster->total_hrs);
          $total = explode(',', $staff_roaster->total);
          $pr_time = explode(',', $staff_roaster->pr_time);
          $init = explode(',', $staff_roaster->init);
           $num = count($s_name);

        return view('staff_roasters/edit',compact('staff_roaster','s_name','position','mon','tues','wed','thurs','fri','sat','sun','total_hrs','total','pr_time','init','num'));
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
        $this->authorize('update', StaffRoaster::class);
        $staff_roaster = StaffRoaster::find($id);


        $staff_roaster->s_date = request('s_date')  ?? '';

        $staff_roaster->con_1 = request('con_1')  ?? '';
        $staff_roaster->con_2 = request('con_2')  ?? '';
        $staff_roaster->con_3 = request('con_3')  ?? '';
        $staff_roaster->company_id = Auth::user()->c_id  ?? '';
        $staff_roaster->location_id = Auth::user()->l_id  ?? '';
        $staff_roaster->user_id =  Auth::user()->id;


        $staff_roaster->s_name = implode(',', (array)  request('s_name'))  ?? '';
        $staff_roaster->position = implode(',', (array)  request('position'))  ?? '';
        $staff_roaster->mon = implode(',', (array)  request('mon'))  ?? '';
        $staff_roaster->tues = implode(',', (array)  request('tues'))  ?? '';
        $staff_roaster->wed = implode(',', (array)  request('wed'))  ?? '';
        $staff_roaster->thurs = implode(',', (array)  request('thurs'))  ?? '';
        $staff_roaster->fri = implode(',', (array)  request('fri'))  ?? '';
        $staff_roaster->sat = implode(',', (array)  request('sat'))  ?? '';
        $staff_roaster->sun = implode(',', (array)  request('sun'))  ?? '';
        $staff_roaster->total_hrs = implode(',', (array)  request('total_hrs'))  ?? '';
        $staff_roaster->total = implode(',', (array)  request('total'))  ?? '';
        $staff_roaster->pr_time = implode(',', (array)  request('pr_time'))  ?? '';
        $staff_roaster->init = implode(',', (array)  request('init'))  ?? '';       

        
        $staff_roaster->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Staff Roaster Report";
        $activity->save();

        return redirect()->route('staff_roasters.index')
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
        $this->authorize('destroy', StaffRoaster::class);
        StaffRoaster::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Staff Roaster Report";
        $activity->save();
        return redirect()->route('staff_roasters.index')
                        ->with('success','deleted successfully');
    }

}
