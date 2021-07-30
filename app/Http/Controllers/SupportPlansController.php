<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\SupportPlan;
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
class SupportPlansController extends Controller
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
        $this->authorize('view', SupportPlan::class);
        return view('support_plans/index');
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
        $this->authorize('create',SupportPlan::class);
        $residents = ClientDetail::all();        
        return view('support_plans/create',compact('residents'));
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
        $this->authorize('create',SupportPlan::class);
        $support_plan = new SupportPlan();
        
        $id = request('user_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;

        $support_plan->user_name = $name ?? '';
        $support_plan->client_id = $id ?? '';

        $support_plan->hygiene = request('hygiene') ?? '';
        $support_plan->nutrition = request('nutrition') ?? '';
        $support_plan->health_care = request('health_care') ?? '';
        $support_plan->medication = request('medication') ?? '';
        $support_plan->social_contact = request('social_contact') ?? '';
        $support_plan->behaviour = request('behaviour') ?? '';
        $support_plan->goals = request('goals') ?? '';
        $support_plan->company_id = request('company_id') ?? ' ';
        $support_plan->location_id = request('location_id') ?? ' ';
        $support_plan->user_id =  Auth::user()->id;
        
        
        $support_plan->save();
       $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Support Plans";
      $activity->save();


        return redirect()->route('support_plans.index')
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
        $this->authorize('show',SupportPlan::class);
        $support_plan = SupportPlan::find($id);
        return view('support_plans/show',compact('support_plan'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',SupportPlan::class);
        $support_plan = SupportPlan::find($id);
        $residents = ClientDetail::all();        

        return view('support_plans/edit',compact('support_plan','residents'));
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
        $this->authorize('update', SupportPlan::class);
        $support_plan = SupportPlan::find($id);

        $id = request('user_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;

        $support_plan->user_name = $name ?? '';
        $support_plan->client_id = $id ?? '';

        $support_plan->hygiene = request('hygiene') ?? '';
        $support_plan->nutrition = request('nutrition') ?? '';
        $support_plan->health_care = request('health_care') ?? '';
        $support_plan->medication = request('medication') ?? '';
        $support_plan->social_contact = request('social_contact') ?? '';
        $support_plan->behaviour = request('behaviour') ?? '';
        $support_plan->goals = request('goals') ?? '';
        $support_plan->company_id = request('company_id') ?? ' ';
        $support_plan->location_id = request('location_id') ?? ' ';
        $support_plan->user_id =  Auth::user()->id;
        
        
        $support_plan->save();
        
        $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Updated";
      $activity->item = "Support Plans";
      $activity->save();

      $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('plansDetails', $support_plan->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('support_plans.index')
                        ->with('success','updated successfully');
                    }

        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('destroy', SupportPlan::class);
       SupportPlan::destroy($id);

       $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Deleted";
      $activity->item = "Support Plans";
      $activity->save();

        return redirect()->route('support_plans.index')
                        ->with('success','deleted successfully');
    }

}
