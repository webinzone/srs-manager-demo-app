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
        $residents = ClientDetail::all();
        $emps = SrsStaff::all();
        $resident_agreement = ResidentAgreement::where('client_id', '=', $id)->firstOrFail();
        return view('residentui/rsa',compact('resident_agreement', 'residents', 'emps', 'r_id'));
    }
    
    public function getRoom($id)
    {
           $r_id = $id; 
            $residents = ClientDetail::all();
            $companies = CompanyMaster::all();
            $emps = SrsStaff::all();
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

    public function getTransfer($id)
    {
        $r_id = $id; 
        $transfer_record = TransferRecord::where('client_id', '=', $id)->firstOrFail();
        $residents = ClientDetail::all();
        return view('residentui/transfer',compact('transfer_record','residents','r_id'));
    }
 }