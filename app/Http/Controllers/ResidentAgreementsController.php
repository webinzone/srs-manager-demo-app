<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\ResidentAgreement;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\ConditionReport;
use App\Models\SrsStaff;
use App\Models\GuardianDetail;
use App\Models\Booking;
use App\Models\PensionDetail;
use App\Models\HealthService;
use App\Models\ClientGpdetail;
use App\Models\ClientNextofkin;
use App\Models\LocationMaster;
use App\Models\Rsa;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ResidentAgreementsController extends Controller
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
        $this->authorize('view', ResidentAgreement::class);
        $resident_agreements = ResidentAgreement::all();

        return view('resident_agreements/index',compact('resident_agreements'));
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
        $this->authorize('create',ResidentAgreement::class);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('resident_agreements/create',compact('residents', 'emps'));
    }

    //public function getRSADetails($id){
         //$data = ClientDetail::where('id', '=', $id)->firstOrFail();
         //$guardian = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
         //$name = $data->fname.". ".$data->mname.". ".$data->lname;
         //$staff = ConditionReport::where('res_name', '=', $name)->firstOrFail();
         //$books = Booking::where('c_name', '=', $name)->firstOrFail();
         //return response()->json(['data' => $data, 'staff' => $staff, 'guardian' => $guardian, 'books'// => $books]);
//
    //}

    public function getRSADetails($id){
         $data = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);      

    }

    public function getRSAclientDetails($id)
    {
        $data = ClientDetail::where('id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
    
    public function getRSAstaffDetails($id)
    {
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $data = ConditionReport::where('res_name', '=', $name)->firstOrFail();
        return response()->json($data);     
    }
      
    public function getRSAbookDetails($id){
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $data = Booking::where('c_name', '=', $name)->firstOrFail();
        return response()->json($data);     

    }

    public function getRSAincomeDetails($id)
    {
        $data = PensionDetail::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
    public function getHealthDetails($id)
    {
        $data = HealthService::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
    public function getGPDetails($id)
    {
        $data = ClientGpdetail::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
    public function getNokDetails($id)
    {
        $data = ClientNextofkin::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
    public function getGuaDetails($id)
    {
        $data = GuardianDetail::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
   
    public function getNominiDetails($id)
    {
        $data = ResidentAgreement::where('client_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }

    public function generateRSAReport()
    {
      $res = request('res_name');
      $resident_agreement = ResidentAgreement::where('client_id', '=', $res)->firstOrFail();
      $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
      $id = $resident_agreement->id;
      $rsa = Rsa::where('rsa_id', '=', $id)->firstOrFail();
      $client = ClientDetail::where('id', '=', $res)->firstOrFail();
      return view('resident_agreements/report',compact('resident_agreement','locations','rsa','client'));
     
    }

   public function agreement_generate()
   {
      $agreements = ResidentAgreement::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';   
      return view('resident_agreements/report_show',compact('agreements'));

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
        $this->authorize('create',ResidentAgreement::class);
        $resident_agreement = new ResidentAgreement();
        $id = request('r_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $status = $res->respite;
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $resident_agreement->r_name = $name;
        $resident_agreement->client_id = $id;
        $resident_agreement->room_no = request('room_no') ?? '';
        $resident_agreement->bed = "" ?? '';
        $resident_agreement->dob = "" ?? '';
        $resident_agreement->guardian = request('guardian') ?? '';
        $resident_agreement->admin = $status ?? '';
        $resident_agreement->p_nomini = request('p_nomini') ?? '';
        $resident_agreement->i_period = request('i_period') ?? '';
        $resident_agreement->f_period = request('f_period') ?? '';
        $resident_agreement->ending_on = request('ending_on') ?? '';
        $resident_agreement->acc_fee = request('acc_fee') ?? '';
        $resident_agreement->freq_pay = request('freq_pay') ?? '';
        $resident_agreement->advnc_fee = request('advnc_fee') ?? '';
        $resident_agreement->pay_method = request('pay_method') ?? '';
        $resident_agreement->adv_fee = request('adm_date') ?? '';
        $resident_agreement->secu_depo = request('secu_depo') ?? '';
        $resident_agreement->reserv_fee = request('reserv_fee') ?? '';
        $resident_agreement->condition_rep = request('condition_rep') ?? '';
        $resident_agreement->res_service = "" ?? '';
        $resident_agreement->spl_item = "" ?? '';
        $resident_agreement->pers_prop = request('pers_prop') ?? '';
        $resident_agreement->res_gp = request('res_gp') ?? '';
        $resident_agreement->asistance_status = request('asistance_status') ?? '';
        $resident_agreement->staff = request('staff') ?? '';
        $resident_agreement->g_tel = request('g_tel') ?? '';
        $resident_agreement->g_adress = request('g_adress') ?? '';
        $resident_agreement->g_email = request('g_email') ?? '';
        $resident_agreement->per_tel = request('per_tel') ?? '';
        $resident_agreement->per_address = request('per_address') ?? '';
        $resident_agreement->per_email = request('per_email') ?? '';
        $resident_agreement->emg_contact = request('emg_contact') ?? '';
        $resident_agreement->emg_tel = request('emg_tel') ?? '';
        $resident_agreement->emg_address = request('emg_address') ?? '';
        $resident_agreement->emg_email = request('emg_email') ?? '';
        $resident_agreement->amt_fee = request('amt_fee') ?? '';
        $resident_agreement->any_rent_adv = request('any_rent_adv') ?? '';
        $resident_agreement->est_fee = request('est_fee') ?? '';
        $resident_agreement->refund = request('refund') ?? '';
        $resident_agreement->srs_assist_status = request('srs_assist_status') ?? '';
        $resident_agreement->assist_amnt = request('assist_amnt') ?? '';
        $resident_agreement->location_id = Auth::user()->l_id  ?? '';
        $resident_agreement->company_id = Auth::user()->c_id  ?? '';

        $resident_agreement->amt_pay = request('amt_pay') ?? '';
        $resident_agreement->amt_res = request('amt_res') ?? '';
        $resident_agreement->amt_est = request('amt_est') ?? '';
        $resident_agreement->amt_adv = request('amt_adv') ?? '';

        $resident_agreement->bath = request('bath') ?? '';
        $resident_agreement->bath_fee = request('bath_fee') ?? '';
        $resident_agreement->oral = request('oral') ?? '';
        $resident_agreement->oral_fee = request('oral_fee') ?? '';
        $resident_agreement->hair = request('hair') ?? '';
        $resident_agreement->hair_fee = request('hair_fee') ?? '';
        $resident_agreement->toileting = request('toileting') ?? '';
        $resident_agreement->toileting_fee = request('toileting_fee') ?? '';
        $resident_agreement->mobility = request('mobility') ?? '';
        $resident_agreement->mobility_fee = request('mobility_fee') ?? '';
        $resident_agreement->medi_assi = request('medi_assi') ?? '';
        $resident_agreement->medi_assi_fee = request('medi_assi_fee') ?? '';
        $resident_agreement->continence = request('continence') ?? '';
        $resident_agreement->continence_fee = request('continence_fee') ?? '';
        $resident_agreement->bed_make = request('bed_make') ?? '';
        $resident_agreement->bed_make_fee = request('bed_make_fee') ?? '';
        $resident_agreement->dressing = request('dressing') ?? '';
        $resident_agreement->dressing_fee = request('dressing_fee') ?? '';  
        $resident_agreement->adm_name = request('adm_name') ?? '';
        $resident_agreement->adm_ph = request('adm_ph') ?? '';
        $resident_agreement->adm_em = request('adm_em') ?? '';
        $resident_agreement->adm_adr = request('adm_adr') ?? '';
        $resident_agreement->nok_det = request('nok_det') ?? '';
        $resident_agreement->st_typ = request('st_typ') ?? '';
        $resident_agreement->crn_no = request('crn_no') ?? '';
        $resident_agreement->oth_dt = request('oth_dt') ?? '';
        $resident_agreement->typ_sup = request('typ_sup') ?? '';
        $resident_agreement->pr_name = request('pr_name') ?? '';
        $resident_agreement->pr_wit = request('pr_wit') ?? '';
        $resident_agreement->pr_date = request('pr_date') ?? '';     



        $resident_agreement->user_id =  Auth::user()->id;
       // $resident_agreement->profile_pic = request('profile_pic')->getClientOriginalName();
        //$imageName = request('profile_pic')->getClientOriginalName();
        //request()->profile_pic->move(public_path('images/profile_pics'), $imageName);  

        
        $resident_agreement->save();

        $r_idd = $resident_agreement->id;
        $rsa = new Rsa();
        $rsa->rsa_id = $r_idd;
        $rsa->re_name = request('re_name') ?? '';
        $rsa->re_wt = request('re_wt') ?? '';
        $rsa->re_date = request('re_date') ?? '';
        $rsa->week_pay = request('week_pay') ?? '';
        $rsa->sty_perd = request('sty_perd') ?? '';
        $rsa->nomini = request('nomini') ?? '';
        $rsa->st_dt = request('st_dt') ?? '';
        $rsa->ed_dt = request('ed_dt') ?? '';
        $rsa->not_acc = request('not_acc') ?? '';
        $rsa->condi = request('condi') ?? '';
        $rsa->bednoo = request('bednoo') ?? '';
        $rsa->room_cl = request('room_cl') ?? '';
        $rsa->room_det = request('room_det') ?? '';
        $rsa->tr_assi = request('tr_assi') ?? '';
        $rsa->tr_det = request('tr_det') ?? '';
        $rsa->eating = request('eating') ?? '';
        $rsa->eat_det = request('eat_det') ?? '';
        $rsa->laundry = request('laundry') ?? '';
        $rsa->laundry_det = request('laundry_det') ?? '';
        $rsa->other = request('other') ?? '';
        $rsa->other_det = request('other_det') ?? '';
        $rsa->st_sdt = request('st_sdt') ?? '';
        $rsa->st_edt = request('st_edt') ?? '';
        
       // $rsa->profile_pic = request('profile_pic')->getClientOriginalName();
        //$imageName = request('profile_pic')->getClientOriginalName();
        //request()->profile_pic->move(public_path('images/profile_pics'), $imageName);  

        
        $rsa->save();



      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Resident Agreement Report";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
      $activity->save();

      return redirect()->route('resident_agreements.index')
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
        $this->authorize('show',ResidentAgreement::class);
        $resident_agreement = ResidentAgreement::find($id);
        $res = $resident_agreement->client_id;
        $rsa = Rsa::where('rsa_id', '=', $id)->firstOrFail();
        $client = ClientDetail::where('id', '=', $res)->firstOrFail();
        return view('resident_agreements/show',compact('resident_agreement', 'rsa', 'client'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',ResidentAgreement::class);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $resident_agreement = ResidentAgreement::find($id);
        $rsa = Rsa::where('rsa_id', '=', $id)->firstOrFail();
        return view('resident_agreements/edit',compact('resident_agreement', 'residents', 'emps', 'rsa'));
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
        $this->authorize('update', ResidentAgreement::class);
        $resident_agreement = ResidentAgreement::find($id);

        $id = request('r_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $status = $res->respite;
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $resident_agreement->r_name = $name;
        $resident_agreement->client_id = $id;
        $resident_agreement->room_no = request('room_no') ?? '';
        $resident_agreement->bed = "" ?? '';
        $resident_agreement->dob = "" ?? '';
        $resident_agreement->guardian = request('guardian') ?? '';
        $resident_agreement->admin = $status ?? '';
        $resident_agreement->p_nomini = request('p_nomini') ?? '';
        $resident_agreement->i_period = request('i_period') ?? '';
        $resident_agreement->f_period = request('f_period') ?? '';
        $resident_agreement->ending_on = request('ending_on') ?? '';
        $resident_agreement->acc_fee = request('acc_fee') ?? '';
        $resident_agreement->pay_method = request('pay_method') ?? '';
        $resident_agreement->freq_pay = request('freq_pay') ?? '';
        $resident_agreement->advnc_fee = request('advnc_fee') ?? '';
        $resident_agreement->adv_fee = request('adm_date') ?? '';
        $resident_agreement->secu_depo = request('secu_depo') ?? '';
        $resident_agreement->reserv_fee = request('reserv_fee') ?? '';
        $resident_agreement->condition_rep = request('condition_rep') ?? '';
        $resident_agreement->res_service = "" ?? '';
        $resident_agreement->spl_item = "" ?? '';
        $resident_agreement->pers_prop = request('pers_prop') ?? '';
        $resident_agreement->res_gp = request('res_gp') ?? '';
        $resident_agreement->asistance_status = request('asistance_status') ?? '';
        $resident_agreement->staff = request('staff') ?? '';
        $resident_agreement->g_tel = request('g_tel') ?? '';
        $resident_agreement->g_adress = request('g_adress') ?? '';
        $resident_agreement->g_email = request('g_email') ?? '';
        $resident_agreement->per_tel = request('per_tel') ?? '';
        $resident_agreement->per_address = request('per_address') ?? '';
        $resident_agreement->per_email = request('per_email') ?? '';
        $resident_agreement->emg_contact = request('emg_contact') ?? '';
        $resident_agreement->emg_tel = request('emg_tel') ?? '';
        $resident_agreement->emg_address = request('emg_address') ?? '';
        $resident_agreement->emg_email = request('emg_email') ?? '';
        $resident_agreement->amt_fee = request('amt_fee') ?? '';
        $resident_agreement->any_rent_adv = request('any_rent_adv') ?? '';
        $resident_agreement->est_fee = request('est_fee') ?? '';
        $resident_agreement->refund = request('refund') ?? '';
        $resident_agreement->srs_assist_status = request('srs_assist_status') ?? '';
        $resident_agreement->assist_amnt = request('assist_amnt') ?? '';
        $resident_agreement->location_id = Auth::user()->l_id  ?? '';
        $resident_agreement->company_id = Auth::user()->c_id  ?? '';
        
        $resident_agreement->bath = request('bath') ?? '';
        $resident_agreement->bath_fee = request('bath_fee') ?? '';
        $resident_agreement->oral = request('oral') ?? '';
        $resident_agreement->oral_fee = request('oral_fee') ?? '';
        $resident_agreement->hair = request('hair') ?? '';
        $resident_agreement->hair_fee = request('hair_fee') ?? '';
        $resident_agreement->toileting = request('toileting') ?? '';
        $resident_agreement->toileting_fee = request('toileting_fee') ?? '';
        $resident_agreement->mobility = request('mobility') ?? '';
        $resident_agreement->mobility_fee = request('mobility_fee') ?? '';
        $resident_agreement->medi_assi = request('medi_assi') ?? '';
        $resident_agreement->medi_assi_fee = request('medi_assi_fee') ?? '';
        $resident_agreement->continence = request('continence') ?? '';
        $resident_agreement->continence_fee = request('continence_fee') ?? '';
        $resident_agreement->bed_make = request('bed_make') ?? '';
        $resident_agreement->bed_make_fee = request('bed_make_fee') ?? '';
        $resident_agreement->dressing = request('dressing') ?? '';
        $resident_agreement->dressing_fee = request('dressing_fee') ?? '';
        $resident_agreement->adm_name = request('adm_name') ?? '';
        $resident_agreement->adm_ph = request('adm_ph') ?? '';
        $resident_agreement->adm_em = request('adm_em') ?? '';
        $resident_agreement->adm_adr = request('adm_adr') ?? '';
        $resident_agreement->nok_det = request('nok_det') ?? '';
        $resident_agreement->st_typ = request('st_typ') ?? '';
        $resident_agreement->crn_no = request('crn_no') ?? '';
        $resident_agreement->oth_dt = request('oth_dt') ?? '';
        $resident_agreement->typ_sup = request('typ_sup') ?? '';
        $resident_agreement->pr_name = request('pr_name') ?? '';
        $resident_agreement->pr_wit = request('pr_wit') ?? '';
        $resident_agreement->pr_date = request('pr_date') ?? ''; 

        $resident_agreement->amt_pay = request('amt_pay') ?? '';
        $resident_agreement->amt_res = request('amt_res') ?? '';
        $resident_agreement->amt_est = request('amt_est') ?? '';
        $resident_agreement->amt_adv = request('amt_adv') ?? '';
        $resident_agreement->user_id =  Auth::user()->id;
        
        $resident_agreement->save();
        
        $r_idd = $resident_agreement->id;  

        $rsa = Rsa::where('rsa_id', '=', $r_idd)->firstOrFail();
        $rsa->rsa_id = $r_idd;
        $rsa->re_name = request('re_name') ?? '';
        $rsa->re_wt = request('re_wt') ?? '';
        $rsa->re_date = request('re_date') ?? '';
        $rsa->week_pay = request('week_pay') ?? '';
        $rsa->sty_perd = request('sty_perd') ?? '';
        $rsa->nomini = request('nomini') ?? '';
        $rsa->st_dt = request('st_dt') ?? '';
        $rsa->ed_dt = request('ed_dt') ?? '';
        $rsa->not_acc = request('not_acc') ?? '';
        $rsa->condi = request('condi') ?? '';
        $rsa->bednoo = request('bednoo') ?? '';
        $rsa->room_cl = request('room_cl') ?? '';
        $rsa->room_det = request('room_det') ?? '';
        $rsa->tr_assi = request('tr_assi') ?? '';
        $rsa->tr_det = request('tr_det') ?? '';
        $rsa->eating = request('eating') ?? '';
        $rsa->eat_det = request('eat_det') ?? '';
        $rsa->laundry = request('laundry') ?? '';
        $rsa->laundry_det = request('laundry_det') ?? '';
        $rsa->other = request('other') ?? '';
        $rsa->other_det = request('other_det') ?? '';
        $rsa->st_sdt = request('st_sdt') ?? '';
        $rsa->st_edt = request('st_edt') ?? '';
        
        
        $rsa->save();

        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Resident Agreement Report";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('rsaDetails', $resident_agreement->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('resident_agreements.index')
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
        $this->authorize('destroy', ResidentAgreement::class);
        Rsa::where('rsa_id', '=', $id)->delete();

        ResidentAgreement::destroy($id);

        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Resident Agreement Report";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('resident_agreements.index')
                        ->with('success','deleted successfully');
    }

}