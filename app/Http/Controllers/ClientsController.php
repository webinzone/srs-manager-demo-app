<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;

use App\Models\ClientDetail;
use App\Models\ClientFamily;
use App\Models\ClientPowerofatony;
use App\Models\ClientAllergy;
use App\Models\ClientVisitor;
use App\Models\ClientGpdetail;
use App\Models\ClientNextofkin;
use App\Models\ActivityLog;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ClientsController extends Controller
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
        return view('clients/index');
    }

     public function create()
    {
         
        $this->authorize('create');
        return view('clients/create');
    }

    public function store()
    {
        
        $client_detail = new ClientDetail();    
        $client_detail->fname = request('fname');
        $client_detail->mname = request('mname');
        $client_detail->lname = request('lname');
        $client_detail->address = request('address');
        $client_detail->dob = request('dob');
        $client_detail->cob = request('cob');
        $client_detail->age = request('age');
        $client_detail->gender = request('gender');
        $client_detail->religion = request('religion');
        $client_detail->l_known = request('l_known');
        $client_detail->ph = request('ph');
        $client_detail->medicard_no = request('medicard_no');
        $client_detail->medicard_orderno = "null";
        $client_detail->pension_no = request('pension_no');
        $client_detail->insurance_no = request('insurance_no');
        $client_detail->insu_compny = request('insu_compny');
        $client_detail->likes = "null";
        $client_detail->dislikes = "null";
        $client_detail->hobies = request('hobies');
        $client_detail->exp_date = request('exp_date');
        $client_detail->reference_source = request('reference_source');
        $client_detail->funding_source = request('funding_source');        
        $client_detail->user_id =  Auth::user()->id;
        $client_detail->save(); 

        $clientid = $client_detail->id;

        //$client_family = new ClientFamily();   
        //$client_family->client_id = $clientid;
        //$client_family->fname = request('f1name');
        //$client_family->mname = request('m1name');
        //$client_family->lname = request('l1name');
        //$client_family->relation = request('relation');
        //$client_family->address = request('address1');
        //$client_family->gender = request('gender1');
        //$client_family->ph = request('ph1');
        //$client_family->email = request('email');
        //$client_family->country = request('country');
        //$client_family->religion = request('religion1');
        //$client_family->user_id =  Auth::user()->id;
        //$client_family->save();

        //$client_powerofatony = new ClientPowerofatony();
        //$client_powerofatony->client_id = $clientid;
        //$client_powerofatony->po_maker = request('po_maker');
        //$client_powerofatony->po_maker_address = request('po_maker_address');
        //$client_powerofatony->po_granter = request('po_granter');
        //$client_powerofatony->po_granter_address = request('po_granter_address');
        //$client_powerofatony->grant_reason = request('grant_reason');
        //$client_powerofatony->g_date = request('g_date');
        //$client_powerofatony->place = request('place');
        //$client_powerofatony->termination_date = request('termination_date');
        //$client_powerofatony->user_id =  Auth::user()->id;
        //$client_powerofatony->save();

        $client_allergy = new ClientAllergy();    
        $client_allergy->client_id = $clientid;
        $client_allergy->allergy_status = request('allergy_status');
        $client_allergy->tof_allergy = request('tof_allergy');
        $client_allergy->hos_name = "null";
        $client_allergy->doc_name = "null";
        $client_allergy->duration = "null";
        $client_allergy->madicine = "null";
        $client_allergy->tests_report = "null";
        $client_allergy->user_id =  Auth::user()->id;
        //$report = request('tests_report')->getClientOriginalName();
        // request()->tests_report->move(public_path('images/test_reports'), $report); 
        $client_allergy->save();

        $client_visitor = new ClientVisitor();     
        $client_visitor->client_id = $clientid;
        $client_visitor->allowed_status = request('allowed_status');
        $client_visitor->name = "null";
        $client_visitor->gender = "null";
        $client_visitor->relation = "null";
        $client_visitor->address = "null";
        $client_visitor->ph = "null";
        $client_visitor->id_no = "null";
        $client_visitor->nationality = "null";
        $client_visitor->user_id =  Auth::user()->id;
        $client_visitor->save();

        $client_gpdetail = new ClientGpdetail();     
        $client_gpdetail->client_id = $clientid;
        $client_gpdetail->gp_name = request('gp_name');
        $client_gpdetail->address = request('gp_address');
        $client_gpdetail->ph = request('ph3');
        $client_gpdetail->clinic_name = "null";
        $client_gpdetail->booking_s_time = "null";
        $client_gpdetail->booking_e_time = "null";
        $client_gpdetail->gp_email = request('gp_email');
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();

        $client_nextofkin = new ClientNextofkin();    
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = "null";
        $client_nextofkin->name = request('nok_name');
        $client_nextofkin->gender = "null";
        $client_nextofkin->relation = "null";
        $client_nextofkin->address = request('nok_address');        
        $client_nextofkin->ph = request('nok_ph');
        $client_nextofkin->id_no = "null";
        $client_nextofkin->nationality = "null";
        $client_nextofkin->nok_email = request('nok_email');
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $activity = new ActivityLog();
        $activity->user = Auth::user()->first_name;
        $activity->action = "Added";
        $activity->item = "Client";
        $activity->save();
    
     
        return redirect()->route('clients.index')
                ->with('success','Client Added successfully');                 

    }

   public function show($id)
    {
        $this->authorize('show',ClientDetail::class);
        $client_detail = ClientDetail::find($id);
        //$client_family = ClientFamily::where('client_id', '=', $id);
        //$power_of_atony = ClientPowerofatony::where('client_id', '=', $id);
        $allergy = ClientAllergy::where('client_id', '=', $id);
        $visitor = ClientVisitor::where('client_id', '=', $id);
        $gpdetail = ClientGpdetail::where('client_id', '=', $id);
        $next_of_kin = ClientNextofkin::where('client_id', '=', $id);
        return view('clients/show',compact('client_detail'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $client_detail = ClientDetail::find($id);
        //$client_family = ClientFamily::where('client_id', '=', $id);
        //$power_of_atony = ClientPowerofatony::where('client_id', '=', $id);
        $allergy = ClientAllergy::where('client_id', '=', $id)->firstOrFail();
        $visitor = ClientVisitor::where('client_id', '=', $id)->firstOrFail();
        $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
        $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
  
        return view('clients/edit')->with(compact('client_detail', 'visitor', 'allergy', 'visitor', 'gpdetail', 'next_of_kin'));
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
        $client_detail = new ClientDetail();    
        $client_detail->fname = request('fname');
        $client_detail->mname = request('mname');
        $client_detail->lname = request('lname');
        $client_detail->address = request('address');
        $client_detail->dob = request('dob');
        $client_detail->cob = request('cob');
        $client_detail->age = request('age');
        $client_detail->gender = request('gender');
        $client_detail->religion = request('religion');
        $client_detail->l_known = request('l_known');
        $client_detail->ph = request('ph');
        $client_detail->medicard_no = request('medicard_no');
        $client_detail->medicard_orderno = "null";
        $client_detail->pension_no = request('pension_no');
        $client_detail->insurance_no = request('insurance_no');
        $client_detail->insu_compny = request('insu_compny');
        $client_detail->likes = "null";
        $client_detail->dislikes = "null";
        $client_detail->hobies = request('hobies');
        $client_detail->exp_date = request('exp_date');
        $client_detail->reference_source = request('reference_source');
        $client_detail->funding_source = request('funding_source');        
        $client_detail->user_id =  Auth::user()->id;
        $client_detail->save(); 

        $clientid = $client_detail->id;

        //$client_family = new ClientFamily();   
        //$client_family->client_id = $clientid;
        //$client_family->fname = request('f1name');
        //$client_family->mname = request('m1name');
        //$client_family->lname = request('l1name');
        //$client_family->relation = request('relation');
        //$client_family->address = request('address1');
        //$client_family->gender = request('gender1');
        //$client_family->ph = request('ph1');
        //$client_family->email = request('email');
        //$client_family->country = request('country');
        //$client_family->religion = request('religion1');
        //$client_family->user_id =  Auth::user()->id;
        //$client_family->save();

        //$client_powerofatony = new ClientPowerofatony();
        //$client_powerofatony->client_id = $clientid;
        //$client_powerofatony->po_maker = request('po_maker');
        //$client_powerofatony->po_maker_address = request('po_maker_address');
        //$client_powerofatony->po_granter = request('po_granter');
        //$client_powerofatony->po_granter_address = request('po_granter_address');
        //$client_powerofatony->grant_reason = request('grant_reason');
        //$client_powerofatony->g_date = request('g_date');
        //$client_powerofatony->place = request('place');
        //$client_powerofatony->termination_date = request('termination_date');
        //$client_powerofatony->user_id =  Auth::user()->id;
        //$client_powerofatony->save();

        $client_allergy = new ClientAllergy();    
        $client_allergy->client_id = $clientid;
        $client_allergy->allergy_status = request('allergy_status');
        $client_allergy->tof_allergy = request('tof_allergy');
        $client_allergy->hos_name = "null";
        $client_allergy->doc_name = "null";
        $client_allergy->duration = "null";
        $client_allergy->madicine = "null";
        $client_allergy->tests_report = "null";
        $client_allergy->user_id =  Auth::user()->id;
        //$report = request('tests_report')->getClientOriginalName();
        // request()->tests_report->move(public_path('images/test_reports'), $report); 
        $client_allergy->save();

        $client_visitor = new ClientVisitor();     
        $client_visitor->client_id = $clientid;
        $client_visitor->allowed_status = request('allowed_status');
        $client_visitor->name = "null";
        $client_visitor->gender = "null";
        $client_visitor->relation = "null";
        $client_visitor->address = "null";
        $client_visitor->ph = "null";
        $client_visitor->id_no = "null";
        $client_visitor->nationality = "null";
        $client_visitor->user_id =  Auth::user()->id;
        $client_visitor->save();

        $client_gpdetail = new ClientGpdetail();     
        $client_gpdetail->client_id = $clientid;
        $client_gpdetail->gp_name = request('gp_name');
        $client_gpdetail->address = request('gp_address');
        $client_gpdetail->ph = request('ph3');
        $client_gpdetail->clinic_name = "null";
        $client_gpdetail->booking_s_time = "null";
        $client_gpdetail->booking_e_time = "null";
        $client_gpdetail->gp_email = request('gp_email');
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();

        $client_nextofkin = new ClientNextofkin();    
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = "null";
        $client_nextofkin->name = request('nok_name');
        $client_nextofkin->gender = "null";
        $client_nextofkin->relation = "null";
        $client_nextofkin->address = request('nok_address');        
        $client_nextofkin->ph = request('nok_ph');
        $client_nextofkin->id_no = "null";
        $client_nextofkin->nationality = "null";
        $client_nextofkin->nok_email = request('nok_email');
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $activity = new ActivityLog();
        $activity->user = Auth::user()->first_name;
        $activity->action = "Added";
        $activity->item = "Client";
        $activity->save();
    
     
        return redirect()->route('clients.index')
                ->with('success','Client Added successfully'); 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('destroy', ClientDetail::class);
        ClientDetail::destroy($id);
        //ClientAllergy::where('client_id', '=', $id)->delete();
        //ClientFamily::where('client_id', '=', $id)->delete();->delete();
        //ClientPowerofatony::where('client_id', '=', $id)->delete();->delete();
        ClientAllergy::where('client_id', '=', $id)->delete();
        ClientVisitor::where('client_id', '=', $id)->delete();
        ClientGpdetail::where('client_id', '=', $id)->delete();
        ClientNextofkin::where('client_id', '=', $id)->delete();

        $activity = new ActivityLog();
        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Client";
        $activity->save();
        return redirect()->route('clients.index')
                        ->with('success','deleted successfully');
    }


}