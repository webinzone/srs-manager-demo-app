<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\ConditionReport;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use App\Models\CompanyMaster;
use App\Models\LocationMaster;
use App\Models\RoomItem;

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
       
        $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $roomitems = RoomItem::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('condition_reports/create',compact('residents','companies','emps','roomitems'));
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
        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $condition_report->room = request('room') ?? ' ';
        $condition_report->items = implode(',', (array) request('items')) ?? ' ';
        $condition_report->clean = " " ?? ' ';
        $condition_report->undamaged = " " ?? ' ';
        $condition_report->working = " " ?? ' ';
        $condition_report->prop_comments = " " ?? ' ';
        $condition_report->res_comments = implode(',', (array) request('res_comments')) ?? ' ';
        $condition_report->res_name = $name ?? ' ';
        $condition_report->client_id = $id  ?? ' ';
        $condition_report->stf_name = request('stf_name') ?? ' ';
        $condition_report->res_date = request('res_date') ?? ' ';
        $condition_report->item_no = implode(',', (array) request('item_no')) ?? ' ';
        $condition_report->owned_by = implode(',', (array) request('owned_by')) ?? ' ';
        $condition_report->res_cond = implode(',', (array) request('res_cond')) ?? ' ';
        $condition_report->res_sign = "" ?? ' ';
        $condition_report->st_sign = "" ?? ' ';
        $condition_report->company_id = Auth::user()->c_id  ?? '';
        $condition_report->location_id = Auth::user()->l_id  ?? '';
        $condition_report->user_id =  Auth::user()->id;
        
        $condition_report->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Condition Report";
      
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
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
          $item_no = explode(',', $condition_report->item_no);
          $res_comments = explode(',', $condition_report->res_comments);
          $items = explode(',', $condition_report->items);
          $owned_by = explode(',', $condition_report->owned_by);
          $res_cond = explode(',', $condition_report->res_cond);
          $item_last= last($item_no);
          $num = (int)$item_last;

      return view('condition_reports/show', compact('condition_report', 'item_no', 'res_comments', 'items', 'owned_by', 'res_cond', 'num'));
      //  $condition_report = ConditionReport::find($id);
       // return view('condition_reports/show',compact('condition_report'));
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
            $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $companies = CompanyMaster::all();
            $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
          $condition_report = ConditionReport::find($id);
         $item_no = explode(',', $condition_report->item_no);
          $res_comments = explode(',', $condition_report->res_comments);
          $items = explode(',', $condition_report->items);
          $owned_by = explode(',', $condition_report->owned_by);
          $res_cond = explode(',', $condition_report->res_cond);
          $item_last= last($item_no);
          $num = (int)$item_last;
          $roomitems = RoomItem::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('condition_reports/edit',compact('condition_report','residents','companies','emps','item_no', 'res_comments', 'items', 'owned_by', 'res_cond', 'num','roomitems'));
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
        //$id = request('res_name');
       // $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        //$name = $res->fname." ".$res->mname." ".$res->lname;
        $condition_report->room = request('room') ?? ' ';
        $condition_report->items = implode(',', (array) request('items')) ?? ' ';
        $condition_report->clean = " " ?? ' ';
        $condition_report->undamaged = " " ?? ' ';
        $condition_report->working = " " ?? ' ';
        $condition_report->prop_comments = " " ?? ' ';
        $condition_report->res_comments = implode(',', (array) request('res_comments')) ?? ' ';
        $condition_report->res_name = request('res_name') ?? ' ';
       // $condition_report->client_id = $id  ?? ' ';
        $condition_report->stf_name = request('stf_name') ?? ' ';
        $condition_report->res_date = request('res_date') ?? ' ';
        $condition_report->item_no = implode(',', (array) request('item_no')) ?? ' ';
        $condition_report->owned_by = implode(',', (array) request('owned_by')) ?? ' ';
        $condition_report->res_cond = implode(',', (array) request('res_cond')) ?? ' ';
        $condition_report->res_sign = "" ?? ' ';
        $condition_report->st_sign = "" ?? ' ';
        $condition_report->company_id = Auth::user()->c_id  ?? '';
        $condition_report->location_id = Auth::user()->l_id  ?? '';
        $condition_report->user_id =  Auth::user()->id;
        
        $condition_report->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Condition Report";
        
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('roomDetails', $condition_report->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('condition_reports.index')
                        ->with('success','updated successfully');
                    }
        
    }

    public function condition_reports()
    {   
        $condition_reports = ConditionReport::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
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
      $item_no = explode(',', $condition_report->item_no);
      $res_comments = explode(',', $condition_report->res_comments);
      $items = explode(',', $condition_report->items);
      $owned_by = explode(',', $condition_report->owned_by);
      $res_cond = explode(',', $condition_report->res_cond);
      $item_last= last($item_no);
      $num = (int)$item_last;

      return view('condition_reports/report', compact('condition_report', 'item_no', 'res_comments', 'items', 'owned_by', 'res_cond', 'num'));
        
    }
   
     public function generateReport()
     {
      $res = request('res_name');
      $condition_report = ConditionReport::where('client_id', '=', $res)->firstOrFail();
      $item_no = explode(',', $condition_report->item_no);
      $res_comments = explode(',', $condition_report->res_comments);
      $items = explode(',', $condition_report->items);
      $owned_by = explode(',', $condition_report->owned_by);
      $res_cond = explode(',', $condition_report->res_cond);
      $item_last= last($item_no);
      $num = (int)$item_last;
      $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

      return view('condition_reports/report', compact('condition_report', 'item_no', 'res_comments', 'items', 'owned_by', 'res_cond', 'num','locations'));
      
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
        
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
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

    public function getCompanyName($id){
        $data = CompanyMaster::where('company_id', '=', $id)->firstOrFail();
        return response()->json($data);
    }

    public function getLocationName($id){
        $data = LocationMaster::where('id', '=', $id)->firstOrFail();
        return response()->json($data);
    }
    public function getLname($id){
        $data1 = CompanyMaster::where('company_id', '=', $id)->firstOrFail();
        $c_id = $data1->company_id;
        $l_id = 'L001';
        $data = LocationMaster::where('company_id', '=', $c_id)->where('location_id', '=', $l_id)->firstOrFail();
        return response()->json($data);
    }

    public function getRow($id){

        $condition_report = ConditionReport::where('id', '=', $id)->firstOrFail(); 
        $val = request('val')  ?? '';
        $i = (int)$val;
          $item_no = explode(',', $condition_report->item_no);
          $res_comments = explode(',', $condition_report->res_comments);
          $items = explode(',', $condition_report->items);
          $owned_by = explode(',', $condition_report->owned_by);
          $res_cond = explode(',', $condition_report->res_cond);
             
       // unset($item_no[$i]);
       // unset($res_comments[$i]);
       // unset($items[$i]);
       // unset($owned_by[$i]);
        //unset($res_cond[$i]);
        $item_no[$i] = '';
       $res_comments[$i] = '';
       $items[$i] = '';
       $owned_by[$i] = '';
       $res_cond[$i] = '';

        $item_no = array_values($item_no);
        $res_comments = array_values($res_comments);
        $items = array_values($items);
        $owned_by = array_values($owned_by);
        $res_cond = array_values($res_cond);
        
        $condition_report->item_no = implode(',', (array) $item_no) ;
        $condition_report->items = implode(',', (array) $items) ;
        $condition_report->res_comments = implode(',', (array) $res_comments) ;

        $condition_report->owned_by = implode(',', (array) $owned_by) ;
        $condition_report->res_cond = implode(',', (array) $res_cond) ;
        $condition_report->save();

           

        return redirect()->route('condition_reports.edit', compact('condition_report'))
                   ->with('success','deleted successfully');

    }

}
