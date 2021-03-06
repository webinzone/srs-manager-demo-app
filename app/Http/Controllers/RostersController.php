<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Roster;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use App\Models\CompanyMaster;
use App\Models\LocationMaster;

use DateTime;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;
use DB;
use Carbon\Carbon;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class RostersController extends Controller
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
        $this->authorize('index', Roster::class);
      
        return view('rosters/index');
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
        $this->authorize('create',Roster::class);
       
        $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('rosters/create',compact('residents','companies','emps'));
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
        $this->authorize('create',Roster::class);
        $roster = new Roster();
        $roster->p_from = request('p_from') ?? ' ';
        $roster->p_to = request('p_to') ?? ' ';
        $roster->mngr = request('mngr') ?? ' ';
        $roster->a_mngr = request('a_mngr') ?? ' ';
        $roster->c_oofr = request('c_oofr') ?? ' ';
        $roster->prop = request('prop') ?? ' ';
        $roster->faci = request('faci') ?? ' ';
        $roster->e_name = implode(',', (array) request('e_name')) ?? ' ';
        $roster->e_pos = implode(',', (array) request('e_pos')) ?? ' ';
        $roster->sun = implode(',', (array) request('sun')) ?? ' ';
        $roster->mon = implode(',', (array) request('mon')) ?? ' ';
        $roster->tue = implode(',', (array) request('tue')) ?? ' ';
        $roster->wed = implode(',', (array) request('wed')) ?? ' ';
        $roster->thu = implode(',', (array) request('thu')) ?? ' ';
        $roster->fri = implode(',', (array) request('fri')) ?? ' ';
        $roster->sat = implode(',', (array) request('sat')) ?? ' ';
        $roster->sunto = implode(',', (array) request('sunto')) ?? ' ';
        $roster->monto = implode(',', (array) request('monto')) ?? ' ';
        $roster->tueto = implode(',', (array) request('tueto')) ?? ' ';
        $roster->wedto = implode(',', (array) request('wedto')) ?? ' ';
        $roster->thuto = implode(',', (array) request('thuto')) ?? ' ';
        $roster->frito = implode(',', (array) request('frito')) ?? ' ';
        $roster->satto = implode(',', (array) request('satto')) ?? ' ';
        $roster->sun_leav = implode(',', (array) request('sun_leav')) ?? ' ';
        $roster->mon_leav = implode(',', (array) request('mon_leav')) ?? ' ';
        $roster->tues_leav = implode(',', (array) request('tues_leav')) ?? ' ';
        $roster->wed_leav = implode(',', (array) request('wed_leav')) ?? ' ';
        $roster->thur_leav = implode(',', (array) request('thur_leav')) ?? ' ';
        $roster->fri_leav = implode(',', (array) request('fri_leav')) ?? ' ';
        $roster->sat_leav = implode(',', (array) request('sat_leav')) ?? ' ';

        

        $roster->tot_hr = implode(',', (array) request('diff')) ?? ' ';
        $checkMe = $roster->p_from;
        $month = date('m-Y', strtotime($roster->p_from));
        $roster->month = $month;

        $roster->company_id = Auth::user()->c_id  ?? '';
        $roster->location_id = Auth::user()->l_id  ?? '';
        $roster->user_id =  Auth::user()->id;
        
        $roster->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Roster Report";
      $activity->save();

      return redirect()->route('rosters.edit',$roster->id)
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
        $this->authorize('show',Roster::class);
          
          $roster = Roster::find($id);
          $e_name = explode(',', $roster->e_name);
          $e_pos = explode(',', $roster->e_pos);
          $sun = explode(',', $roster->sun);
          $mon = explode(',', $roster->mon);
          $tue = explode(',', $roster->tue);
          $wed = explode(',', $roster->wed);
          $thu = explode(',', $roster->thu);
          $fri = explode(',', $roster->fri);
          $sat = explode(',', $roster->sat);
          $sunto = explode(',', $roster->sunto);
          $monto = explode(',', $roster->monto);
          $tueto = explode(',', $roster->tueto);
          $wedto = explode(',', $roster->wedto);
          $thuto = explode(',', $roster->thuto);
          $frito = explode(',', $roster->frito);
          $satto = explode(',', $roster->satto);
          $sun_leav = explode(',', $roster->sun_leav);
          $mon_leav = explode(',', $roster->mon_leav);
          $tues_leav = explode(',', $roster->tues_leav);
          $wed_leav = explode(',', $roster->wed_leav);
          $thur_leav = explode(',', $roster->thur_leav);
          $fri_leav = explode(',', $roster->fri_leav);
          $sat_leav = explode(',', $roster->sat_leav);
          $tot_hr = explode(',', $roster->tot_hr);
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;

        return view('rosters/show',compact('roster', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'sun_leav', 'mon_leav', 'tues_leav', 'wed_leav', 'thur_leav', 'fri_leav', 'sat_leav', 'tot_hr', 'emps', 'num'));
      //  $roster = Roster::find($id);
       // return view('rosters/show',compact('roster'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Roster::class);
       
          $roster = Roster::find($id);
          $e_name = explode(',', $roster->e_name) ?? '';
          $e_pos = explode(',', $roster->e_pos) ?? '';
          $sun = explode(',', $roster->sun) ?? '';
          $mon = explode(',', $roster->mon) ?? '';
          $tue = explode(',', $roster->tue) ?? '';
          $wed = explode(',', $roster->wed) ?? '';
          $thu = explode(',', $roster->thu) ?? '';
          $fri = explode(',', $roster->fri) ?? '';
          $sat = explode(',', $roster->sat) ?? '';
          $sunto = explode(',', $roster->sunto) ?? '';
          $monto = explode(',', $roster->monto) ?? '';
          $tueto = explode(',', $roster->tueto) ?? '';
          $wedto = explode(',', $roster->wedto) ?? '';
          $thuto = explode(',', $roster->thuto) ?? '';
          $frito = explode(',', $roster->frito) ?? '';
          $satto = explode(',', $roster->satto) ?? '';
          $sun_leav = explode(',', $roster->sun_leav);
          $mon_leav = explode(',', $roster->mon_leav);
          $tues_leav = explode(',', $roster->tues_leav);
          $wed_leav = explode(',', $roster->wed_leav);
          $thur_leav = explode(',', $roster->thur_leav);
          $fri_leav = explode(',', $roster->fri_leav);
          $sat_leav = explode(',', $roster->sat_leav);
          $tot_hr = explode(',', $roster->tot_hr) ?? '';
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;

        return view('rosters/edit',compact('roster', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'sun_leav', 'mon_leav', 'tues_leav', 'wed_leav', 'thur_leav', 'fri_leav', 'sat_leav', 'tot_hr', 'emps', 'num'));
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
        $this->authorize('update', Roster::class);
        $roster = Roster::find($id);
        $roster->p_from = request('p_from') ?? ' ';
        $roster->p_to = request('p_to') ?? ' ';
        $roster->mngr = request('mngr') ?? ' ';
        $roster->a_mngr = request('a_mngr') ?? ' ';
        $roster->c_oofr = request('c_oofr') ?? ' ';
        $roster->prop = request('prop') ?? ' ';
        $roster->faci = request('faci') ?? ' ';
        $roster->e_name = implode(',', (array) request('e_name')) ?? ' ';
        $roster->e_pos = implode(',', (array) request('e_pos')) ?? ' ';
        $roster->sun = implode(',', (array) request('sun')) ?? ' ';
        $roster->mon = implode(',', (array) request('mon')) ?? ' ';
        $roster->tue = implode(',', (array) request('tue')) ?? ' ';
        $roster->wed = implode(',', (array) request('wed')) ?? ' ';
        $roster->thu = implode(',', (array) request('thu')) ?? ' ';
        $roster->fri = implode(',', (array) request('fri')) ?? ' ';
        $roster->sat = implode(',', (array) request('sat')) ?? ' ';
        $roster->sunto = implode(',', (array) request('sunto')) ?? ' ';
        $roster->monto = implode(',', (array) request('monto')) ?? ' ';
        $roster->tueto = implode(',', (array) request('tueto')) ?? ' ';
        $roster->wedto = implode(',', (array) request('wedto')) ?? ' ';
        $roster->thuto = implode(',', (array) request('thuto')) ?? ' ';
        $roster->frito = implode(',', (array) request('frito')) ?? ' ';
        $roster->satto = implode(',', (array) request('satto')) ?? ' ';
        $roster->tot_hr = implode(',', (array) request('diff')) ?? ' ';
        $roster->sun_leav = implode(',', (array) request('sun_leav')) ?? ' ';
        $roster->mon_leav = implode(',', (array) request('mon_leav')) ?? ' ';
        $roster->tues_leav = implode(',', (array) request('tues_leav')) ?? ' ';
        $roster->wed_leav = implode(',', (array) request('wed_leav')) ?? ' ';
        $roster->thur_leav = implode(',', (array) request('thur_leav')) ?? ' ';
        $roster->fri_leav = implode(',', (array) request('fri_leav')) ?? ' ';
        $roster->sat_leav = implode(',', (array) request('sat_leav')) ?? ' ';

        $roster->company_id = Auth::user()->c_id  ?? '';
        $roster->location_id = Auth::user()->l_id  ?? '';
        $roster->user_id =  Auth::user()->id;
        
        $roster->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Roster Report";
        $activity->save();

        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('roomDetails', $roster->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('rosters.edit',$roster->id)
                        ->with('success','updated successfully');
                    }
        
    }

    public function generaterosters()
    {   
        $rosters = Roster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('rosters/report_show',compact('rosters'));
    
    }

    public function generateMonthlyRosterReport(){
        $mon = request('month');
        $month = date('m-Y', strtotime($mon));
 
        $rosters = Roster::where('month', '=', $month)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';

       
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
      
          $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();


        return view('rosters/monthly_report',compact('rosters', 'emps', 'locations', 'mon'));  
    }

     public function generatePDF($id)
     {
        $roster = Roster::find($id);
   
        $pdf = PDF::loadView('rosters/report', compact('roster'));
   
      //  return $pdf->download('resident_report.pdf');
 
          return $pdf->stream('report.pdf', array('Attachment'=>0));   

    }

    public function generateRosterReport()
    {
        $from = request('from');
        $to = request('to');
        $roster = Roster::where('p_from', '=', $from)->where('p_to', '=', $to)->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail() ?? '';

          $e_name = explode(',', $roster->e_name);
          $e_pos = explode(',', $roster->e_pos);
          $sun = explode(',', $roster->sun);
          $mon = explode(',', $roster->mon);
          $tue = explode(',', $roster->tue);
          $wed = explode(',', $roster->wed);
          $thu = explode(',', $roster->thu);
          $fri = explode(',', $roster->fri);
          $sat = explode(',', $roster->sat);
          $sunto = explode(',', $roster->sunto);
          $monto = explode(',', $roster->monto);
          $tueto = explode(',', $roster->tueto);
          $wedto = explode(',', $roster->wedto);
          $thuto = explode(',', $roster->thuto);
          $frito = explode(',', $roster->frito);
          $satto = explode(',', $roster->satto);
          $sun_leav = explode(',', $roster->sun_leav);
          $mon_leav = explode(',', $roster->mon_leav);
          $tues_leav = explode(',', $roster->tues_leav);
          $wed_leav = explode(',', $roster->wed_leav);
          $thur_leav = explode(',', $roster->thur_leav);
          $fri_leav = explode(',', $roster->fri_leav);
          $sat_leav = explode(',', $roster->sat_leav);
          $tot_hr = explode(',', $roster->tot_hr);
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;
          $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();


        return view('rosters/report',compact('roster', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'sun_leav', 'mon_leav', 'tues_leav', 'wed_leav', 'thur_leav', 'fri_leav', 'sat_leav', 'tot_hr', 'emps', 'num', 'locations'));  
    }
   
     public function generateReport()
     {
          $e_name = explode(',', $roster->e_name);
          $e_pos = explode(',', $roster->e_pos);
          $sun = explode(',', $roster->sun);
          $mon = explode(',', $roster->mon);
          $tue = explode(',', $roster->tue);
          $wed = explode(',', $roster->wed);
          $thu = explode(',', $roster->thu);
          $fri = explode(',', $roster->fri);
          $sat = explode(',', $roster->sat);
          $sunto = explode(',', $roster->sunto);
          $monto = explode(',', $roster->monto);
          $tueto = explode(',', $roster->tueto);
          $wedto = explode(',', $roster->wedto);
          $thuto = explode(',', $roster->thuto);
          $frito = explode(',', $roster->frito);
          $satto = explode(',', $roster->satto);
          $sun_leav = explode(',', $roster->sun_leav);
          $mon_leav = explode(',', $roster->mon_leav);
          $tues_leav = explode(',', $roster->tues_leav);
          $wed_leav = explode(',', $roster->wed_leav);
          $thur_leav = explode(',', $roster->thur_leav);
          $fri_leav = explode(',', $roster->fri_leav);
          $sat_leav = explode(',', $roster->sat_leav);
          $tot_hr = explode(',', $roster->tot_hr);
      $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

      return view('rosters/report', compact('roster', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'sun_leav', 'mon_leav', 'tues_leav', 'wed_leav', 'thur_leav', 'fri_leav', 'sat_leav', 'tot_hr','locations'));
      
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('destroy', Roster::class);
        Roster::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Roster Report";
        $activity->save();
        return redirect()->route('rosters.index')
                        ->with('success','deleted successfully');
    }

   
    public function getRow($id){

        $roster = Roster::where('id', '=', $id)->firstOrFail(); 
        $val = request('val')  ?? '';
        $i = (int)$val;
         $e_name = explode(',', $roster->e_name);
          $e_pos = explode(',', $roster->e_pos);
          $sun = explode(',', $roster->sun);
          $mon = explode(',', $roster->mon);
          $tue = explode(',', $roster->tue);
          $wed = explode(',', $roster->wed);
          $thu = explode(',', $roster->thu);
          $fri = explode(',', $roster->fri);
          $sat = explode(',', $roster->sat);
          $sunto = explode(',', $roster->sunto);
          $monto = explode(',', $roster->monto);
          $tueto = explode(',', $roster->tueto);
          $wedto = explode(',', $roster->wedto);
          $thuto = explode(',', $roster->thuto);
          $frito = explode(',', $roster->frito);
          $satto = explode(',', $roster->satto);
          $sun_leav = explode(',', $roster->sun_leav);
          $mon_leav = explode(',', $roster->mon_leav);
          $tues_leav = explode(',', $roster->tues_leav);
          $wed_leav = explode(',', $roster->wed_leav);
          $thur_leav = explode(',', $roster->thur_leav);
          $fri_leav = explode(',', $roster->fri_leav);
          $sat_leav = explode(',', $roster->sat_leav);
          $tot_hr = explode(',', $roster->tot_hr);
             
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

        $e_name = array_values($e_name);
        $e_pos = array_values($e_pos);
        $sun = array_values($sun);
        $mon = array_values($mon);
        $tue = array_values($tue);
        $wed = array_values($wed);
        $thu = array_values($thu);
        $fri = array_values($fri);
        $sat = array_values($sat);
        $sunto = array_values($sunto);
        $monto = array_values($monto);
        $tueto = array_values($tueto);
        $wedto = array_values($wedto);
        $thuto = array_values($thuto);
        $frito = array_values($frito);
        $satto = array_values($satto);
        $sun_leav = array_values($sun_leav);
        $mon_leav = array_values($mon_leav);
        $tues_leav = array_values($tues_leav);
        $wed_leav = array_values($wed_leav);
        $thur_leav = array_values($thur_leav);
        $fri_leav = array_values($fri_leav);
        $sat_leav = array_values($sat_leav);
        $tot_hr = array_values($tot_hr);
        
        $roster->e_name = implode(',', (array) $e_name) ;
        $roster->e_pos = implode(',', (array) $e_pos) ;
        $roster->sun = implode(',', (array) $sun) ;

        $roster->mon = implode(',', (array) $mon) ;
        $roster->tue = implode(',', (array) $tue) ;
        $roster->wed = implode(',', (array) $wed) ;
        $roster->thu = implode(',', (array) $thu) ;
        $roster->fri = implode(',', (array) $fri) ;
        $roster->sat = implode(',', (array) $sat) ;
        $roster->monto = implode(',', (array) $monto) ;
        $roster->tueto = implode(',', (array) $tueto) ;
        $roster->wedto = implode(',', (array) $wedto) ;
        $roster->thuto = implode(',', (array) $thuto) ;
        $roster->frito = implode(',', (array) $frito) ;
        $roster->satto = implode(',', (array) $satto) ;
        $roster->sun_leav = implode(',', (array) $sun_leav) ;
        $roster->mon_leav = implode(',', (array) $mon_leav) ;
        $roster->tues_leav = implode(',', (array) $tues_leav) ;
        $roster->wed_leav = implode(',', (array) $wed_leav) ;
        $roster->thur_leav = implode(',', (array) $thur_leav) ;
        $roster->fri_leav = implode(',', (array) $fri_leav) ;
        $roster->sat_leav = implode(',', (array) $sat_leav) ;

        $roster->tot_hr = implode(',', (array) $tot_hr) ;
        $roster->save();

           

        return redirect()->route('rosters.edit', compact('roster'))
                   ->with('success','deleted successfully');

    }

    public function previous(){
        $roster        =   Roster::orderBy('created_at', 'desc')->first();
          $e_name = explode(',', $roster->e_name) ?? '';
          $e_pos = explode(',', $roster->e_pos) ?? '';
          $sun = explode(',', $roster->sun) ?? '';
          $mon = explode(',', $roster->mon) ?? '';
          $tue = explode(',', $roster->tue) ?? '';
          $wed = explode(',', $roster->wed) ?? '';
          $thu = explode(',', $roster->thu) ?? '';
          $fri = explode(',', $roster->fri) ?? '';
          $sat = explode(',', $roster->sat) ?? '';
          $sunto = explode(',', $roster->sunto) ?? '';
          $monto = explode(',', $roster->monto) ?? '';
          $tueto = explode(',', $roster->tueto) ?? '';
          $wedto = explode(',', $roster->wedto) ?? '';
          $thuto = explode(',', $roster->thuto) ?? '';
          $frito = explode(',', $roster->frito) ?? '';
          $satto = explode(',', $roster->satto) ?? '';
          $sun_leav = explode(',', $roster->sun_leav);
          $mon_leav = explode(',', $roster->mon_leav);
          $tues_leav = explode(',', $roster->tues_leav);
          $wed_leav = explode(',', $roster->wed_leav);
          $thur_leav = explode(',', $roster->thur_leav);
          $fri_leav = explode(',', $roster->fri_leav);
          $sat_leav = explode(',', $roster->sat_leav);
          $tot_hr = explode(',', $roster->tot_hr) ?? '';
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;

        return view('rosters/previous',compact('roster', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'sun_leav', 'mon_leav', 'tues_leav', 'wed_leav', 'thur_leav', 'fri_leav', 'sat_leav', 'tot_hr', 'emps', 'num'));

    }

}