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
use App\Models\RoomDetail;
use App\Models\CompanyMaster;
use App\Models\TransferRecord;
use App\Models\Referral;
use App\Models\Referral2;
use App\Models\SupportPlan;
use App\Models\Incident;
use App\Models\Rsa;





use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ResidentUiController extends Controller
{
    /**
     * Returns a view that invokes the ajax tables which actually contains
     * the content for the accessories listing, which is generated in getDatatable.
     *
     * @since [v1.0]
     * @return View
     */
    public function index($id)
    {
        $r_id = $id;
        $client_detail = ClientDetail::find($id);
        $roomid = $client_detail->room_no;
        $bedno = $client_detail->bed_no;
        $r_no = RoomDetail::where('room_no', '=', $roomid)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();
        $rrid = $r_no->id;
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
        $status = "Free";
        $rooms = RoomDetail::where('status', '=', $status)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('residentui/index')->with(compact('client_detail', 'gpdetail', 'client_nextofkin', 'guardian_detail', 'health_service', 'pension_detail', 'income', 'rooms', 'rrid','r_id','bedno','emps'));
        
    }

    public function getRsa($id)
    {
        $r_id = $id;
        $head = "Resident Agreement";        
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();

        $checker = ResidentAgreement::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
        $resident_agreement = ResidentAgreement::where('client_id', '=', $id)->firstOrFail();
        $rsa_id = $resident_agreement->id;
        $rsa = Rsa::where('rsa_id', '=', $rsa_id)->firstOrFail();

        return view('residentui/rsa',compact('resident_agreement', 'residents', 'emps', 'r_id', 'rsa'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }
    
    public function getRoom($id)
    {
           $r_id = $id; 
           $head = "Condition Report";
            $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $companies = CompanyMaster::all();
            $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
            $checker = ConditionReport::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
          $condition_report = ConditionReport::where('client_id', '=', $id)->firstOrFail();
         $item_no = explode(',', $condition_report->item_no);
          $res_comments = explode(',', $condition_report->res_comments);
          $items = explode(',', $condition_report->items);
          $owned_by = explode(',', $condition_report->owned_by);
          $res_cond = explode(',', $condition_report->res_cond);
          $item_last= last($item_no);
          $num = (int)$item_last;
        return view('residentui/room_assets',compact('condition_report','residents','companies','emps','item_no', 'res_comments', 'items', 'owned_by', 'res_cond', 'num', 'r_id'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }

    public function getTransfer($id)
    {
        $r_id = $id; 
        $head = "Transfer Record";
        $checker = TransferRecord::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
        $transfer_record = TransferRecord::where('client_id', '=', $id)->firstOrFail();
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('residentui/transfer',compact('transfer_record','residents','r_id'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }
    public function getReferral($id)
    {
        $r_id = $id; 
        $head = "Referal Report";
        $checker = Referral::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
        
        $referral = Referral::where('client_id', '=', $id)->firstOrFail();
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

        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('residentui/referral',compact('referral','residents','emps','referral2','drug','dose','freq','duration','last','num','r_id','ch1','ch2','ch3','ch4','ch5','ch6','ch7','ch8','ch9','ch10','a1_ch1','a2_ch2','a3_ch3','a4_ch4','a2_ch1','a2_ch2','a2_ch3','a2_ch4','a3_ch1','a3_ch2'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }

    public function getPlans($id)
    {
        $r_id = $id;
        $head = "Support Plans";
        $checker = SupportPlan::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
        $support_plan = SupportPlan::where('client_id', '=', $id)->firstOrFail();
        $review = explode(',', $support_plan->review);
        $r_with = explode(',', $support_plan->r_with);
        $r_notes = explode(',', $support_plan->r_notes);
        $item_last= count($review);
        $num = (int)$item_last;
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';        

        return view('residentui/supportplans',compact('support_plan','residents','r_id','review','r_with','r_notes','num'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }

    public function getIncidents($id)
    {
        $r_id = $id;
        $head = "Incident Report";
        $checker = Incident::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
        $incident = Incident::where('client_id', '=', $id)->firstOrFail();
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';

        return view('residentui/incident',compact('incident','residents','r_id'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }

 }