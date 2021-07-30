<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\TransferRecord;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\RoomDetail;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class TransferRecordsController extends Controller
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
        $this->authorize('view', TransferRecord::class);
        return view('transfer_records/index');
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
        $this->authorize('create',TransferRecord::class);
        $residents = ClientDetail::all();
        return view('transfer_records/create',compact('residents'));
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
        $this->authorize('create',TransferRecord::class);
        $transfer_record = new TransferRecord();
        $id = request('user_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $rroom = $res->room_no;
        
        $transfer_record->user_name = $name;
        $transfer_record->client_id = $id;
        $transfer_record->dob = request('dob') ?? '';
        $transfer_record->gender = request('gender') ?? '';
        $transfer_record->nation = request('nation') ?? '';
        $transfer_record->lan = request('lan') ?? '';
        $transfer_record->religion = request('religion') ?? '';
        $transfer_record->medi_no = request('medi_no') ?? '';
        $transfer_record->pension_no = request('pension_no') ?? '';
        $transfer_record->chemist = request('chemist') ?? '';
        $transfer_record->date = request('date') ?? '';
        $transfer_record->from = request('from') ?? '';
        $transfer_record->address = request('address') ?? '';
        $transfer_record->ph = request('ph') ?? '';
        $transfer_record->fax = request('fax') ?? '';
        $transfer_record->to = request('to') ?? '';
        $transfer_record->reason = request('reason') ?? '';  
        $transfer_record->medi_chart = request('medi_chart') ?? '';
        $transfer_record->medi_list = request('medi_list') ?? '';
        $transfer_record->webst = request('webst') ?? '';
        $transfer_record->medi_sent = request('medi_sent') ?? '';
        $transfer_record->last_time_medi = request('last_time_medi') ?? '';
        $transfer_record->accomp_rpt = request('accomp_rpt') ?? '';
        $transfer_record->next = request('next') ?? '';
        $transfer_record->advised = request('advised') ?? '';
        $transfer_record->guardian = request('guardian') ?? '';
        $transfer_record->guardian_adv = request('guardian_adv') ?? '';
        $transfer_record->case_mngr = request('case_mngr') ?? '';
        $transfer_record->case_mngr_adv = request('case_mngr_adv') ?? '';
        $transfer_record->nomini = request('nomini') ?? '';
        $transfer_record->nomini_adv = request('nomini_adv') ?? '';
        $transfer_record->admin = request('admin') ?? '';
        $transfer_record->admin_adv = request('admin_adv') ?? '';
        $transfer_record->notif = request('notif') ?? '';
        $transfer_record->nok_contact = request('nok_contact') ?? '';
        $transfer_record->gua_contact = request('gua_contact') ?? '';
        $transfer_record->resadmin_contact = request('resadmin_contact') ?? '';
        $transfer_record->nomini_contact = request('nomini_contact') ?? '';
        $transfer_record->doc_name = request('doc_name') ?? '';
        $transfer_record->doc_ph = request('doc_ph') ?? '';
        $transfer_record->doc_fax = request('doc_fax') ?? '';
        $transfer_record->doc_other = request('doc_other') ?? '';
        $transfer_record->allergy = request('allergy') ?? '';
        $transfer_record->exis_medi = request('exis_medi') ?? '';
        $transfer_record->sum_req = request('sum_req') ?? '';
        $transfer_record->other_relevent = request('other_relevent') ?? '';
        $transfer_record->staff_incharge = request('staff_incharge') ?? '';
        $transfer_record->user_id =  Auth::user()->id;
        
        $transfer_record->save();

        $roomdetails = RoomDetail::where('room_no', '=', $rroom)->firstOrFail();
        $roomdetails->status = "Free";
      
        $roomdetails->save();

        $ress = ClientDetail::where('id', '=', $id)->firstOrFail();
        $ress->status = "Transfer";
        $ress->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Transfer Report";
      $activity->save();

      return redirect()->route('transfer_records.index')
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
        $this->authorize('show',TransferRecord::class);
        $transfer_record = TransferRecord::find($id);
        return view('transfer_records/show',compact('transfer_record'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',TransferRecord::class);
        $transfer_record = TransferRecord::find($id);
        $residents = ClientDetail::all();
        return view('transfer_records/edit',compact('transfer_record','residents'));
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
        $this->authorize('update', TransferRecord::class);
        $transfer_record = TransferRecord::find($id);

        $id = request('user_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $rroom = $res->room_no;
        
        $transfer_record->user_name = $name;
        $transfer_record->client_id = $id;
        $transfer_record->dob = request('dob') ?? '';
        $transfer_record->gender = request('gender') ?? '';
        $transfer_record->nation = request('nation') ?? '';
        $transfer_record->lan = request('lan') ?? '';
        $transfer_record->religion = request('religion') ?? '';
        $transfer_record->medi_no = request('medi_no') ?? '';
        $transfer_record->pension_no = request('pension_no') ?? '';
        $transfer_record->chemist = request('chemist') ?? '';
        $transfer_record->date = request('date') ?? '';
        $transfer_record->from = request('from') ?? '';
        $transfer_record->address = request('address') ?? '';
        $transfer_record->ph = request('ph') ?? '';
        $transfer_record->fax = request('fax') ?? '';
        $transfer_record->to = request('to') ?? '';
        $transfer_record->reason = request('reason') ?? '';  
        $transfer_record->medi_chart = request('medi_chart') ?? '';
        $transfer_record->medi_list = request('medi_list') ?? '';
        $transfer_record->webst = request('webst') ?? '';
        $transfer_record->medi_sent = request('medi_sent') ?? '';
        $transfer_record->last_time_medi = request('last_time_medi') ?? '';
        $transfer_record->accomp_rpt = request('accomp_rpt') ?? '';
        $transfer_record->next = request('next') ?? '';
        $transfer_record->advised = request('advised') ?? '';
        $transfer_record->guardian = request('guardian') ?? '';
        $transfer_record->guardian_adv = request('guardian_adv') ?? '';
        $transfer_record->case_mngr = request('case_mngr') ?? '';
        $transfer_record->case_mngr_adv = request('case_mngr_adv') ?? '';
        $transfer_record->nomini = request('nomini') ?? '';
        $transfer_record->nomini_adv = request('nomini_adv') ?? '';
        $transfer_record->admin = request('admin') ?? '';
        $transfer_record->admin_adv = request('admin_adv') ?? '';
        $transfer_record->notif = request('notif') ?? '';
        $transfer_record->nok_contact = request('nok_contact') ?? '';
        $transfer_record->gua_contact = request('gua_contact') ?? '';
        $transfer_record->resadmin_contact = request('resadmin_contact') ?? '';
        $transfer_record->nomini_contact = request('nomini_contact') ?? '';
        $transfer_record->doc_name = request('doc_name') ?? '';
        $transfer_record->doc_ph = request('doc_ph') ?? '';
        $transfer_record->doc_fax = request('doc_fax') ?? '';
        $transfer_record->doc_other = request('doc_other') ?? '';
        $transfer_record->allergy = request('allergy') ?? '';
        $transfer_record->exis_medi = request('exis_medi') ?? '';
        $transfer_record->sum_req = request('sum_req') ?? '';
        $transfer_record->other_relevent = request('other_relevent') ?? '';
        $transfer_record->staff_incharge = request('staff_incharge') ?? '';
        $transfer_record->user_id =  Auth::user()->id;
        
        $transfer_record->save();

        $roomdetails = RoomDetail::where('room_no', '=', $rroom)->firstOrFail();
        $roomdetails->status = "Free";
      
        $roomdetails->save();

        $ress = ClientDetail::where('id', '=', $id)->firstOrFail();
        $ress->status = "Transfer";
        $ress->save();

        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Transfer Report";
        $activity->save();

         $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('transferDetails', $transfer_record->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

       return redirect()->route('transfer_records.index')
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
        $this->authorize('destroy', TransferRecord::class);
        TransferRecord::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Transfer Report";
        $activity->save();
        return redirect()->route('transfer_records.index')
                        ->with('success','deleted successfully');
    }

    public function generatetransfer()
    {
        $residents = TransferRecord::all();
        return view('transfer_records/report_show',compact('residents'));
    }

    public function generateTransferReport(){
      
      $name = request('res_name');
      $transfer_record = TransferRecord::where('client_id', '=', $name)->firstOrFail();
      return view('transfer_records/report',compact('transfer_record'));
    }

}
