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
use App\Models\GuardianDetail;
use App\Models\HealthService;
use App\Models\PensionDetail;
use App\Models\ActivityLog;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;
use PDF;


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
        $client_detail->address = "null"  ?? 'null';
        $client_detail->dob = request('dob')  ?? 'null';
        $client_detail->cob = "null"  ?? 'null';
        $client_detail->age = "null"  ?? 'null';
        $client_detail->gender = request('gender')  ?? 'null';
        $client_detail->religion = request('religion')  ?? 'null';
        $client_detail->l_known = request('l_known')  ?? 'null';
        $client_detail->ph = request('ph')  ?? 'null';
        $client_detail->medicard_no = request('medicard_no')  ?? 'null';
        $client_detail->medicard_orderno = "null"  ?? 'null';
        $client_detail->pension_no = request('pension_no')  ?? 'null';
        $client_detail->insurance_no = "null"  ?? 'null';
        $client_detail->insu_compny = "null"  ?? 'null';
        $client_detail->likes = "null"  ?? 'null';
        $client_detail->dislikes = "null"  ?? 'null';
        $client_detail->hobies = "null"  ?? 'null';
        $client_detail->exp_date = request('exp_date')  ?? 'null';
        $client_detail->reference_source = "null"  ?? 'null';
        $client_detail->funding_source = "null"  ?? 'null';
        $client_detail->ref_by = request('ref_by')  ?? 'null';
        $client_detail->pre_address = request('pre_address')  ?? 'null';
        $client_detail->ent_no = request('ent_no')  ?? 'null';
        $client_detail->pen_exp = request('pen_exp')  ?? 'null';
        $client_detail->respite = request('respite')  ?? 'null';
        $client_detail->weeks = request('weeks')  ?? 'null'; 
        $client_detail->acc = request('acc')  ?? 'null';
        $client_detail->res_ph = request('res_ph')  ?? 'null';
        $client_detail->res_fax = request('res_fax')  ?? 'null';
        $client_detail->res_email = request('res_email')  ?? 'null'; 
        $client_detail->ref_by = request('ref_by')  ?? 'null';        
        $client_detail->pre_address = request('pre_address')  ?? 'null';        
        $client_detail->ent_no = request('ent_no')  ?? 'null'; 
        $client_detail->nationality = request('nationality')  ?? 'null';        
        $client_detail->adm_date = request('adm_date')  ?? 'null';        
        $client_detail->room_no = request('room_no')  ?? 'null'; 

        //$client_detail->prof_pic = request('prof_pic')->getClientOriginalName()  ?? 'null';
        //$imageName = request('prof_pic')->getClientOriginalName() ?? 'null';
        //request()->prof_pic->move(public_path('images/profile_pics'), $imageName);  

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

        //$client_allergy = new ClientAllergy();    
        //$client_allergy->client_id = $clientid;
        //$client_allergy->allergy_status = request('allergy_status');
        //$client_allergy->tof_allergy = request('tof_allergy');
        //$client_allergy->hos_name = "null";
        //$client_allergy->doc_name = "null";
        //$client_allergy->duration = "null";
        //$client_allergy->madicine = "null";
        //$client_allergy->tests_report = "null";
        //$client_allergy->user_id =  Auth::user()->id;
        //$report = request('tests_report')->getClientOriginalName();
        // request()->tests_report->move(public_path('images/test_reports'), $report); 
        //$client_allergy->save();

        //$client_visitor = new ClientVisitor();     
        //$client_visitor->client_id = $clientid;
        //$client_visitor->allowed_status = request('allowed_status');
        //$client_visitor->name = "null";
        //$client_visitor->gender = "null";
        //$client_visitor->relation = "null";
        //$client_visitor->address = "null";
        //$client_visitor->ph = "null";
        //$client_visitor->id_no = "null";
        //$client_visitor->nationality = "null";
        //$client_visitor->user_id =  Auth::user()->id;
        //$client_visitor->save();

        $client_gpdetail = new ClientGpdetail();     
        $client_gpdetail->client_id = $clientid;
        $client_gpdetail->gp_name = request('gp_name')  ?? 'null';
        $client_gpdetail->address = request('gp_address')  ?? 'null';
        $client_gpdetail->ph = request('ph3')  ?? 'null';
        $client_gpdetail->clinic_name = "null"  ?? 'null';
        $client_gpdetail->booking_s_time = "null"  ?? 'null';
        $client_gpdetail->booking_e_time = "null"  ?? 'null';
        $client_gpdetail->gp_email = request('gp_email')  ?? 'null';
        $client_gpdetail->gp_lan = request('gp_lan')  ?? 'null';
        $client_gpdetail->gp_fax = request('gp_fax')  ?? 'null';
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();

        $client_nextofkin = new ClientNextofkin();    
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = "null"  ?? 'null';
        $client_nextofkin->name = request('nok_name')  ?? 'null';
        $client_nextofkin->gender = "null"  ?? 'null';
        $client_nextofkin->relation = "null"  ?? 'null';
        $client_nextofkin->address = request('nok_address')  ?? 'null';        
        $client_nextofkin->ph = request('nok_ph')  ?? 'null';
        $client_nextofkin->id_no = "null"  ?? 'null';
        $client_nextofkin->nationality = "null"  ?? 'null';
        $client_nextofkin->nok_email = request('nok_email')  ?? 'null';
        $client_nextofkin->nok_lan = request('nok_lan')  ?? 'null';
        $client_nextofkin->nok_fax = request('nok_fax')  ?? 'null';
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $guardian_detail = new GuardianDetail();    
        $guardian_detail->client_id = $clientid;
        $guardian_detail->gr_name = request('gr_name')  ?? 'null';
        $guardian_detail->gr_relation = request('gr_relation')  ?? 'null';
        $guardian_detail->gr_lan = request('gr_lan')  ?? 'null';
        $guardian_detail->gr_mob = request('gr_mob')  ?? 'null';        
        $guardian_detail->gr_email = request('gr_email')  ?? 'null';
        $guardian_detail->gr_address = request('gr_address')  ?? 'null';
        $guardian_detail->user_id =  Auth::user()->id;
        $guardian_detail->save();

        $health_service = new HealthService();    
        $health_service->client_id = $clientid;
        $health_service->hs_name = request('hs_name')  ?? 'null';
        $health_service->hs_address = request('hs_address')  ?? 'null';
        $health_service->hs_lan = request('hs_lan')  ?? 'null';
        $health_service->aftr_hrs = request('aftr_hrs')  ?? 'null';        
        $health_service->hs_fax = request('hs_fax')  ?? 'null';
        $health_service->hs_email = request('hs_email')  ?? 'null';
        $health_service->med_history = request('med_history')  ?? 'null';
        $health_service->user_id =  Auth::user()->id;
        $health_service->save();

        $pension_detail = new PensionDetail();    
        $pension_detail->client_id = $clientid;
        $pension_detail->income_type = request('income_type')  ?? 'null';//implode(',', (array) request('income_type'))  ?? 'null';
        $pension_detail->client_refno = request('client_refno')  ?? 'null';
        $pension_detail->con_card = request('con_card')  ?? 'null';
        $pension_detail->user_id =  Auth::user()->id;
        $pension_detail->save();

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
        $client_detail = ClientDetail::find($id);
        //$client_family = ClientFamily::where('client_id', '=', $id);
        //$power_of_atony = ClientPowerofatony::where('client_id', '=', $id);
        //$allergy = ClientAllergy::where('client_id', '=', $id)->firstOrFail();
        //$visitor = ClientVisitor::where('client_id', '=', $id)->firstOrFail();
        $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
        $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
        $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
        $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
        $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();
  
        return view('clients/show')->with(compact('client_detail','gpdetail','next_of_kin','guardian_detail','health_service','pension_detail'));
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
        //$allergy = ClientAllergy::where('client_id', '=', $id)->firstOrFail();
        //$visitor = ClientVisitor::where('client_id', '=', $id)->firstOrFail();
        $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
        $client_nextofkin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
        $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
        $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
        $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();
        $income = explode(',', $pension_detail->income_type);
        return view('clients/edit')->with(compact('client_detail', 'gpdetail', 'client_nextofkin', 'guardian_detail', 'health_service', 'pension_detail', 'income'));
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
        $this->authorize('update', ClientDetail::class);
        $client_detail = ClientDetail::find($id);   
        $client_detail->fname = request('fname');
        $client_detail->mname = request('mname');
        $client_detail->lname = request('lname');
        $client_detail->address = "null" ?? 'null';
        $client_detail->dob = request('dob') ?? 'null';
        $client_detail->cob = "null" ?? 'null';
        $client_detail->age = "null" ?? 'null';
        $client_detail->gender = request('gender') ?? 'null';
        $client_detail->religion = "null" ?? 'null';
        $client_detail->l_known = request('l_known') ?? 'null';
        $client_detail->ph = request('ph') ?? 'null';
        $client_detail->medicard_no = request('medicard_no') ?? 'null';
        $client_detail->medicard_orderno = "null" ?? 'null';
        $client_detail->pension_no = request('pension_no') ?? 'null';
        $client_detail->insurance_no = "null" ?? 'null';
        $client_detail->insu_compny = "null" ?? 'null';
        $client_detail->likes = "null" ?? 'null';
        $client_detail->dislikes = "null" ?? 'null';
        $client_detail->hobies = "null" ?? 'null';
        $client_detail->exp_date = request('exp_date') ?? 'null';
        $client_detail->reference_source = "null" ?? 'null';
        $client_detail->funding_source = "null" ?? 'null';
        $client_detail->ref_by = request('ref_by') ?? 'null';
        $client_detail->pre_address = request('pre_address') ?? 'null';
        $client_detail->ent_no = request('ent_no') ?? 'null';
        $client_detail->pen_exp = request('pen_exp') ?? 'null';
        $client_detail->respite = request('respite') ?? 'null';
        $client_detail->weeks = request('weeks') ?? 'null'; 
        $client_detail->acc = request('acc') ?? 'null';
        $client_detail->res_ph = "null" ?? 'null';
        $client_detail->res_fax = request('res_fax') ?? 'null';
        $client_detail->res_email = request('res_email') ?? 'null'; 
        $client_detail->ref_by = request('ref_by') ?? 'null';        
        $client_detail->pre_address = request('pre_address') ?? 'null';        
        $client_detail->ent_no = request('ent_no') ?? 'null'; 
        $client_detail->nationality = request('nationality') ?? 'null';        
        $client_detail->adm_date = request('adm_date') ?? 'null';        
        $client_detail->room_no = request('room_no') ?? 'null'; 

        
        //$client_detail->prof_pic = request('prof_pic')->getClientOriginalName() ?? 'null';
        //$imageName = request('prof_pic')->getClientOriginalName() ?? 'null';
        //request()->prof_pic->move(public_path('images/profile_pics'), $imageName);  

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

        //$client_allergy = ClientAllergy::where('client_id', '=', $clientid)->firstOrFail();
        //$client_allergy->client_id = $clientid;
        //$client_allergy->allergy_status = request('allergy_status');
        //$client_allergy->tof_allergy = request('tof_allergy');
        //$client_allergy->hos_name = "null";
        //$client_allergy->doc_name = "null";
        //$client_allergy->duration = "null";
        //$client_allergy->madicine = "null";
        //$client_allergy->tests_report = "null";
        //$client_allergy->user_id =  Auth::user()->id;
        ////$report = request('tests_report')->getClientOriginalName();
        //// request()->tests_report->move(public_path('images/test_reports'), $report); 
        //$client_allergy->save();

      //  $client_visitor = ClientVisitor::where('client_id', '=', $clientid)->firstOrFail();//     
        //$client_visitor->client_id = $clientid;
        //$client_visitor->allowed_status = request('allowed_status');
        //$client_visitor->name = "null";
        //$client_visitor->gender = "null";
        //$client_visitor->relation = "null";
        //$client_visitor->address = "null";
        //$client_visitor->ph = "null";
        //$client_visitor->id_no = "null";
        //$client_visitor->nationality = "null";
        //$client_visitor->user_id =  Auth::user()->id;
        //$client_visitor->save();

        $client_gpdetail = ClientGpdetail::where('client_id', '=', $clientid)->firstOrFail();
        $client_gpdetail->client_id = $clientid ?? 'null';
        $client_gpdetail->gp_name = request('gp_name') ?? 'null';
        $client_gpdetail->address = request('gp_address') ?? 'null';
        $client_gpdetail->ph = request('ph3') ?? 'null';
        $client_gpdetail->clinic_name = "null" ?? 'null';
        $client_gpdetail->booking_s_time = "null" ?? 'null';
        $client_gpdetail->booking_e_time = "null" ?? 'null';
        $client_gpdetail->gp_email = request('gp_email') ?? 'null';
        $client_gpdetail->gp_lan = request('gp_lan') ?? 'null';
        $client_gpdetail->gp_fax = request('gp_fax') ?? 'null';
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();
        
        $client_nextofkin = ClientNextofkin::where('client_id', '=', $clientid)->firstOrFail();
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = "null" ?? 'null';
        $client_nextofkin->name = request('nok_name') ?? 'null';
        $client_nextofkin->gender = "null" ?? 'null';
        $client_nextofkin->relation = "null" ?? 'null';
        $client_nextofkin->address = request('nok_address') ?? 'null';        
        $client_nextofkin->ph = request('nok_ph') ?? 'null';
        $client_nextofkin->id_no = "null" ?? 'null';
        $client_nextofkin->nationality = "null" ?? 'null';
        $client_nextofkin->nok_email = request('nok_email') ?? 'null';
        $client_nextofkin->nok_lan = request('nok_lan') ?? 'null';
        $client_nextofkin->nok_fax = request('nok_fax') ?? 'null';
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $guardian_detail = GuardianDetail::where('client_id', '=', $clientid)->firstOrFail();  
        $guardian_detail->client_id = $clientid;
        $guardian_detail->gr_name = request('gr_name') ?? 'null';
        $guardian_detail->gr_relation = request('gr_relation') ?? 'null';
        $guardian_detail->gr_lan = request('gr_lan') ?? 'null';
        $guardian_detail->gr_mob = request('gr_mob') ?? 'null';        
        $guardian_detail->gr_email = request('gr_email') ?? 'null';
        $guardian_detail->gr_address = request('gr_address') ?? 'null';
        $guardian_detail->user_id =  Auth::user()->id;
        $guardian_detail->save();

        $health_service = HealthService::where('client_id', '=', $clientid)->firstOrFail();    
        $health_service->client_id = $clientid;
        $health_service->hs_name = request('hs_name')  ?? 'null';
        $health_service->hs_address = request('hs_address')  ?? 'null';
        $health_service->hs_lan = request('hs_lan')  ?? 'null';
        $health_service->aftr_hrs = request('aftr_hrs')  ?? 'null';        
        $health_service->hs_fax = request('hs_fax')  ?? 'null';
        $health_service->hs_email = request('hs_email')  ?? 'null';
        $health_service->med_history = request('med_history')  ?? 'null';
        $health_service->user_id =  Auth::user()->id;
        $health_service->save();

        $pension_detail = PensionDetail::where('client_id', '=', $clientid)->firstOrFail();
        $pension_detail->client_id = $clientid;
        $pension_detail->income_type = request('income_type') ?? 'null';
        $pension_detail->client_refno = request('client_refno') ?? 'null';
        $pension_detail->con_card = request('con_card') ?? 'null';
        $pension_detail->save();
      

        $activity = new ActivityLog();
        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Client";
        $activity->save();
    
     
        return redirect()->route('clients.index')
                ->with('success','Updated successfully'); 
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
        GuardianDetail::where('client_id', '=', $id)->delete();
        HealthService::where('client_id', '=', $id)->delete();
        PensionDetail::where('client_id', '=', $id)->delete();

        $activity = new ActivityLog();
        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Client";
        $activity->save();
        return redirect()->route('clients.index')
                        ->with('success','deleted successfully');
    }
     public function generatePDF($id)
     {
         $client_detail = ClientDetail::find($id);
         //$client_family = ClientFamily::where('client_id', '=', $id);
         //$power_of_atony = ClientPowerofatony::where('client_id', '=', $id);
         //$allergy = ClientAllergy::where('client_id', '=', $id)->firstOrFail();
         //$visitor = ClientVisitor::where('client_id', '=', $id)->firstOrFail();
         $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
         $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
         $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
         $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
         $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();
   
       //  $data = ['title' => 'Welcome to SRS Manager'];
        $pdf = PDF::loadView('clients/report', compact('client_detail','gpdetail','next_of_kin','guardian_detail','health_service','pension_detail'));
   
      //  return $pdf->download('resident_report.pdf');
 
          return $pdf->stream('report.pdf', array('Attachment'=>0));   

    }
    public function reports()
    {   
        $id = Auth::user()->id;
        $client_details = ClientDetail::all();
        return view('clients/report_show',compact('client_details'));
    
    }

    public function generateResReport(){
         $id = request('res');
         
         $client_detail = ClientDetail::find($id);        
         $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
         $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
         $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
         $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
         $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();

         return view('clients/report')->with(compact('client_detail','gpdetail','next_of_kin','guardian_detail','health_service','pension_detail'));

    }

    public function viewPDF($id)
    {
         $client_detail = ClientDetail::find($id);        
         $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
         $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
         $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
         $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
         $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();

         return view('clients/report')->with(compact('client_detail','gpdetail','next_of_kin','guardian_detail','health_service','pension_detail'));

    }
    public function clientss()
    {
        return view('clients/clientss');
    }

}