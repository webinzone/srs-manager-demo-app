<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Referral;
use App\Models\Referral2;
use App\Models\ClientDetail;
use App\Models\ConditionReport;
use App\Models\SrsStaff;
use App\Models\GuardianDetail;
use App\Models\Booking;
use App\Models\PensionDetail;
use App\Models\HealthService;
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
class ReferralsController extends Controller
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
        $this->authorize('view', Referral::class);
        return view('referrals/index');
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
        $this->authorize('create',Referral::class);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('location_id', '=', Auth::user()->l_id)->get();
        return view('referrals/create',compact('residents','emps'));
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
        $this->authorize('create',Referral::class);
        $referral = new Referral();

        $referral->con_name = request('con_name') ?? '';
        $referral->refer_name = request('refer_name') ?? '';
        $referral->r_date = request('r_date') ?? '';
        $referral->rep_name = request('rep_name') ?? '';
        $referral->relation = request('relation') ?? '';
        $referral->email = request('email') ?? '';
        $referral->ph = request('ph') ?? '';
        $referral->reason = request('reason') ?? '';
        $referral->appr_becoz = request('appr_becoz') ?? '';
        $referral->ref_date = request('ref_date') ?? '';
        $referral->ref_posi = request('ref_posi') ?? '';
        $referral->ref_agency = request('ref_agency') ?? '';
        $referral->ref_email = request('ref_email') ?? '';
        $referral->ref_ph = request('ref_ph') ?? '';

        $id = request('cfname') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;

        $referral->cfname = $name ?? '';
        $referral->client_id = $id ?? '';

        $referral->csurname = request('csurname') ?? '';  
        $referral->cdob = request('cdob') ?? '';
        $referral->cgender = request('cgender') ?? '';
        $referral->creligion = request('creligion') ?? '';
        $referral->cph = request('cph') ?? '';
        $referral->cemail = request('cemail') ?? '';
        $referral->caddress = request('caddress') ?? '';
        $referral->csrs_name = request('csrs_name') ?? '';
        $referral->csrs_ph = request('csrs_ph') ?? '';
        $referral->csrs_insu = request('csrs_insu') ?? '';
        $referral->csrs_refno = request('csrs_refno') ?? '';
        $referral->nok_name = request('nok_name') ?? '';
        $referral->nok_relation = request('nok_relation') ?? '';
        $referral->nok_address = request('nok_address') ?? '';
        $referral->nok_email = request('nok_email') ?? '';
        $referral->nok_ph = request('nok_ph') ?? '';
        $referral->gp_name = request('gp_name') ?? '';
        $referral->gp_address = request('gp_address') ?? '';
        $referral->gp_ph = request('gp_ph') ?? '';
        $referral->gp_fax = request('gp_fax') ?? '';
        $referral->gp_email = request('gp_email') ?? '';
        $referral->gua_refno = request('gua_refno') ?? '';
        $referral->gua_name = request('gua_name') ?? '';
        $referral->gua_addr = request('gua_addr') ?? '';
        $referral->gua_email = request('gua_email') ?? '';
        $referral->gua_ph = request('gua_ph') ?? '';
        $referral->ad_name = request('ad_name') ?? '';
        $referral->ad_refno = request('ad_refno') ?? '';
        $referral->ad_addr = request('ad_addr') ?? '';
        $referral->ad_email = request('ad_email') ?? '';
        $referral->ad_ph = request('ad_ph') ?? '';
        $referral->pen_type = request('pen_type') ?? '';
        $referral->pen_refno = request('pen_refno') ?? '';
        $referral->pen_medino = request('pen_medino') ?? '';
        $referral->pen_mediexp = request('pen_mediexp') ?? '';
        $referral->pen_taxi = request('pen_taxi') ?? '';
        $referral->pen_taxiexp = request('pen_taxiexp') ?? '';
        $referral->medi_drugname = implode(',', (array) request('medi_drugname')) ?? '';
        $referral->medi_dose = implode(',', (array) request('medi_dose')) ?? '';
        $referral->medi_freq = implode(',', (array) request('medi_freq')) ?? '';
        $referral->medi_duration = implode(',', (array) request('medi_duration')) ?? '';
        $referral->medi_lasttaken = implode(',', (array) request('medi_lasttaken')) ?? '';
        $referral->c_medi = request('c_medi') ?? '';
        $referral->c_ownmedi = request('c_ownmedi') ?? '';
        $referral->c_medisideeffect = request('c_medisideeffect') ?? '';
        $referral->ph_status = request('ph_status') ?? '';
        $referral->cogi_status = request('cogi_status') ?? '';
        $referral->dis_primary = request('dis_primary') ?? '';
        $referral->dis_casemngr = request('dis_casemngr') ?? '';
        $referral->dis_org = request('dis_org') ?? '';
        $referral->dis_email = request('dis_email') ?? '';
        $referral->dis_ph = request('dis_ph') ?? '';
        $referral->ment_status = request('ment_status') ?? '';
        $referral->ment_casemngr = request('ment_casemngr') ?? '';
        $referral->ment_org = request('ment_org') ?? '';
        $referral->ment_email = request('ment_email') ?? '';
        $referral->ment_ph = request('ment_ph') ?? '';
        $referral->behav_harm = implode(',', (array) request('behav_harm')) ?? '';
        $referral->behav_details = request('behav_details') ?? '';
        $referral->triger = request('triger') ?? '';
        $referral->user_id =  Auth::user()->id;
        $referral->company_id = Auth::user()->c_id  ?? '';
        $referral->location_id = Auth::user()->l_id  ?? '';

        $referral->save();
        $ref_id = $referral->id;

        $referral2 = new Referral2();
        $referral2->client_id = $ref_id ?? '';
        $referral2->med1 = request('med1') ?? '';
        $referral2->med1_det = request('med1_det') ?? '';
        $referral2->med2 = request('med2') ?? '';
        $referral2->med2_det = request('med2_det') ?? '';
        $referral2->med3 = request('med3') ?? '';
        $referral2->med3_det = request('med3_det') ?? '';
        $referral2->med4 = request('med4') ?? '';
        $referral2->med4_det = request('med4_det') ?? '';
        $referral2->med5 = request('med5') ?? '';
        $referral2->med5_det = request('med5_det') ?? '';
        $referral2->med6 = request('med6') ?? '';
        $referral2->med6_det = request('med6_det') ?? '';
        $referral2->med7 = request('med7') ?? '';
        $referral2->med7_det = request('med7_det') ?? '';
        $referral2->med8 = request('med8') ?? '';  
        $referral2->med8_det = request('med8_det') ?? '';
        $referral2->med9 = request('med9') ?? '';
        $referral2->med9_det = request('med9_det') ?? '';        
        $referral2->med10 = request('med10') ?? '';
        $referral2->med10_det = request('med10_det') ?? '';
        $referral2->med11 = request('med11') ?? '';
        $referral2->med11_det = request('med11_det') ?? '';
        $referral2->med12 = request('med12') ?? '';
        $referral2->med12_det = request('med12_det') ?? '';
        $referral2->med13 = request('med13') ?? '';
        $referral2->med13_det = request('med13_det') ?? '';
        $referral2->med14 = request('med14') ?? '';
        $referral2->med14_det = request('med14_det') ?? '';
        $referral2->med15 = request('med15') ?? '';
        $referral2->med15_det = request('med15_det') ?? '';
        $referral2->med16 = request('med16') ?? '';
        $referral2->med16_det = request('med16_det') ?? '';
        $referral2->med17 = request('med17') ?? '';
        $referral2->med17_det = request('med17_det') ?? '';
        $referral2->med18 = request('med18') ?? '';
        $referral2->med18_det = request('med18_det') ?? '';
        $referral2->p1 = request('p1') ?? '';
        $referral2->p2 = request('p2') ?? '';
        $referral2->p3 = request('p3') ?? '';
        $referral2->p4 = request('p4') ?? '';
        $referral2->p5 = request('p5') ?? '';
        $referral2->p6 = request('p6') ?? '';
        $referral2->p7 = request('p7') ?? '';
        $referral2->p8 = request('p8') ?? '';
        $referral2->p9 = request('p9') ?? '';
        $referral2->p10 = request('p10') ?? '';
        $referral2->a1 = implode(',', (array) request('a1')) ?? '';
        $referral2->a2 = implode(',', (array) request('a2')) ?? '';
        $referral2->a3 = implode(',', (array) request('a3')) ?? '';
        $referral2->a_comments = request('a_comments') ?? '';
        $referral2->public_trans = request('public_trans') ?? '';
        $referral2->app_keep = request('app_keep') ?? '';
        $referral2->social_activity = request('social_activity') ?? '';
        $referral2->hobbies = request('hobbies') ?? '';
        $referral2->case_name = request('case_name') ?? '';
        $referral2->case_org = request('case_org') ?? '';
        $referral2->case_email = request('case_email') ?? '';
        $referral2->case_ph = request('case_ph') ?? '';
        $referral2->case_addr = request('case_addr') ?? '';
        $referral2->serv_per = request('serv_per') ?? '';
        $referral2->serv_org = request('serv_org') ?? '';
        $referral2->serv_adr = request('serv_adr') ?? '';
        $referral2->serv_email = request('serv_email') ?? '';
        $referral2->serv_ph = request('serv_ph') ?? '';
        $referral2->addserv_per = request('addserv_per') ?? '';
        $referral2->addserv_org = request('addserv_org') ?? '';
        $referral2->addserv_adr = request('addserv_adr') ?? '';
        $referral2->addserv_email = request('addserv_email') ?? '';
        $referral2->addserv_ph = request('addserv_ph') ?? '';
        $referral2->other_relev = request('other_relev') ?? '';
        $referral2->rel_name = request('rel_name') ?? '';
        $referral2->rel_pos = request('rel_pos') ?? '';
        $referral2->rel_org = request('rel_org') ?? '';
        $referral2->rel_date = request('rel_date') ?? '';
        $referral2->user_id =  Auth::user()->id;
        $referral2->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Referral Report";
      $activity->save();

      return redirect()->route('referrals.index')
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
        $this->authorize('show',Referral::class);
        $referral = Referral::find($id);
        $referral2 = Referral2::where('client_id', '=', $referral->id)->firstOrFail();

        $drug = explode(',', $referral->medi_drugname);
        $drug = array_filter($drug, 'strlen');
        
        $dose = explode(',', $referral->medi_dose);   
        $freq = explode(',', $referral->medi_freq);
        $duration = explode(',', $referral->medi_duration);
        $last = explode(',', $referral->medi_lasttaken);
        $item_last= count($drug);
        $num = (int)$item_last;

        $behav = explode(',', $referral->behav_harm);
        $beh= count($behav);
        $n = (int)$beh;

        $ch1 = ' ';
        $ch2 = ' ';
        $ch3 = ' ';
        $ch4 = ' ';
        $ch5 = ' ';
        $ch6 = ' ';
        $ch7 = ' ';
        $ch8 = ' ';
        $ch9 = ' ';
        $ch10 = ' ';

        for ($i=0; $i < $n; $i++) { 
            if ($behav[$i] == "Smoking") {
                $ch1 = 'true';
            }
            else if ($behav[$i] == "Self-Motivation") {
                $ch2 = 'true';
            }
            else if ($behav[$i] == "Capacity for cooperation") {
                $ch3 = 'true';
            }
            else if ($behav[$i] == "Wandering") {
                $ch4 = 'true';
            }
            else if ($behav[$i] == "Capacity to share") {
                $ch5 = 'true';
            }
            else if ($behav[$i] == "Capacity to socialise") {
                $ch6 = 'true';
            }
            else if ($behav[$i] == "Verbal aggression") {
                $ch7 = 'true';
            }
            else if ($behav[$i] == "Drug/alcohol") {
                $ch8 = 'true';
            }
            else if ($behav[$i] == "Impulse control") {
                $ch9 = 'true';
            }
            else if ($behav[$i] == "Other") {
                $ch10 = 'true';
            }
        }

        $a11 = explode(',', $referral2->a1);
        $a1_count= count($a11);
        $a1_n = (int)$a1_count;

        $a1_ch1 = ' ';
        $a2_ch2 = ' ';
        $a3_ch3 = ' ';
        $a4_ch4 = ' ';


        for ($i=0; $i < $a1_n; $i++) { 
            if ($a11[$i] == "Stick") {
                $a1_ch1 = 'true';
            }
            else if ($a11[$i] == "Frame") {
                $a2_ch2 = 'true';
            }
            else if ($a11[$i] == "Wheelchair") {
                $a3_ch3 = 'true';
            }
            else if ($a11[$i] == "Other") {
                $a4_ch4 = 'true';
            }
            
        }

        $a12 = explode(',', $referral2->a2);
        $a2_count= count($a12);
        $a2_n = (int)$a2_count;

        $a2_ch1 = ' ';
        $a2_ch2 = ' ';
        $a2_ch3 = ' ';
        $a2_ch4 = ' ';


        for ($i=0; $i < $a2_n; $i++) { 
            if ($a12[$i] == "Glasses") {
                $a2_ch1 = 'true';
            }
            else if ($a12[$i] == "Hearing Aid") {
                $a2_ch2 = 'true';
            }
            else if ($a12[$i] == "Interpreter") {
                $a2_ch3 = 'true';
            }
            else if ($a12[$i] == "Other") {
                $a2_ch4 = 'true';
            }
            
        }

        $a13 = explode(',', $referral2->a3);
        $a3_count= count($a13);
        $a3_n = (int)$a3_count;

        $a3_ch1 = ' ';
        $a3_ch2 = ' ';
       


        for ($i=0; $i < $a3_n; $i++) { 
            if ($a13[$i] == "Dentures") {
                $a3_ch1 = 'true';
            }
            else if ($a13[$i] == "Continence aids") {
                $a3_ch2 = 'true';
            }
            
        }

        return view('referrals/show',compact('referral','referral2','drug','dose','freq','duration','last','num','ch1','ch2','ch3','ch4','ch5','ch6','ch7','ch8','ch9','ch10','a1_ch1','a2_ch2','a3_ch3','a4_ch4','a2_ch1','a2_ch2','a2_ch3','a2_ch4','a3_ch1','a3_ch2'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Referral::class);
        $referral = Referral::find($id);
        $referral2 = Referral2::where('client_id', '=', $referral->id)->firstOrFail();
        

        $drug = explode(',', $referral->medi_drugname);
        $drug = array_filter($drug, 'strlen');

        $dose = explode(',', $referral->medi_dose);   
        $freq = explode(',', $referral->medi_freq);
        $duration = explode(',', $referral->medi_duration);
        $last = explode(',', $referral->medi_lasttaken);
        $item_last= count($drug);
        $num = (int)$item_last;

        $behav = explode(',', $referral->behav_harm);
        $beh= count($behav);
        $n = (int)$beh;

        $ch1 = ' ';
        $ch2 = ' ';
        $ch3 = ' ';
        $ch4 = ' ';
        $ch5 = ' ';
        $ch6 = ' ';
        $ch7 = ' ';
        $ch8 = ' ';
        $ch9 = ' ';
        $ch10 = ' ';

        for ($i=0; $i < $n; $i++) { 
            if ($behav[$i] == "Smoking") {
                $ch1 = 'true';
            }
            else if ($behav[$i] == "Self-Motivation") {
                $ch2 = 'true';
            }
            else if ($behav[$i] == "Capacity for cooperation") {
                $ch3 = 'true';
            }
            else if ($behav[$i] == "Wandering") {
                $ch4 = 'true';
            }
            else if ($behav[$i] == "Capacity to share") {
                $ch5 = 'true';
            }
            else if ($behav[$i] == "Capacity to socialise") {
                $ch6 = 'true';
            }
            else if ($behav[$i] == "Verbal aggression") {
                $ch7 = 'true';
            }
            else if ($behav[$i] == "Drug/alcohol") {
                $ch8 = 'true';
            }
            else if ($behav[$i] == "Impulse control") {
                $ch9 = 'true';
            }
            else if ($behav[$i] == "Other") {
                $ch10 = 'true';
            }
        }

        $a11 = explode(',', $referral2->a1);
        $a1_count= count($a11);
        $a1_n = (int)$a1_count;

        $a1_ch1 = ' ';
        $a2_ch2 = ' ';
        $a3_ch3 = ' ';
        $a4_ch4 = ' ';


        for ($i=0; $i < $a1_n; $i++) { 
            if ($a11[$i] == "Stick") {
                $a1_ch1 = 'true';
            }
            else if ($a11[$i] == "Frame") {
                $a2_ch2 = 'true';
            }
            else if ($a11[$i] == "Wheelchair") {
                $a3_ch3 = 'true';
            }
            else if ($a11[$i] == "Other") {
                $a4_ch4 = 'true';
            }
            
        }

        $a12 = explode(',', $referral2->a2);
        $a2_count= count($a12);
        $a2_n = (int)$a2_count;

        $a2_ch1 = ' ';
        $a2_ch2 = ' ';
        $a2_ch3 = ' ';
        $a2_ch4 = ' ';


        for ($i=0; $i < $a2_n; $i++) { 
            if ($a12[$i] == "Glasses") {
                $a2_ch1 = 'true';
            }
            else if ($a12[$i] == "Hearing Aid") {
                $a2_ch2 = 'true';
            }
            else if ($a12[$i] == "Interpreter") {
                $a2_ch3 = 'true';
            }
            else if ($a12[$i] == "Other") {
                $a2_ch4 = 'true';
            }
            
        }

        $a13 = explode(',', $referral2->a3);
        $a3_count= count($a13);
        $a3_n = (int)$a3_count;

        $a3_ch1 = ' ';
        $a3_ch2 = ' ';
       


        for ($i=0; $i < $a3_n; $i++) { 
            if ($a13[$i] == "Dentures") {
                $a3_ch1 = 'true';
            }
            else if ($a13[$i] == "Continence aids") {
                $a3_ch2 = 'true';
            }
            
        }


        $residents = ClientDetail::where('status', '=', 'Active')->where('location_id', '=', Auth::user()->l_id)->orderBy('fname')->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('location_id', '=', Auth::user()->l_id)->get();
        return view('referrals/edit',compact('referral','residents','emps','referral2','drug','dose','freq','duration','last','num','ch1','ch2','ch3','ch4','ch5','ch6','ch7','ch8','ch9','ch10','a1_ch1','a2_ch2','a3_ch3','a4_ch4','a2_ch1','a2_ch2','a2_ch3','a2_ch4','a3_ch1','a3_ch2'));
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
        $this->authorize('update', Referral::class);
        $referral = Referral::find($id);

        $referral->con_name = request('con_name') ?? '';
        $referral->refer_name = request('refer_name') ?? '';
        $referral->r_date = request('r_date') ?? '';
        $referral->rep_name = request('rep_name') ?? '';
        $referral->relation = request('relation') ?? '';
        $referral->email = request('email') ?? '';
        $referral->ph = request('ph') ?? '';
        $referral->reason = request('reason') ?? '';
        $referral->appr_becoz = request('appr_becoz') ?? '';
        $referral->ref_date = request('ref_date') ?? '';
        $referral->ref_posi = request('ref_posi') ?? '';
        $referral->ref_agency = request('ref_agency') ?? '';
        $referral->ref_email = request('ref_email') ?? '';
        $referral->ref_ph = request('ref_ph') ?? '';

        $id = request('cfname') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;

        $referral->cfname = $name ?? '';
        $referral->client_id = $id ?? '';

        $referral->csurname = request('csurname') ?? '';  
        $referral->cdob = request('cdob') ?? '';
        $referral->cgender = request('cgender') ?? '';
        $referral->creligion = request('creligion') ?? '';
        $referral->cph = request('cph') ?? '';
        $referral->cemail = request('cemail') ?? '';
        $referral->caddress = request('caddress') ?? '';
        $referral->csrs_name = request('csrs_name') ?? '';
        $referral->csrs_ph = request('csrs_ph') ?? '';
        $referral->csrs_insu = request('csrs_insu') ?? '';
        $referral->csrs_refno = request('csrs_refno') ?? '';
        $referral->nok_name = request('nok_name') ?? '';
        $referral->nok_relation = request('nok_relation') ?? '';
        $referral->nok_address = request('nok_address') ?? '';
        $referral->nok_email = request('nok_email') ?? '';
        $referral->nok_ph = request('nok_ph') ?? '';
        $referral->gp_name = request('gp_name') ?? '';
        $referral->gp_address = request('gp_address') ?? '';
        $referral->gp_ph = request('gp_ph') ?? '';
        $referral->gp_fax = request('gp_fax') ?? '';
        $referral->gp_email = request('gp_email') ?? '';
        $referral->gua_refno = request('gua_refno') ?? '';
        $referral->gua_name = request('gua_name') ?? '';
        $referral->gua_addr = request('gua_addr') ?? '';
        $referral->gua_email = request('gua_email') ?? '';
        $referral->gua_ph = request('gua_ph') ?? '';
        $referral->ad_name = request('ad_name') ?? '';
        $referral->ad_refno = request('ad_refno') ?? '';
        $referral->ad_addr = request('ad_addr') ?? '';
        $referral->ad_email = request('ad_email') ?? '';
        $referral->ad_ph = request('ad_ph') ?? '';
        $referral->pen_type = request('pen_type') ?? '';
        $referral->pen_refno = request('pen_refno') ?? '';
        $referral->pen_medino = request('pen_medino') ?? '';
        $referral->pen_mediexp = request('pen_mediexp') ?? '';
        $referral->pen_taxi = request('pen_taxi') ?? '';
        $referral->pen_taxiexp = request('pen_taxiexp') ?? '';
        $referral->medi_drugname = implode(',', (array) request('medi_drugname')) ?? '';
        $referral->medi_dose = implode(',', (array) request('medi_dose')) ?? '';
        $referral->medi_freq = implode(',', (array) request('medi_freq')) ?? '';
        $referral->medi_duration = implode(',', (array) request('medi_duration')) ?? '';
        $referral->medi_lasttaken = implode(',', (array) request('medi_lasttaken')) ?? '';
        $referral->c_medi = request('c_medi') ?? '';
        $referral->c_ownmedi = request('c_ownmedi') ?? '';
        $referral->c_medisideeffect = request('c_medisideeffect') ?? '';
        $referral->ph_status = request('ph_status') ?? '';
        $referral->cogi_status = request('cogi_status') ?? '';
        $referral->dis_primary = request('dis_primary') ?? '';
        $referral->dis_casemngr = request('dis_casemngr') ?? '';
        $referral->dis_org = request('dis_org') ?? '';
        $referral->dis_email = request('dis_email') ?? '';
        $referral->dis_ph = request('dis_ph') ?? '';
        $referral->ment_status = request('ment_status') ?? '';
        $referral->ment_casemngr = request('ment_casemngr') ?? '';
        $referral->ment_org = request('ment_org') ?? '';
        $referral->ment_email = request('ment_email') ?? '';
        $referral->ment_ph = request('ment_ph') ?? '';
        $referral->behav_harm = implode(',', (array) request('behav_harm')) ?? '';
        $referral->behav_details = request('behav_details') ?? '';
        $referral->triger = request('triger') ?? '';
        $referral->user_id =  Auth::user()->id;
        $referral->company_id = Auth::user()->c_id  ?? '';
        $referral->location_id = Auth::user()->l_id  ?? '';
        
        $referral->save();

        $referral2 = Referral2::where('client_id', '=', $referral->id)->firstOrFail();
        $referral2->client_id = $referral->id ?? '';
        $referral2->med1 = request('med1') ?? '';
        $referral2->med1_det = request('med1_det') ?? '';
        $referral2->med2 = request('med2') ?? '';
        $referral2->med2_det = request('med2_det') ?? '';
        $referral2->med3 = request('med3') ?? '';
        $referral2->med3_det = request('med3_det') ?? '';
        $referral2->med4 = request('med4') ?? '';
        $referral2->med4_det = request('med4_det') ?? '';
        $referral2->med5 = request('med5') ?? '';
        $referral2->med5_det = request('med5_det') ?? '';
        $referral2->med6 = request('med6') ?? '';
        $referral2->med6_det = request('med6_det') ?? '';
        $referral2->med7 = request('med7') ?? '';
        $referral2->med7_det = request('med7_det') ?? '';
        $referral2->med8 = request('med8') ?? '';  
        $referral2->med8_det = request('med8_det') ?? '';
        $referral2->med9 = request('med9') ?? '';
        $referral2->med9_det = request('med9_det') ?? '';        
        $referral2->med10 = request('med10') ?? '';
        $referral2->med10_det = request('med10_det') ?? '';
        $referral2->med11 = request('med11') ?? '';
        $referral2->med11_det = request('med11_det') ?? '';
        $referral2->med12 = request('med12') ?? '';
        $referral2->med12_det = request('med12_det') ?? '';
        $referral2->med13 = request('med13') ?? '';
        $referral2->med13_det = request('med13_det') ?? '';
        $referral2->med14 = request('med14') ?? '';
        $referral2->med14_det = request('med14_det') ?? '';
        $referral2->med15 = request('med15') ?? '';
        $referral2->med15_det = request('med15_det') ?? '';
        $referral2->med16 = request('med16') ?? '';
        $referral2->med16_det = request('med16_det') ?? '';
        $referral2->med17 = request('med17') ?? '';
        $referral2->med17_det = request('med17_det') ?? '';
        $referral2->med18 = request('med18') ?? '';
        $referral2->med18_det = request('med18_det') ?? '';
        $referral2->p1 = request('p1') ?? '';
        $referral2->p2 = request('p2') ?? '';
        $referral2->p3 = request('p3') ?? '';
        $referral2->p4 = request('p4') ?? '';
        $referral2->p5 = request('p5') ?? '';
        $referral2->p6 = request('p6') ?? '';
        $referral2->p7 = request('p7') ?? '';
        $referral2->p8 = request('p8') ?? '';
        $referral2->p9 = request('p9') ?? '';
        $referral2->p10 = request('p10') ?? '';
        $referral2->a1 = implode(',', (array) request('a1')) ?? '';
        $referral2->a2 = implode(',', (array) request('a2')) ?? '';
        $referral2->a3 = implode(',', (array) request('a3')) ?? '';
        $referral2->a_comments = request('a_comments') ?? '';
        $referral2->public_trans = request('public_trans') ?? '';
        $referral2->app_keep = request('app_keep') ?? '';
        $referral2->social_activity = request('social_activity') ?? '';
        $referral2->hobbies = request('hobbies') ?? '';
        $referral2->case_name = request('case_name') ?? '';
        $referral2->case_org = request('case_org') ?? '';
        $referral2->case_email = request('case_email') ?? '';
        $referral2->case_ph = request('case_ph') ?? '';
        $referral2->case_addr = request('case_addr') ?? '';
        $referral2->serv_per = request('serv_per') ?? '';
        $referral2->serv_org = request('serv_org') ?? '';
        $referral2->serv_adr = request('serv_adr') ?? '';
        $referral2->serv_email = request('serv_email') ?? '';
        $referral2->serv_ph = request('serv_ph') ?? '';
        $referral2->addserv_per = request('addserv_per') ?? '';
        $referral2->addserv_org = request('addserv_org') ?? '';
        $referral2->addserv_adr = request('addserv_adr') ?? '';
        $referral2->addserv_email = request('addserv_email') ?? '';
        $referral2->addserv_ph = request('addserv_ph') ?? '';
        $referral2->other_relev = request('other_relev') ?? '';
        $referral2->rel_name = request('rel_name') ?? '';
        $referral2->rel_pos = request('rel_pos') ?? '';
        $referral2->rel_org = request('rel_org') ?? '';
        $referral2->rel_date = request('rel_date') ?? '';
        $referral2->user_id =  Auth::user()->id;
        $referral2->save();

        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Referral Report";
        $activity->save();

        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('referralDetails', $referral->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('referrals.index')
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
        $this->authorize('destroy', Referral::class);
        Referral::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Referral Report";
        $activity->save();
        return redirect()->route('referrals.index')
                        ->with('success','deleted successfully');
    }

       public function referral_generate(){
        $referals = Referral::where('location_id', '=', Auth::user()->l_id)->get() ?? '';  
        return view('referrals/report_show',compact('referals'));
    }

    public function generateReferralReport(){
      $res = request('res_name');
      $referral = Referral::where('client_id', '=', $res)->firstOrFail();
      $referral2 = Referral2::where('client_id', '=', $referral->id)->firstOrFail();

        $drug = explode(',', $referral->medi_drugname);
        $drug = array_filter($drug, 'strlen');

        $dose = explode(',', $referral->medi_dose);   
        $freq = explode(',', $referral->medi_freq);
        $duration = explode(',', $referral->medi_duration);
        $last = explode(',', $referral->medi_lasttaken);
          $item_last= count($drug);
        $num = (int)$item_last;

        $behav = explode(',', $referral->behav_harm);
        $beh= count($behav);
        $n = (int)$beh;

        $ch1 = ' ';
        $ch2 = ' ';
        $ch3 = ' ';
        $ch4 = ' ';
        $ch5 = ' ';
        $ch6 = ' ';
        $ch7 = ' ';
        $ch8 = ' ';
        $ch9 = ' ';
        $ch10 = ' ';

        for ($i=0; $i < $n; $i++) { 
            if ($behav[$i] == "Smoking") {
                $ch1 = 'true';
            }
            else if ($behav[$i] == "Self-Motivation") {
                $ch2 = 'true';
            }
            else if ($behav[$i] == "Capacity for cooperation") {
                $ch3 = 'true';
            }
            else if ($behav[$i] == "Wandering") {
                $ch4 = 'true';
            }
            else if ($behav[$i] == "Capacity to share") {
                $ch5 = 'true';
            }
            else if ($behav[$i] == "Capacity to socialise") {
                $ch6 = 'true';
            }
            else if ($behav[$i] == "Verbal aggression") {
                $ch7 = 'true';
            }
            else if ($behav[$i] == "Drug/alcohol") {
                $ch8 = 'true';
            }
            else if ($behav[$i] == "Impulse control") {
                $ch9 = 'true';
            }
            else if ($behav[$i] == "Other") {
                $ch10 = 'true';
            }
        }

        $a11 = explode(',', $referral2->a1);
        $a1_count= count($a11);
        $a1_n = (int)$a1_count;

        $a1_ch1 = ' ';
        $a2_ch2 = ' ';
        $a3_ch3 = ' ';
        $a4_ch4 = ' ';


        for ($i=0; $i < $a1_n; $i++) { 
            if ($a11[$i] == "Stick") {
                $a1_ch1 = 'true';
            }
            else if ($a11[$i] == "Frame") {
                $a2_ch2 = 'true';
            }
            else if ($a11[$i] == "Wheelchair") {
                $a3_ch3 = 'true';
            }
            else if ($a11[$i] == "Other") {
                $a4_ch4 = 'true';
            }
            
        }

        $a12 = explode(',', $referral2->a2);
        $a2_count= count($a12);
        $a2_n = (int)$a2_count;

        $a2_ch1 = ' ';
        $a2_ch2 = ' ';
        $a2_ch3 = ' ';
        $a2_ch4 = ' ';


        for ($i=0; $i < $a2_n; $i++) { 
            if ($a12[$i] == "Glasses") {
                $a2_ch1 = 'true';
            }
            else if ($a12[$i] == "Hearing Aid") {
                $a2_ch2 = 'true';
            }
            else if ($a12[$i] == "Interpreter") {
                $a2_ch3 = 'true';
            }
            else if ($a12[$i] == "Other") {
                $a2_ch4 = 'true';
            }
            
        }

        $a13 = explode(',', $referral2->a3);
        $a3_count= count($a13);
        $a3_n = (int)$a3_count;

        $a3_ch1 = ' ';
        $a3_ch2 = ' ';
       


        for ($i=0; $i < $a3_n; $i++) { 
            if ($a13[$i] == "Dentures") {
                $a3_ch1 = 'true';
            }
            else if ($a13[$i] == "Continence aids") {
                $a3_ch2 = 'true';
            }
            
        }

      return view('referrals/report',compact('referral','referral2','drug','dose','freq','duration','last','num','ch1','ch2','ch3','ch4','ch5','ch6','ch7','ch8','ch9','ch10','a1_ch1','a2_ch2','a3_ch3','a4_ch4','a2_ch1','a2_ch2','a2_ch3','a2_ch4','a3_ch1','a3_ch2'));
    }

}
