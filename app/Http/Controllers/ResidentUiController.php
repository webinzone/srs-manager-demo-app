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
        $r_no = RoomDetail::where('room_no', '=', $roomid)->firstOrFail();
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
        $rooms = RoomDetail::where('status', '=', $status)->get();
        return view('residentui/index')->with(compact('client_detail', 'gpdetail', 'client_nextofkin', 'guardian_detail', 'health_service', 'pension_detail', 'income', 'rooms', 'rrid','r_id'));
        
    }

    public function getRsa($id)
    {
        $r_id = $id;
        $head = "Resident Agreement";        
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';
        $emps = SrsStaff::orderBy('name')->get();
        $checker = ResidentAgreement::select('client_id')->where('client_id', '=', $id)->exists();
        if($checker == true){
        $resident_agreement = ResidentAgreement::where('client_id', '=', $id)->firstOrFail();
        return view('residentui/rsa',compact('resident_agreement', 'residents', 'emps', 'r_id'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }
    
    public function getRoom($id)
    {
           $r_id = $id; 
           $head = "Condition Report";
            $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';
            $companies = CompanyMaster::all();
            $emps = SrsStaff::orderBy('name')->get();
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
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';
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

        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';
        $emps = SrsStaff::orderBy('name')->get();
        return view('residentui/referral',compact('referral','residents','emps','referral2','drug','dose','freq','duration','last','num','r_id'));
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
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';        

        return view('residentui/supportplans',compact('support_plan','residents','r_id'));
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
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->get() ?? '';

        return view('residentui/incident',compact('incident','residents','r_id'));
        }
        else{
            return view('residentui/nodata',compact('r_id','head'));
        }
    }

 }