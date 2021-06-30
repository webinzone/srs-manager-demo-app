<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\ConditionReport;
use App\Models\ActivityLog;
use App\Models\ClientDetail;

use App\Models\CompanyMaster;
use App\Models\LocationMaster;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;
use DB;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ConditionReportsController extends Controller
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
        $this->authorize('view', ConditionReport::class);
        $condition_reports = ConditionReport::all();
      
        return view('condition_reports/index',compact('condition_reports'));
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
        $this->authorize('create',ConditionReport::class);
        $residents = ClientDetail::all();
        $companies = CompanyMaster::all();
        return view('condition_reports/create',compact('residents','companies'));
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
        $this->authorize('create',ConditionReport::class);
        $condition_report = new ConditionReport();

        $condition_report->room = request('room');
        $condition_report->items = request('items');
        $condition_report->clean = "null";
        $condition_report->undamaged = "null";
        $condition_report->working = "null";
        $condition_report->prop_comments = "null";
        $condition_report->res_comments = request('res_comments');
        $condition_report->res_name = request('res_name');
        $condition_report->stf_name = request('stf_name');
        $condition_report->res_date = request('res_date');
        $condition_report->item_no = request('item_no');
        $condition_report->owned_by = request('owned_by');
        $condition_report->res_cond = request('res_cond');
        $condition_report->res_sign = request('res_sign');
        $condition_report->st_sign = request('st_sign');
        $condition_report->company_id = request('company_id');
        $condition_report->location_id = request('location_id');
        $condition_report->user_id =  Auth::user()->id;
        
        $condition_report->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Condition Report";
      $activity->save();

      return redirect()->route('condition_reports.index')
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
        $this->authorize('show',ConditionReport::class);
        $condition_report = ConditionReport::find($id);
        return view('condition_reports/show',compact('condition_report'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',ConditionReport::class);
        $condition_report = ConditionReport::find($id);
        return view('condition_reports/edit',compact('condition_report'));
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
        $this->authorize('update', ConditionReport::class);
        $condition_report = ConditionReport::find($id);

        $condition_report->room = request('room');
        $condition_report->items = request('items');
        //$condition_report->clean = request('clean');
        //$condition_report->undamaged = request('undamaged');
        //$condition_report->working = request('working');
        //$condition_report->prop_comments = request('prop_comments');
        $condition_report->res_comments = request('res_comments');
        $condition_report->res_name = request('res_name');
        $condition_report->stf_name = request('stf_name');
        $condition_report->res_date = request('res_date');
        $condition_report->item_no = request('item_no');
        $condition_report->owned_by = request('owned_by');
        $condition_report->res_cond = request('res_cond');
        $condition_report->res_sign = request('res_sign');
        $condition_report->st_sign = request('st_sign');
        $condition_report->company_id = request('company_id');
        $condition_report->location_id = request('location_id');
        $condition_report->user_id =  Auth::user()->id;
        
        $condition_report->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Condition Report";
        $activity->save();

        return redirect()->route('condition_reports.index')
                        ->with('success','updated successfully');
    }

    public function condition_reports()
    {   
        $condition_reports = ConditionReport::all();
        return view('condition_reports/report_show',compact('condition_reports'));
    
    }

     public function generatePDF($id)
     {
        $condition_report = ConditionReport::find($id);
   
        $pdf = PDF::loadView('condition_reports/report', compact('condition_report'));
   
      //  return $pdf->download('resident_report.pdf');
 
          return $pdf->stream('report.pdf', array('Attachment'=>0));   

    }

    public function viewreport($id)
    {
      $condition_report = ConditionReport::find($id);
      return view('condition_reports/report', compact('condition_report'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('destroy', ConditionReport::class);
        ConditionReport::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Condition Report";
        $activity->save();
        return redirect()->route('condition_reports.index')
                        ->with('success','deleted successfully');
    }

    public function getDetails($id){
         $data = ClientDetail::where('id', '=', $id)->firstOrFail();
         return response()->json($data);
    }
    public function getLocation($id){
        // $data = LocationMaster::where('company_id', '=', $id)->firstOrFail();
        // return response()->json($data);
        $value = $id;
         return response()->json([
            'locations' => LocationMaster::where('company_id', $id)->get()
        ]);

    }

}
