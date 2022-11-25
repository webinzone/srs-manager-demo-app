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
use App\Models\RoomDetail;
use App\Models\ResidentAgreement;
use App\Models\LocationMaster;
use App\Models\ConditionReport;
use App\Models\Incident;
use App\Models\TransferRecord;
use App\Models\Vaccate;
use App\Models\Rent;
use App\Models\ProgressNote;
use App\Models\Referral;
use App\Models\SupportPlan;
use App\Models\SrsStaff;
use App\Models\Appointment;

use App\Models\Bed;

use Response;

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
        $status = "Vacant";
        $res_st = "pending";
        $residents = Referral::orderBy('cfname')->where('status', '=', $res_st)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $rooms = RoomDetail::where('status', '=', $status)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('clients/create',compact('rooms', 'emps', 'residents'));
    }

    public function store()
    {

        $client_detail = new ClientDetail();  
        $aid = request('res_name')  ?? '';  

        $referral = Referral::where('id', '=', $aid)->firstOrFail(); 
        //$referral->status = "active"
        //$referral->save();
        $aname = $referral->cfname;
        $name = explode("  ", $aname);
        $client_detail->fname = $name[0];
        $client_detail->mname = $name[1];
        $client_detail->lname = $name[2];
        $client_detail->address = ""  ?? '';
        $client_detail->dob = request('dob')  ?? '';
        $client_detail->cob = request('income_type')  ?? '';
        $client_detail->age = ""  ?? '';
        $client_detail->gender = request('gender')  ?? '';
        $client_detail->religion = request('religion')  ?? '';
        $client_detail->l_known = request('l_known')  ?? '';
        $client_detail->ph = request('ph')  ?? '';
        $client_detail->medicard_no = request('medicard_no')  ?? '';
        $client_detail->medicard_orderno = ""  ?? '';
        $client_detail->pension_no = request('pension_no')  ?? '';
        $client_detail->insurance_no = ""  ?? '';
        $client_detail->insu_compny = ""  ?? '';
        $client_detail->likes = ""  ?? '';
        $client_detail->dislikes = ""  ?? '';
        $client_detail->hobies = ""  ?? '';
        $client_detail->exp_date = request('exp_date')  ?? '';
        $client_detail->reference_source = request('inc_ref')  ?? '';
        $client_detail->funding_source = ""  ?? '';
        $client_detail->ref_by = request('ref_by')  ?? '';
        $client_detail->pre_address = request('pre_address')  ?? '';
        $client_detail->ent_no = request('ent_no')  ?? '';
        $client_detail->pen_exp = request('pen_exp')  ?? '';
        $client_detail->respite = request('respite')  ?? '';
     
        $client_detail->nok_taxi = request('nok_taxi')  ?? '';
        $client_detail->nok_exp = request('nok_exp')  ?? '';
        $client_detail->nok_other = request('nok_other')  ?? '';
        $client_detail->nok_adr = request('nok_adr')  ?? '';
        $client_detail->nok_up = request('nok_up')  ?? '';
        $client_detail->nok_noti = request('nok_noti')  ?? '';
        $client_detail->nok_em = request('nok_em')  ?? '';
        $client_detail->nok_st = request('nok_st')  ?? '';
        $client_detail->nok_dt = request('nok_dt')  ?? '';        


        $client_detail->acc = request('acc')  ?? '';
        $client_detail->res_ph = request('res_ph')  ?? '';
        $client_detail->res_fax = request('res_fax')  ?? '';
        $client_detail->res_email = request('res_email')  ?? ''; 
        $client_detail->ref_by = request('ref_by')  ?? '';        
        $client_detail->ent_no = request('ent_no')  ?? ''; 
        $client_detail->nationality = request('nationality')  ?? '';        
        $client_detail->adm_date = request('adm_date')  ?? ''; 

        $client_detail->inc_sname = request('inc_sname')  ?? ''; 
        $client_detail->inc_phone = request('inc_phone')  ?? ''; 
        $client_detail->inc_email = request('inc_email')  ?? ''; 


        
        $roomid = request('room_no')  ?? '';
        $roomm = RoomDetail::where('id', '=', $roomid)->firstOrFail();
        $rroom = $roomm->room_no;
        $client_detail->room_no = $rroom  ?? ''; 

        $client_detail->week_rent = request('room_rent')  ?? '';  
        $client_detail->room_type = request('room_type')  ?? '';  

        $client_detail->other_income = request('other_income')  ?? ''; 
        $client_detail->medi_no2 = request('medi_no2')  ?? ''; 
        $client_detail->start_period = request('start_period')  ?? ''; 
        $client_detail->end_period = request('end_period')  ?? ''; 

        $HowManyWeeks = date( 'W', strtotime( $client_detail->end_period ) ) - date( 'W', strtotime( $client_detail->start_period ) );

        $client_detail->weeks = $HowManyWeeks ?? ''; 
        $rate = request('room_rent')  ?? '';
        $client_detail->room_rent = (int)$HowManyWeeks * (int)$rate ?? '';
        
        if(request('prof_pic') != ''){ 
        $client_detail->prof_pic = request('prof_pic')->getClientOriginalName()  ?? '';
        $imageName = request('prof_pic')->getClientOriginalName() ?? '';
        request()->prof_pic->move(public_path('images/profile_pics'), $imageName);
        }      
 
         $client_detail->allergy_det = request('allergy_det')  ?? ''; 
         $client_detail->status = request('status')  ?? ''; 
         $client_detail->company_id = Auth::user()->c_id  ?? ''; 
         $client_detail->location_id = Auth::user()->l_id  ?? '';

        $client_detail->user_id =  Auth::user()->id;
        $bed = request('bed')  ?? ''; 
        $client_detail->bed_no = $bed;
        $client_detail->save(); 

        $clientid = $client_detail->id;
        //$room = $client_detail->room_no;
        $roomdetails = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrrid = $roomdetails->id;
        $r_beds = $roomdetails->beds_no;

         $roomdetails->client_id = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
        $roomdetails->save();

        $bed_details = Bed::where('room_id', '=', $rrrid)->where('bed_no', '=', $bed)->firstOrFail();
        $bed_details->status = "Booked";
        $bed_details->res_name = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
        $bed_details->save();
        $booked = "Booked";
        $bed_det = Bed::where('room_id', '=', $rrrid)->where('status', '=', $booked)->get();
        $b_count = count($bed_det);
        $r_count = (int)$r_beds;

        if($b_count == $r_count){
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Booked";
            $roomdeta->save();
        }

        //$roomdetails->status = "Booked";
       

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
        //$client_allergy->hos_name = "";
        //$client_allergy->doc_name = "";
        //$client_allergy->duration = "";
        //$client_allergy->madicine = "";
        //$client_allergy->tests_report = "";
        //$client_allergy->user_id =  Auth::user()->id;
        //$report = request('tests_report')->getClientOriginalName();
        // request()->tests_report->move(public_path('images/test_reports'), $report); 
        //$client_allergy->save();

        //$client_visitor = new ClientVisitor();     
        //$client_visitor->client_id = $clientid;
        //$client_visitor->allowed_status = request('allowed_status');
        //$client_visitor->name = "";
        //$client_visitor->gender = "";
        //$client_visitor->relation = "";
        //$client_visitor->address = "";
        //$client_visitor->ph = "";
        //$client_visitor->id_no = "";
        //$client_visitor->nationality = "";
        //$client_visitor->user_id =  Auth::user()->id;
        //$client_visitor->save();

        $client_gpdetail = new ClientGpdetail();     
        $client_gpdetail->client_id = $clientid;
        $client_gpdetail->gp_name = request('gp_name')  ?? '';
        $client_gpdetail->address = request('gp_address')  ?? '';
        $client_gpdetail->ph = request('ph3')  ?? '';
        $client_gpdetail->clinic_name = ""  ?? '';
        $client_gpdetail->booking_s_time = ""  ?? '';
        $client_gpdetail->booking_e_time = ""  ?? '';
        $client_gpdetail->gp_email = request('gp_email')  ?? '';
        $client_gpdetail->gp_lan = request('gp_lan')  ?? '';
        $client_gpdetail->gp_fax = request('gp_fax')  ?? '';
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();

        $client_nextofkin = new ClientNextofkin();    
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = ""  ?? '';
        $client_nextofkin->name = request('nok_name')  ?? '';
        $client_nextofkin->gender = ""  ?? '';
        $client_nextofkin->relation = request('nok_relation')  ?? '';
        $client_nextofkin->address = request('nok_address')  ?? '';        
        $client_nextofkin->ph = request('nok_ph')  ?? '';
        $client_nextofkin->id_no = ""  ?? '';
        $client_nextofkin->nationality = ""  ?? '';
        $client_nextofkin->nok_email = request('nok_email')  ?? '';
        $client_nextofkin->nok_lan = request('nok_lan')  ?? '';
        $client_nextofkin->nok_fax = request('nok_fax')  ?? '';
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $guardian_detail = new GuardianDetail();    
        $guardian_detail->client_id = $clientid;
        $guardian_detail->gr_name = request('gr_name')  ?? '';
        $guardian_detail->gr_relation = request('gr_relation')  ?? '';
        $guardian_detail->gr_lan = request('gr_lan')  ?? '';
        $guardian_detail->gr_mob = request('gr_mob')  ?? '';        
        $guardian_detail->gr_email = request('gr_email')  ?? '';
        $guardian_detail->gr_address = request('gr_address')  ?? '';
        $guardian_detail->user_id =  Auth::user()->id;
        $guardian_detail->save();

        $health_service = new HealthService();    
        $health_service->client_id = $clientid;
        $health_service->hs_name = request('hs_name')  ?? '';
        $health_service->hs_address = request('hs_address')  ?? '';
        $health_service->hs_lan = request('hs_lan')  ?? '';
        $health_service->aftr_hrs = request('aftr_hrs')  ?? '';        
        $health_service->hs_fax = request('hs_fax')  ?? '';
        $health_service->hs_email = request('hs_email')  ?? '';
        $health_service->med_history = request('med_history')  ?? '';
        $health_service->user_id =  Auth::user()->id;
        $health_service->save();

        $pension_detail = new PensionDetail();    
        $pension_detail->client_id = $clientid;
        $pension_detail->income_type = request('income_type')  ?? ''; //implode(',', (array) request('income_type'))  ?? '';
        $pension_detail->client_refno = request('client_refno')  ?? '';
        $pension_detail->con_card = request('con_card')  ?? '';
        $pension_detail->user_id =  Auth::user()->id;
        $pension_detail->save();

        $referralup = Referral::where('id', '=', $aid)->firstOrFail(); 
        $referralup->status = "active";
        $referralup->client_id = $clientid;
        $referralup->save();

        $activity = new ActivityLog();

          $activity->user = Auth::user()->first_name;
          $activity->action = "Created";
          $activity->item = "Resident";
          $activity->company_id = Auth::user()->c_id  ?? '';
          $activity->location_id = Auth::user()->l_id  ?? '';
          $activity->user_id = Auth::user()->id;
          $activity->res_name = $name[0]."  ".$name[1]."  ".$name[2];
          $activity->client_id = $client_detail->id;
          $activity->item_id = $client_detail->id;
          $activity->item_route = "clients";
          $activity->save();
        
     
        return redirect()->route('clients.index')
                ->with('success','Client Added successfully');                 

    }

   public function show($id)
    {
        $client_detail = ClientDetail::find($id);
        $status = $client_detail->respite;
         if ($status == "Respite") {
            $duration = "From :".date('d-m-Y', strtotime($client_detail->start_period)).","."To :".date('d-m-Y', strtotime($client_detail->end_period));
            $weeks = $client_detail->weeks;
         }else
         {
            $duration = "Admisiion Date :".date('d-m-Y', strtotime($client_detail->adm_date));
            $weeks = '';
         }

        //$client_family = ClientFamily::where('client_id', '=', $id);
        //$power_of_atony = ClientPowerofatony::where('client_id', '=', $id);
        //$allergy = ClientAllergy::where('client_id', '=', $id)->firstOrFail();
        //$visitor = ClientVisitor::where('client_id', '=', $id)->firstOrFail();
        $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
        $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
        $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
        $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
        $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();
  
        return view('clients/show')->with(compact('client_detail','gpdetail','next_of_kin','guardian_detail','health_service','pension_detail','duration','weeks'));
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
        $roomid = $client_detail->room_no;
        $bedno = $client_detail->bed_no;
        $r_no = RoomDetail::where('room_no', '=', $roomid)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrid = $r_no->id;
         $residents = Referral::orderBy('cfname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
       
        $aaname = $client_detail->fname."  ".$client_detail->mname."  ".$client_detail->lname;
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
        $status = "Vacant";
        $rooms = RoomDetail::where('status', '=', $status)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();

        return view('clients/edit')->with(compact('client_detail', 'gpdetail', 'client_nextofkin', 'guardian_detail', 'health_service', 'pension_detail', 'income', 'rooms', 'rrid', 'bedno', 'emps','aaname','residents'));
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

        $aid = request('res_name')  ?? '';  

        // $referral = Referral::where('id', '=', $aid)->firstOrFail(); 
        // //$referral->status = "active"
        // //$referral->save();
        // $aname = $referral->cfname;
        // $name = explode("  ", $aname);
        // $client_detail->fname = $name[0];
        // $client_detail->mname = $name[1];
        // $client_detail->lname = $name[2];
        $client_detail->address = ""  ?? '';
        $client_detail->dob = request('dob')  ?? '';
        $client_detail->cob = request('income_type')  ?? '';
        $client_detail->age = ""  ?? '';
        $client_detail->gender = request('gender')  ?? '';
        $client_detail->religion = request('religion')  ?? '';
        $client_detail->l_known = request('l_known')  ?? '';
        $client_detail->ph = request('ph')  ?? '';
        $client_detail->medicard_no = request('medicard_no')  ?? '';
        $client_detail->medicard_orderno = ""  ?? '';
        $client_detail->pension_no = request('pension_no')  ?? '';
        $client_detail->insurance_no = ""  ?? '';
        $client_detail->insu_compny = ""  ?? '';
        $client_detail->likes = ""  ?? '';
        $client_detail->dislikes = ""  ?? '';
        $client_detail->hobies = ""  ?? '';
        $client_detail->exp_date = request('exp_date')  ?? '';
        $client_detail->reference_source = request('inc_ref')  ?? '';
        $client_detail->funding_source = ""  ?? '';
        $client_detail->ref_by = request('ref_by')  ?? '';
        $client_detail->pre_address = request('pre_address')  ?? '';
        $client_detail->ent_no = request('ent_no')  ?? '';
        $client_detail->pen_exp = request('pen_exp')  ?? '';
        $client_detail->respite = request('respite')  ?? '';
     
        $client_detail->nok_taxi = request('nok_taxi')  ?? '';
        $client_detail->nok_exp = request('nok_exp')  ?? '';
        $client_detail->nok_other = request('nok_other')  ?? '';
        $client_detail->nok_adr = request('nok_adr')  ?? '';
        $client_detail->nok_up = request('nok_up')  ?? '';
        $client_detail->nok_noti = request('nok_noti')  ?? '';
        $client_detail->nok_em = request('nok_em')  ?? '';
        $client_detail->nok_st = request('nok_st')  ?? '';
        $client_detail->nok_dt = request('nok_dt')  ?? '';        


        $client_detail->acc = request('acc')  ?? '';
        $client_detail->res_ph = request('res_ph')  ?? '';
        $client_detail->res_fax = request('res_fax')  ?? '';
        $client_detail->res_email = request('res_email')  ?? ''; 
        $client_detail->ref_by = request('ref_by')  ?? '';        
        $client_detail->ent_no = request('ent_no')  ?? ''; 
        $client_detail->nationality = request('nationality')  ?? '';        
        $client_detail->adm_date = request('adm_date')  ?? ''; 

        $client_detail->inc_sname = request('inc_sname')  ?? ''; 
        $client_detail->inc_phone = request('inc_phone')  ?? ''; 
        $client_detail->inc_email = request('inc_email')  ?? ''; 


        
        $roomid = request('room_no')  ?? '';
        $roomm = RoomDetail::where('id', '=', $roomid)->firstOrFail();
        $rroom = $roomm->room_no;
        $client_detail->room_no = $rroom  ?? ''; 

        $client_detail->week_rent = request('room_rent')  ?? '';  
        $client_detail->room_type = request('room_type')  ?? '';  

        $client_detail->other_income = request('other_income')  ?? ''; 
        $client_detail->medi_no2 = request('medi_no2')  ?? ''; 
        $client_detail->start_period = request('start_period')  ?? ''; 
        $client_detail->end_period = request('end_period')  ?? ''; 

        $HowManyWeeks = date( 'W', strtotime( $client_detail->end_period ) ) - date( 'W', strtotime( $client_detail->start_period ) );

        $client_detail->weeks = $HowManyWeeks ?? ''; 
        $rate = request('room_rent')  ?? '';
        $client_detail->room_rent = (int)$HowManyWeeks * (int)$rate ?? '';
        
        if(request('prof_pic') != ''){ 
        $client_detail->prof_pic = request('prof_pic')->getClientOriginalName()  ?? '';
        $imageName = request('prof_pic')->getClientOriginalName() ?? '';
        request()->prof_pic->move(public_path('images/profile_pics'), $imageName);
        }      
 
         $client_detail->allergy_det = request('allergy_det')  ?? ''; 
         $client_detail->status = request('status')  ?? ''; 
         $client_detail->company_id = Auth::user()->c_id  ?? ''; 
         $client_detail->location_id = Auth::user()->l_id  ?? '';

        $client_detail->user_id =  Auth::user()->id;
        $bed = request('bed')  ?? ''; 
        $client_detail->bed_no = $bed;
        $client_detail->save(); 

        $clientid = $client_detail->id;
        //$room = $client_detail->room_no;
        $roomdetails = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrrid = $roomdetails->id;
        $r_beds = $roomdetails->beds_no;

         $roomdetails->client_id = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
        $roomdetails->save();

        $bed_details = Bed::where('room_id', '=', $rrrid)->where('bed_no', '=', $bed)->firstOrFail();
        $bed_details->status = "Booked";
        $bed_details->res_name = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
        $bed_details->save();
        $booked = "Booked";
        $bed_det = Bed::where('room_id', '=', $rrrid)->where('status', '=', $booked)->get();
        $b_count = count($bed_det);
        $r_count = (int)$r_beds;

        if($b_count == $r_count){
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Booked";
            $roomdeta->save();
        }

        //$roomdetails->status = "Booked";
       

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
        //$client_allergy->hos_name = "";
        //$client_allergy->doc_name = "";
        //$client_allergy->duration = "";
        //$client_allergy->madicine = "";
        //$client_allergy->tests_report = "";
        //$client_allergy->user_id =  Auth::user()->id;
        //$report = request('tests_report')->getClientOriginalName();
        // request()->tests_report->move(public_path('images/test_reports'), $report); 
        //$client_allergy->save();

        //$client_visitor = new ClientVisitor();     
        //$client_visitor->client_id = $clientid;
        //$client_visitor->allowed_status = request('allowed_status');
        //$client_visitor->name = "";
        //$client_visitor->gender = "";
        //$client_visitor->relation = "";
        //$client_visitor->address = "";
        //$client_visitor->ph = "";
        //$client_visitor->id_no = "";
        //$client_visitor->nationality = "";
        //$client_visitor->user_id =  Auth::user()->id;
        //$client_visitor->save();

        $client_gpdetail = new ClientGpdetail();     
        $client_gpdetail->client_id = $clientid;
        $client_gpdetail->gp_name = request('gp_name')  ?? '';
        $client_gpdetail->address = request('gp_address')  ?? '';
        $client_gpdetail->ph = request('ph3')  ?? '';
        $client_gpdetail->clinic_name = ""  ?? '';
        $client_gpdetail->booking_s_time = ""  ?? '';
        $client_gpdetail->booking_e_time = ""  ?? '';
        $client_gpdetail->gp_email = request('gp_email')  ?? '';
        $client_gpdetail->gp_lan = request('gp_lan')  ?? '';
        $client_gpdetail->gp_fax = request('gp_fax')  ?? '';
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();

        $client_nextofkin = new ClientNextofkin();    
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = ""  ?? '';
        $client_nextofkin->name = request('nok_name')  ?? '';
        $client_nextofkin->gender = ""  ?? '';
        $client_nextofkin->relation = request('nok_relation')  ?? '';
        $client_nextofkin->address = request('nok_address')  ?? '';        
        $client_nextofkin->ph = request('nok_ph')  ?? '';
        $client_nextofkin->id_no = ""  ?? '';
        $client_nextofkin->nationality = ""  ?? '';
        $client_nextofkin->nok_email = request('nok_email')  ?? '';
        $client_nextofkin->nok_lan = request('nok_lan')  ?? '';
        $client_nextofkin->nok_fax = request('nok_fax')  ?? '';
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $guardian_detail = new GuardianDetail();    
        $guardian_detail->client_id = $clientid;
        $guardian_detail->gr_name = request('gr_name')  ?? '';
        $guardian_detail->gr_relation = request('gr_relation')  ?? '';
        $guardian_detail->gr_lan = request('gr_lan')  ?? '';
        $guardian_detail->gr_mob = request('gr_mob')  ?? '';        
        $guardian_detail->gr_email = request('gr_email')  ?? '';
        $guardian_detail->gr_address = request('gr_address')  ?? '';
        $guardian_detail->user_id =  Auth::user()->id;
        $guardian_detail->save();

        $health_service = new HealthService();    
        $health_service->client_id = $clientid;
        $health_service->hs_name = request('hs_name')  ?? '';
        $health_service->hs_address = request('hs_address')  ?? '';
        $health_service->hs_lan = request('hs_lan')  ?? '';
        $health_service->aftr_hrs = request('aftr_hrs')  ?? '';        
        $health_service->hs_fax = request('hs_fax')  ?? '';
        $health_service->hs_email = request('hs_email')  ?? '';
        $health_service->med_history = request('med_history')  ?? '';
        $health_service->user_id =  Auth::user()->id;
        $health_service->save();

        $pension_detail = new PensionDetail();    
        $pension_detail->client_id = $clientid;
        $pension_detail->income_type = request('income_type')  ?? ''; //implode(',', (array) request('income_type'))  ?? '';
        $pension_detail->client_refno = request('client_refno')  ?? '';
        $pension_detail->con_card = request('con_card')  ?? '';
        $pension_detail->user_id =  Auth::user()->id;
        $pension_detail->save();

        // $referralup = Referral::where('id', '=', $aid)->firstOrFail(); 
        // $referralup->status = "active";
        // $referralup->client_id = $clientid;
        // $referralup->save();
      

       $activity = new ActivityLog();

          $activity->user = Auth::user()->first_name;
          $activity->action = "Updated";
          $activity->item = "Resident";
          $activity->company_id = Auth::user()->c_id  ?? '';
          $activity->location_id = Auth::user()->l_id  ?? '';
          $activity->user_id = Auth::user()->id;
          $activity->res_name = $client_detail->fname."  ".$client_detail->mname."  ".$client_detail->lname;
          $activity->client_id = $client_detail->id;
          $activity->item_id = $client_detail->id;
          $activity->item_route = "clients";
          $activity->save();
        
        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('residentDetails', $client_detail->id)
                ->with('success','Updated successfully');
        }
        else
        {
            return redirect()->route('clients.index')
                ->with('success','Updated successfully'); 
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
        $this->authorize('destroy', ClientDetail::class);
        
        $checker1 = ConditionReport::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker2 = ResidentAgreement::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker3 = Referral::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker4 = SupportPlan::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker5 = TransferRecord::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker6 = Incident::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker7 = Vaccate::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker8 = Rent::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker9 = ProgressNote::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";
        $checker10 = Appointment::select('client_id')->where('client_id', '=', $id)->exists() ?? "false";


        if ($checker1 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Condition Report First !');
        }elseif ($checker2 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Resident Agreement  First !');
        }
        // elseif ($checker3 == true) {
        //     return redirect()->route('clients.index')
        //             ->with('error', 'Please delete Resident Referral Report First !');
        // }
        elseif ($checker4 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Support Plan First !');
        }elseif ($checker5 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Transfer Report First !');
        }elseif ($checker6 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Incident Report First !');
        }elseif ($checker7 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Vaccate Report First !');
        }elseif ($checker8 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Rent Details First !');
        }elseif ($checker9 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Progress Report First !');
        }elseif ($checker10 == true) {
            return redirect()->route('clients.index')
                    ->with('error', 'Please delete Resident Appointment First !');
        }
        else {


        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $rroom = $res->room_no;
        $bed = $res->bed_no;

        $roomdetails = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrrid = $roomdetails->id;
        $r_beds = $roomdetails->beds_no;

        $bed_details = Bed::where('room_id', '=', $rrrid)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('bed_no', '=', $bed)->firstOrFail();
        $bed_details->status = "Vacant";
        $bed_details->res_name = " ";
        $bed_details->save();
        $booked = "Booked";
        $bed_det = Bed::where('room_id', '=', $rrrid)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('status', '=', $booked)->get();
        $b_count = count($bed_det);
        $r_count = (int)$r_beds;

        if($b_count == $r_count){
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Booked";
            $roomdeta->save();
        }else{
            $roomdeta = RoomDetail::where('room_no', '=', $rroom)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
            $roomdeta->status = "Vacant";
            $roomdeta->save();
        }
        $client_detail = ClientDetail::find($id);

        $activity = new ActivityLog();

          $activity->user = Auth::user()->first_name;
          $activity->action = "Deleted";
          $activity->item = "Resident";
          $activity->company_id = Auth::user()->c_id  ?? '';
          $activity->location_id = Auth::user()->l_id  ?? '';
          $activity->user_id = Auth::user()->id;
          $activity->res_name = $client_detail->fname."  ".$client_detail->mname."  ".$client_detail->lname;
          $activity->client_id = $client_detail->id;
          $activity->item_id = $client_detail->id;
          $activity->item_route = "clients";
          $activity->save();

          ActivityLog::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('item_route', '=', "clients")->where('item_id', '=', $client_detail->id)->update(['item_id' => 0]);
        
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
        $activity->item = "Resident";
        
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('clients.index')
                        ->with('success','deleted successfully');
        }
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
        $client_details = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('clients/report_show',compact('client_details'));
    
    }

    public function generateResReport(){
         $id = request('res');
         
         
         $client_detail = ClientDetail::find($id); 
         $status = $client_detail->respite;
         if ($status == "Respite") {
            $duration = "From :".date('d-m-Y', strtotime($client_detail->start_period)).","."To :".date('d-m-Y', strtotime($client_detail->end_period));
            $weeks = $client_detail->weeks;
         }else
         {
            $duration = "Admisiion Date :".date('d-m-Y', strtotime($client_detail->adm_date));
            $weeks = '';
         }

         $gpdetail = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
         $next_of_kin = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
         $guardian_detail = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
         $health_service = HealthService::where('client_id', '=', $id)->firstOrFail();
         $pension_detail = PensionDetail::where('client_id', '=', $id)->firstOrFail();

         $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

         return view('clients/report')->with(compact('client_detail','gpdetail','next_of_kin','guardian_detail','health_service','pension_detail','duration','weeks','locations'));

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
    
    public function getRoomDetails($id){
        $data = RoomDetail::where('id', '=', $id)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        return response()->json($data);
    }

    public function clientss()
    {
        return view('clients/clientss');
    }

    public function getaccountsDetails()
    {
        $client_details = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('clients/accounts',compact('client_details')); 
    }

    public function generateAccountReport()
    {
        //$id = request('res');
         $i = 1;
         $client_details = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? ''; 
         
         $pension_details = PensionDetail::all();

         //$res = $client_detail->fname." ".$client_detail->mname." ".$client_detail->lname;
         $resident_agreements = ResidentAgreement::all();
           $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

         return view('clients/accounts_report')->with(compact('client_details','pension_details','i','resident_agreements','locations'));

    }

    public function res_active(){
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';

        return view('clients/active_clients',compact('residents')); 
        
    }

    public function res_vaccate(){
            $residents = ClientDetail::where('status', '=', 'Vaccate')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('clients/vaccate_clients',compact('residents')); 
            

    }

    public function res_transfer(){
            $residents = ClientDetail::where('status', '=', 'Transfered')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        
        return view('clients/transfer_clients',compact('residents')); 
            
    }

    public function regulations(){
        //return view('clients/regulations'); 

        $filename = 'test.pdf';
        $path = storage_path($filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    public function chart(){
        return view('clients/chart'); 
    }

    public function policy(){
        return view('clients/policy'); 
    }


}