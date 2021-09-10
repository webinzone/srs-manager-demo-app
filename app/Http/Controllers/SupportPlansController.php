<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\SupportPlan;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\LocationMaster;

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
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';        
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
        $support_plan->cons = request('cons') ?? '';
        $support_plan->adm_date = request('adm_date') ?? '';
        $support_plan->gp_name = request('gp_name') ?? '';
        $support_plan->other_gp = request('other_gp') ?? '';
        $support_plan->nomini = request('nomini') ?? '';
        $support_plan->gp_contact = request('gp_contact') ?? '';

        $support_plan->s_date = request('s_date') ?? '';
        $support_plan->review = implode(',', (array) request('review')) ?? '';
        $support_plan->r_with = implode(',', (array) request('r_with')) ?? '';
        $support_plan->r_notes = implode(',', (array) request('r_notes')) ?? '';       

        $support_plan->mobility = request('mobility') ?? '';
        $support_plan->f1 = request('f1') ?? '';
        $support_plan->f2 = request('f2') ?? '';
        $support_plan->f3 = request('f3') ?? '';
        $support_plan->f4 = request('f4') ?? '';
        $support_plan->f5 = request('f5') ?? '';
        $support_plan->f6 = request('f6') ?? '';
        $support_plan->f7 = request('f7') ?? '';
        $support_plan->company_id = Auth::user()->c_id  ?? '';
        $support_plan->location_id = Auth::user()->l_id  ?? '';
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
        $review = explode(',', $support_plan->review);
        $r_with = explode(',', $support_plan->r_with);
        $r_notes = explode(',', $support_plan->r_notes);
        $item_last= count($review);
        $num = (int)$item_last;

        

        return view('support_plans/show',compact('support_plan','review','r_with','r_notes','num'));
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
        $review = explode(',', $support_plan->review);
        $r_with = explode(',', $support_plan->r_with);
        $r_notes = explode(',', $support_plan->r_notes);
        $item_last= count($review);
        $num = (int)$item_last;

        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';        

        return view('support_plans/edit',compact('support_plan','residents','review','r_with','r_notes','num'));
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
        $support_plan->cons = request('cons') ?? '';
        $support_plan->adm_date = request('adm_date') ?? '';
        $support_plan->gp_name = request('gp_name') ?? '';
        $support_plan->gp_contact = request('gp_contact') ?? '';
        $support_plan->other_gp = request('other_gp') ?? '';
        $support_plan->nomini = request('nomini') ?? '';
        $support_plan->s_date = request('s_date') ?? '';
        $support_plan->review = implode(',', (array) request('review')) ?? '';
        $support_plan->r_with = implode(',', (array) request('r_with')) ?? '';
        $support_plan->r_notes = implode(',', (array) request('r_notes')) ?? '';       

        $support_plan->mobility = request('mobility') ?? '';
        $support_plan->f1 = request('f1') ?? '';
        $support_plan->f2 = request('f2') ?? '';
        $support_plan->f3 = request('f3') ?? '';
        $support_plan->f4 = request('f4') ?? '';
        $support_plan->f5 = request('f5') ?? '';
        $support_plan->f6 = request('f6') ?? '';
        $support_plan->f7 = request('f7') ?? '';
        $support_plan->company_id = Auth::user()->c_id  ?? '';
        $support_plan->location_id = Auth::user()->l_id  ?? '';
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
     public function plan_generate(){
        $support_plan = SupportPlan::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? ''; 
        return view('support_plans/report_show',compact('support_plan'));
    }

    public function generatePlansReport(){
      $res = request('res');
      $support_plan = SupportPlan::where('client_id', '=', $res)->firstOrFail();
      
        $review = explode(',', $support_plan->review);
        $r_with = explode(',', $support_plan->r_with);
        $r_notes = explode(',', $support_plan->r_notes);
        $item_last= count($review);
        $num = (int)$item_last;

         $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        

        return view('support_plans/report',compact('support_plan','review','r_with','r_notes','num','locations'));
    }
}
