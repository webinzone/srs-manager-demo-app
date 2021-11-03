<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\ProgressNote;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use App\Models\LocationMaster;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ProgressNotesController extends Controller
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
        $this->authorize('view', ProgressNote::class);
        return view('progress_notes/index');
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
        $this->authorize('create',ProgressNote::class);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('progress_notes/create',compact('residents','emps'));
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
        $this->authorize('create',ProgressNote::class);
        $progress_notes = new ProgressNote();

        $id = request('res_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;

        $progress_notes->res_name = $name ?? '';
        $progress_notes->client_id = $id ?? '';
        $progress_notes->prg_note = request('prg_note') ?? '';
        $progress_notes->staff = request('staff') ?? '';
        $progress_notes->career = request('career') ?? '';

        $progress_notes->p_date = request('p_date') ?? '';
        $progress_notes->dob = request('dob') ?? '';
        $progress_notes->gender = request('gender') ?? '';
        $progress_notes->room = request('room') ?? '';
        $progress_notes->g_name = request('g_name') ?? '';


        $progress_notes->company_id = Auth::user()->c_id  ?? '';
        $progress_notes->location_id = Auth::user()->l_id  ?? '';
        $progress_notes->user_id =  Auth::user()->id;
        
        $progress_notes->save();
      
         $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Created";
        $activity->item = "Progress Notes";
        
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('progress_notes.index')
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
        $this->authorize('show',ProgressNote::class);
        $progress_note = ProgressNote::find($id);
        return view('progress_notes/show',compact('progress_note'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',ProgressNote::class);
        $progress_note = ProgressNote::find($id);
        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('progress_notes/edit',compact('progress_note','residents','emps'));
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
        $this->authorize('update', ProgressNote::class);
        $progress_notes = ProgressNote::find($id);

        
       $id = request('res_name') ?? '';
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;

        $progress_notes->res_name = $name ?? '';
        $progress_notes->client_id = $id ?? '';
        $progress_notes->prg_note = request('prg_note') ?? '';
        $progress_notes->staff = request('staff') ?? '';
        $progress_notes->career = request('career') ?? '';

        $progress_notes->p_date = request('p_date') ?? '';
        $progress_notes->dob = request('dob') ?? '';
        $progress_notes->gender = request('gender') ?? '';
        $progress_notes->room = request('room') ?? '';
        $progress_notes->g_name = request('g_name') ?? '';

        $progress_notes->company_id = Auth::user()->c_id  ?? '';
        $progress_notes->location_id = Auth::user()->l_id  ?? '';
        $progress_notes->user_id =  Auth::user()->id;
        
     
        $progress_notes->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Progress Notes";
        
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect()->route('progress_notes.index')
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
        $this->authorize('destroy', ProgressNote::class);
        ProgressNote::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Progress Notes";
        
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('progress_notes.index')
                        ->with('success','deleted successfully');
    }

    public function progress_generate(){
        

        $users = ProgressNote::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $progress = $users->unique();


         return view('progress_notes/report_show',compact('progress'));
    }

    public function generateProgressReport(){
      $res = request('res_name');
      $progress_note = ProgressNote::where('client_id', '=', $res)->get();
      $resi = ProgressNote::where('client_id', '=', $res)->firstOrFail();

      $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();


      return view('progress_notes/report',compact('progress_note','resi','locations'));
    }

}
