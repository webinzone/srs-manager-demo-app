<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\GpDetail;
use App\Models\ActivityLog;
use App\Models\ClientDetail;
use App\Models\SrsStaff;
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
class GpDetailsController extends Controller
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
        $this->authorize('index', GpDetail::class);
        $gp_details = GpDetail::orderBy('created_at', 'desc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('gp_details/index',compact('gp_details'));
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
        $this->authorize('create',GpDetail::class);
       
        $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        return view('gp_details/create',compact('residents','companies','emps'));
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
        $this->authorize('create',GpDetail::class);
        $gp_detail = new GpDetail();
        $id = request('res_name');
        $res = ClientDetail::where('id', '=', $id)->firstOrFail();
        $name = $res->fname." ".$res->mname." ".$res->lname;
        $gp_detail->res_id = $id;
        $gp_detail->res_name = $name;
        $gp_detail->room = request('room') ?? ' ';
        $gp_detail->bed = request('bed') ?? ' ';
        $gp_detail->dob = request('dob') ?? ' ';

        $gp_detail->item_no = implode(',', (array) request('item_no')) ?? ' ';
        $gp_detail->category = implode(',', (array) request('category')) ?? ' ';
        $gp_detail->name = implode(',', (array) request('name')) ?? ' ';
        $gp_detail->address = implode(',', (array) request('address')) ?? ' ';
        $gp_detail->ph = implode(',', (array) request('ph')) ?? ' ';
        $gp_detail->email = implode(',', (array) request('email')) ?? ' ';

        $gp_detail->company_id = Auth::user()->c_id  ?? '';
        $gp_detail->location_id = Auth::user()->l_id  ?? '';
        $gp_detail->user_id =  Auth::user()->id;
        
        $gp_detail->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Gp Detail";
      $activity->company_id = Auth::user()->c_id  ?? '';
      $activity->location_id = Auth::user()->l_id  ?? '';
      $activity->user_id = Auth::user()->id;
      $activity->save();

      return redirect()->route('gp_details.index')
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
        $this->authorize('show',GpDetail::class);
          
          $gp_detail = GpDetail::find($id);
          $item_no = explode(',', $gp_detail->item_no);

          $category = explode(',', $gp_detail->category);
          $name = explode(',', $gp_detail->name);
          $address = explode(',', $gp_detail->address);
          $ph = explode(',', $gp_detail->ph);
          $email = explode(',', $gp_detail->email);
          
          $item_last= last($item_no);
          $num = (int)$item_last;

      return view('gp_details/show', compact('gp_detail', 'category', 'name', 'address', 'ph', 'email', 'num', 'item_no'));
      //  $gp_detail = GpDetail::find($id);
       // return view('gp_details/show',compact('gp_detail'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',GpDetail::class);
            $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
          $companies = CompanyMaster::all();
          $gp_detail = GpDetail::find($id);
          $item_no = explode(',', $gp_detail->item_no);
          $category = explode(',', $gp_detail->category);
          $name = explode(',', $gp_detail->name);
          $address = explode(',', $gp_detail->address);
          $ph = explode(',', $gp_detail->ph);
          $email = explode(',', $gp_detail->email);

          $item_last= last($item_no);
          $num = (int)$item_last;
        return view('gp_details/edit',compact('gp_detail','residents','companies','category', 'name', 'address', 'ph', 'email', 'num', 'item_no'));
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
        $this->authorize('update', GpDetail::class);
        $gp_detail = GpDetail::find($id);
       
        //$id = request('res_name');
        //$res = ClientDetail::where('id', '=', $id)->firstOrFail();
        //$name = $res->fname." ".$res->mname." ".$res->lname;
        //$gp_detail->res_id = $id;
        $gp_detail->res_name = request('res_name');
        $gp_detail->room = request('room') ?? ' ';
        $gp_detail->bed = request('bed') ?? ' ';
        $gp_detail->dob = request('dob') ?? ' ';

        $gp_detail->item_no = implode(',', (array) request('item_no')) ?? ' ';
        $gp_detail->category = implode(',', (array) request('category')) ?? ' ';
        $gp_detail->name = implode(',', (array) request('name')) ?? ' ';
        $gp_detail->address = implode(',', (array) request('address')) ?? ' ';
        $gp_detail->ph = implode(',', (array) request('ph')) ?? ' ';
        $gp_detail->email = implode(',', (array) request('email')) ?? ' ';

        $gp_detail->company_id = Auth::user()->c_id  ?? '';
        $gp_detail->location_id = Auth::user()->l_id  ?? '';
        $gp_detail->user_id =  Auth::user()->id;

        
        $gp_detail->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "Gp Detail";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();

        $val = request('val')  ?? '';
        if($val == 'res')
        {
            return redirect()->route('roomDetails', $gp_detail->client_id)
                ->with('success','Updated successfully');
        }
        else
        {

        return redirect()->route('gp_details.index')
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
        $this->authorize('destroy', GpDetail::class);
        GpDetail::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "Gp Detail";
        $activity->company_id = Auth::user()->c_id  ?? '';
        $activity->location_id = Auth::user()->l_id  ?? '';
        $activity->user_id = Auth::user()->id;
        $activity->save();
        return redirect()->route('gp_details.index')
                        ->with('success','deleted successfully');
    }


}
