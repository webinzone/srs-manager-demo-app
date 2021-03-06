<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\Mngshift;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class MngshiftsController extends Controller
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
        $this->authorize('index', Mngshift::class);
        return view('mngshifts/index');
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
        $this->authorize('create',Mngshift::class);
        $date = Carbon::now();
        $date = $date->toDateString();
        $last        =   Mngshift::where('mng_date', '=', $date)->orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->first();
        $ms = $last->mng_staff ?? '';
        $es = $last->evng_staff ?? '';
        $i = 0;

        $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        $emps = SrsStaff::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('name')->get();
        return view('mngshifts/create',compact('residents','emps','es','ms','date','i'));
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
        $this->authorize('create',Mngshift::class);
        $mngshift = new Mngshift();
        $mstaff = request('mng_staff') ?? '';
        $estaff = request('evng_staff') ?? '';
        $mng_date = request('mng_date') ?? '';
        $company_id = Auth::user()->c_id  ?? '';
        $location_id = Auth::user()->l_id  ?? '';
        $user_id =  Auth::user()->id;

        $mngshift->mng_staff = $mstaff;
        $mngshift->evng_staff = $estaff;
        $mngshift->mng_date = $mng_date;
        $mngshift->company_id = $company_id;
        $mngshift->location_id = $location_id;
        $mngshift->user_id = $user_id;            
       
        $mngshift->res_name = implode(',', (array) request('res_name')) ?? '';
        $mngshift->room = implode(',', (array) request('room')) ?? '';
        
        $mngshift->notes = implode(',', (array) request('notes')) ?? '';


        $mngshift->save();

        //$min = request('id') ?? '';
        //$min = (int)$min;
        //$data1 = request('res_name') ?? '';
        //$data2 = request('room') ?? '';
        //$data3 = request('notes') ?? '';       
        //$keysOne = array_keys($data1);
        //$keysTwo = array_keys($data2);
        //$keysThree = array_keys($data3);
//        
        //for($i = 0; $i < $min; $i++) {
        //$mngshift = new Mngshift();
//        
//
        //$mngshift->mng_staff = $mstaff;
        //$mngshift->evng_staff = $estaff;
        //$mngshift->mng_date = $mng_date;
        //$mngshift->company_id = $company_id;
        //$mngshift->location_id = $location_id;
        //$mngshift->user_id = $user_id;            
//       
        //$mngshift->res_name = $data1[$keysOne[$i]];
        //$mngshift->room = $data2[$keysTwo[$i]];
//        
        //$mngshift->notes = $data3[$keysThree[$i]];
//
//
        //$mngshift->save();
//
//
        //}

        
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Morning shift Report";

        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
      $activity->save();

      return redirect()->route('mngshifts.create')
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
        $this->authorize('show',Mngshift::class);
        $mngshift = Mngshift::find($id);
        $res_name = explode(',', $mngshift->res_name);
        $room = explode(',', $mngshift->room);
        $notes = explode(',', $mngshift->notes);        
         $i = 0;
        $item_last= count($res_name);
        $num = (int)$item_last;
        $emps = SrsStaff::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('name')->get();

        return view('mngshifts/show',compact('mngshift','emps','i','num','res_name','room','notes'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',Mngshift::class);
        $mngshift = Mngshift::find($id);
        $res_name = explode(',', $mngshift->res_name);
        $room = explode(',', $mngshift->room);
        $notes = explode(',', $mngshift->notes);        
         $i = 0;
        $item_last= count($res_name);
        $num = (int)$item_last;
        $emps = SrsStaff::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('name')->get();

        return view('mngshifts/edit',compact('mngshift','emps','i','num','res_name','room','notes'));
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
        $this->authorize('update', Mngshift::class);
        $mngshift = Mngshift::find($id);
        
        $mstaff = request('mng_staff') ?? '';
        $estaff = request('evng_staff') ?? '';
        $mng_date = request('mng_date') ?? '';
        $company_id = Auth::user()->c_id  ?? '';
        $location_id = Auth::user()->l_id  ?? '';
        $user_id =  Auth::user()->id;

        $mngshift->mng_staff = $mstaff;
        $mngshift->evng_staff = $estaff;
        $mngshift->mng_date = $mng_date;
        $mngshift->company_id = $company_id;
        $mngshift->location_id = $location_id;
        $mngshift->user_id = $user_id;            
       
        $mngshift->res_name = implode(',', (array) request('res_name')) ?? '';
        $mngshift->room = implode(',', (array) request('room')) ?? '';
        
        $mngshift->notes = implode(',', (array) request('notes')) ?? '';


        $mngshift->save();

       

         //$min = request('id') ?? '';
        //$min = (int)$min;
        //$data1 = request('res_name') ?? '';
        //$data2 = request('room') ?? '';
        //$data3 = request('notes') ?? ''; 
        //$data4 = request('idd') ?? '';      
        //$keysOne = array_keys($data1);
        //$keysTwo = array_keys($data2);
        //$keysThree = array_keys($data3);
        //$keysFour = array_keys($data4);
        //$id = $keysFour;  
        //$id = (int)$id;  
//        
        //for($i = 0; $i < $min; $i++) {
//            
//        
        //$mngshift = Mngshift::find($id);
//        
//
        //$mngshift->mng_staff = $mstaff;
        //$mngshift->evng_staff = $estaff;
        //$mngshift->mng_date = $mng_date;
        //$mngshift->company_id = $company_id;
        //$mngshift->location_id = $location_id;
        //$mngshift->user_id = $user_id;            
//       
        //$mngshift->res_name = $data1[$keysOne[$i]];
        //$mngshift->room = $data2[$keysTwo[$i]];
//        
        //$mngshift->notes = $data3[$keysThree[$i]];
//
//
        //$mngshift->save();
//
//
        //}

        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Morning shift Report";

        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();

        return redirect()->route('mngshifts.index')
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
        $this->authorize('destroy', Mngshift::class);
        Mngshift::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Morning shift Report";

        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('mngshifts.index')
                        ->with('success','deleted successfully');
    }

    public function getshiftdate($id)
    {
        $data = Mngshift::where('mng_date', '=', $date)->orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->first();
        return response()->json($data);
    }

}
