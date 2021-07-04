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
        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
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
        $name = $res->fname.". ".$data->mname.". ".$data->lname;
        $data = ConditionReport::where('res_name', '=', $name)->firstOrFail();
        return response()->json($data);     
    }
      
    public function getRSAbookDetails($id){
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname.". ".$data->mname.". ".$data->lname;
        $data = Booking::where('c_name', '=', $name)->firstOrFail();
        return response()->json($data);     

    }

    public function generateRSAReport()
    {
      $res = request('res_name');
      $resident_agreement = ResidentAgreement::where('r_name', '=', $res)->firstOrFail();
      return view('resident_agreements/report',compact('resident_agreement'));
     
    }

   public function agreement_generate()
   {
      $agreements = ResidentAgreement::all();     
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
        $name = $res->fname.". ".$res->mname.". ".$res->lname;
        $resident_agreement->r_name = $name;
        $resident_agreement->room_no = request('room_no');
        $resident_agreement->bed = "null";
        $resident_agreement->dob = "null";
        $resident_agreement->guardian = request('guardian');
        $resident_agreement->admin = "null";
        $resident_agreement->p_nomini = request('p_nomini');
        $resident_agreement->i_period = request('i_period');
        $resident_agreement->f_period = request('f_period');
        $resident_agreement->ending_on = request('ending_on');
        $resident_agreement->acc_fee = request('acc_fee');
        $resident_agreement->pay_method = implode(',', (array) request('pay_method'));
        $resident_agreement->freq_pay = implode(',', (array) request('freq_pay'));
        $resident_agreement->advnc_fee = request('advnc_fee');
        $resident_agreement->adv_fee = "";
        $resident_agreement->secu_depo = request('secu_depo');
        $resident_agreement->reserv_fee = request('reserv_fee');
        $resident_agreement->condition_rep = request('condition_rep');
        $resident_agreement->res_service = "null";
        $resident_agreement->spl_item = "null";
        $resident_agreement->pers_prop = request('pers_prop');
        $resident_agreement->res_gp = request('res_gp');
        $resident_agreement->asistance_status = request('asistance_status');
        $resident_agreement->staff = request('staff');
        $resident_agreement->g_tel = request('g_tel');
        $resident_agreement->g_adress = request('g_adress');
        $resident_agreement->g_email = request('g_email');
        $resident_agreement->per_tel = request('per_tel');
        $resident_agreement->per_address = request('per_address');
        $resident_agreement->per_email = request('per_email');
        $resident_agreement->emg_contact = request('emg_contact');
        $resident_agreement->emg_tel = request('emg_tel');
        $resident_agreement->emg_address = request('emg_address');
        $resident_agreement->emg_email = request('emg_email');
        $resident_agreement->amt_fee = request('amt_fee');
        $resident_agreement->any_rent_adv = implode(',', (array) request('any_rent_adv'));
        $resident_agreement->est_fee = request('est_fee');
        $resident_agreement->refund = request('refund');
        $resident_agreement->srs_assist_status = request('srs_assist_status');
        $resident_agreement->assist_amnt = request('assist_amnt');
        $resident_agreement->location_id = "null";
        $resident_agreement->company_id = "null";

        $resident_agreement->amt_pay = request('amt_pay');
        $resident_agreement->amt_res = request('amt_res');
        $resident_agreement->amt_est = request('amt_est');
        $resident_agreement->amt_adv = request('amt_adv');

        $resident_agreement->user_id =  Auth::user()->id;
       // $resident_agreement->profile_pic = request('profile_pic')->getClientOriginalName();
        //$imageName = request('profile_pic')->getClientOriginalName();
        //request()->profile_pic->move(public_path('images/profile_pics'), $imageName);  

        
        $resident_agreement->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Resident Agreement Report";
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
        return view('resident_agreements/show',compact('resident_agreement'));
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
        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
        $resident_agreement = ResidentAgreement::find($id);
        return view('resident_agreements/edit',compact('resident_agreement', 'residents', 'emps'));
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
        $name = $res->fname.". ".$res->mname.". ".$res->lname;
        $resident_agreement->r_name = $name;
        $resident_agreement->room_no = request('room_no');
        $resident_agreement->bed = "null";
        $resident_agreement->dob = "null";
        $resident_agreement->guardian = request('guardian');
        $resident_agreement->admin = "null";
        $resident_agreement->p_nomini = request('p_nomini');
        $resident_agreement->i_period = request('i_period');
        $resident_agreement->f_period = request('f_period');
        $resident_agreement->ending_on = request('ending_on');
        $resident_agreement->acc_fee = request('acc_fee');
        $resident_agreement->pay_method = implode(',', (array) request('pay_method'));
        $resident_agreement->freq_pay = implode(',', (array) request('freq_pay'));
        $resident_agreement->advnc_fee = request('advnc_fee');
        $resident_agreement->adv_fee = "";
        $resident_agreement->secu_depo = request('secu_depo');
        $resident_agreement->reserv_fee = request('reserv_fee');
        $resident_agreement->condition_rep = request('condition_rep');
        $resident_agreement->res_service = "null";
        $resident_agreement->spl_item = "null";
        $resident_agreement->pers_prop = request('pers_prop');
        $resident_agreement->res_gp = request('res_gp');
        $resident_agreement->asistance_status = request('asistance_status');
        $resident_agreement->staff = request('staff');
        $resident_agreement->g_tel = request('g_tel');
        $resident_agreement->g_adress = request('g_adress');
        $resident_agreement->g_email = request('g_email');
        $resident_agreement->per_tel = request('per_tel');
        $resident_agreement->per_address = request('per_address');
        $resident_agreement->per_email = request('per_email');
        $resident_agreement->emg_contact = request('emg_contact');
        $resident_agreement->emg_tel = request('emg_tel');
        $resident_agreement->emg_address = request('emg_address');
        $resident_agreement->emg_email = request('emg_email');
        $resident_agreement->amt_fee = request('amt_fee');
        $resident_agreement->any_rent_adv = implode(',', (array) request('any_rent_adv'));
        $resident_agreement->est_fee = request('est_fee');
        $resident_agreement->refund = request('refund');
        $resident_agreement->srs_assist_status = request('srs_assist_status');
        $resident_agreement->assist_amnt = request('assist_amnt');
        $resident_agreement->location_id = "null";
        $resident_agreement->company_id = "null";

        $resident_agreement->amt_pay = request('amt_pay');
        $resident_agreement->amt_res = request('amt_res');
        $resident_agreement->amt_est = request('amt_est');
        $resident_agreement->amt_adv = request('amt_adv');
        $resident_agreement->user_id =  Auth::user()->id;
        
        $resident_agreement->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Resident Agreement Report";
        $activity->save();

        return redirect()->route('resident_agreements.index')
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
        $this->authorize('destroy', ResidentAgreement::class);
        ResidentAgreement::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Resident Agreement Report";
        $activity->save();
        return redirect()->route('resident_agreements.index')
                        ->with('success','deleted successfully');
    }

}
