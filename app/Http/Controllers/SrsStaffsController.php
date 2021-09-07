<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\SrsStaff;
use App\Models\ActivityLog;
use App\Models\Certificate;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Response;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class SrsStaffsController extends Controller
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
        $this->authorize('view', SrsStaff::class);
        $srs_staffs = SrsStaff::all();
        return view('srs_staffs/index',compact('srs_staffs'));
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
        $this->authorize('create',SrsStaff::class);
        return view('srs_staffs/create');
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
        $this->authorize('create',SrsStaff::class);
        $srs_staff = new SrsStaff();

        $srs_staff->name = request('fname')."  ".request('mname')."  ".request('lname');
        $srs_staff->address = request('address') ?? '';
        $srs_staff->ph = request('ph') ?? '';
        $srs_staff->dob = request('dob') ?? '';
        $srs_staff->email = request('email') ?? '';
        $srs_staff->company_id = Auth::user()->c_id  ?? '';
        $srs_staff->location_id = Auth::user()->l_id  ?? '';

        $srs_staff->posi = request('posi')  ?? '';
        $srs_staff->tfn = request('tfn')  ?? '';
        $srs_staff->abn = request('abn')  ?? '';
        $srs_staff->s_comp = request('s_comp')  ?? '';
        $srs_staff->s_no = request('s_no')  ?? '';
        $srs_staff->fi_date = request('fi_date')  ?? '';
        $srs_staff->crime = request('crime')  ?? '';
        $srs_staff->w_child = request('w_child')  ?? '';
        
        $data1[] = implode(',', (array) request('quali')) ?? '';
        $data2[] = implode(',', (array) request('certi_exp')) ?? '';

        $srs_staff->item_no = implode(',', (array) request('item_no')) ?? '';
        $srs_staff->quali = implode(',', (array) request('quali')) ?? '';
        $srs_staff->qop_date = implode(',', (array) request('qop_date')) ?? '';
        $srs_staff->certi_exp = implode(',', (array) request('certi_exp')) ?? '';

        if (request('emp_certi')) {
            foreach(request('emp_certi') as $file)
            {
                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path().'/certificates/', $name);  
                $data[] = $name;  
            }

        $srs_staff->emp_certi = implode(',', (array) $data);

        }
           
        
        $srs_staff->user_id =  Auth::user()->id;
        
        $srs_staff->save();

        $keysOne = array_keys($data1);
        $keysTwo = array_keys($data2);
        $sid = $srs_staff->id;

        $min = min(count($data1), count($data2));

        for($i = 0; $i < $min; $i++) {
            $certi = new Certificate();
            $certi->res_name = $srs_staff->name;
            $certi->res_id = $sid;
            $certi->certi_name = $data1[$keysOne[$i]];
            $certi->certi_exp = $data2[$keysTwo[$i]];          
            
            $certi->user_id =  Auth::user()->id;
            $certi->company_id = Auth::user()->c_id  ?? '';
            $certi->location_id = Auth::user()->l_id  ?? '';

             $certi->save();

        }
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "SrsStaff Report";
      $activity->save();

      return redirect()->route('srs_staffs.index')
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
        $this->authorize('show',SrsStaff::class);
        $srs_staff = SrsStaff::find($id);

        $item_no = explode(',', $srs_staff->item_no);
        $quali = explode(',', $srs_staff->quali);
        $qop_date = explode(',', $srs_staff->qop_date);
        $certi_exp = explode(',', $srs_staff->certi_exp);
        $emp_certi = explode(',', $srs_staff->emp_certi);

        $item_last= count($quali);
        $num = (int)$item_last;
        
        
        return view('srs_staffs/show',compact('srs_staff', 'item_no', 'quali', 'qop_date', 'certi_exp', 'emp_certi', 'num'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',SrsStaff::class);
        $srs_staff = SrsStaff::find($id);
        $name = explode(' ', $srs_staff->name);

        $item_no = explode(',', $srs_staff->item_no);
        $quali = explode(',', $srs_staff->quali);
        $qop_date = explode(',', $srs_staff->qop_date);
        $certi_exp = explode(',', $srs_staff->certi_exp);
        $emp_certi = explode(',', $srs_staff->emp_certi);

        $item_last= last($item_no);
        $num = (int)$item_last;
        
        
        return view('srs_staffs/edit',compact('srs_staff', 'name', 'item_no', 'quali', 'qop_date', 'certi_exp', 'emp_certi', 'num'));
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
        $this->authorize('update', SrsStaff::class);
        $srs_staff = SrsStaff::find($id);

        
        $srs_staff->name = request('fname')."  ".request('mname')."  ".request('lname');
        $srs_staff->address = request('address') ?? '';
        $srs_staff->ph = request('ph') ?? '';
        $srs_staff->dob = request('dob') ?? '';
        $srs_staff->email = request('email') ?? '';
        $srs_staff->company_id = Auth::user()->c_id  ?? '';
        $srs_staff->location_id = Auth::user()->l_id  ?? '';

        $srs_staff->posi = request('posi')  ?? '';
        $srs_staff->tfn = request('tfn')  ?? '';
        $srs_staff->abn = request('abn')  ?? '';
        $srs_staff->s_comp = request('s_comp')  ?? '';
        $srs_staff->s_no = request('s_no')  ?? '';
        $srs_staff->fi_date = request('fi_date')  ?? '';
        $srs_staff->crime = request('crime')  ?? '';
        $srs_staff->w_child = request('w_child')  ?? '';

        $data1[] = implode(',', (array) request('quali')) ?? '';
        $data2[] = implode(',', (array) request('certi_exp')) ?? '';

        $srs_staff->item_no = implode(',', (array) request('item_no')) ?? '';
        $srs_staff->quali = implode(',', (array) request('quali')) ?? '';
        $srs_staff->qop_date = implode(',', (array) request('qop_date')) ?? '';
        $srs_staff->certi_exp = implode(',', (array) request('certi_exp')) ?? '';
        $srs_staff->emp_certi = implode(',', (array) request('certifile')) ?? '';
        $data1[] = implode(',', (array) request('certifile')) ?? '';
        if(request('emp_certi'))
          {
            foreach(request('emp_certi') as $file)
            {
             
                $name = time().'.'.$file->getClientOriginalName();
                $file->move(public_path().'/certificates/', $name);  
                $data2[] = $name;  
            }
          $result = array_merge_recursive($data1, $data2);  
          
          $srs_staff->emp_certi = implode(',', (array) $result) ?? '';
        }  
        
        $srs_staff->user_id =  Auth::user()->id;
        
        $srs_staff->save();

        Certificate::where('res_id', '=', $id)->delete();

        $keysOne = array_keys($data1);
        $keysTwo = array_keys($data2);

        $min = min(count($data1), count($data2));

        for($i = 0; $i < $min; $i++) {

            $certi = new Certificate();
            $certi->res_name = $srs_staff->name;
            $certi->res_id = $id;
            $certi->certi_name = $data1[$keysOne[$i]];
            $certi->certi_exp = $data2[$keysTwo[$i]];          
            
            $certi->user_id =  Auth::user()->id;
            $certi->company_id = Auth::user()->c_id  ?? '';
            $certi->location_id = Auth::user()->l_id  ?? '';

             $certi->save();

        }

        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "SrsStaff Report";
        $activity->save();

        return redirect()->route('srs_staffs.index')
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
        $this->authorize('destroy', SrsStaff::class);
        Certificate::where('res_id', '=', $id)->delete();

        SrsStaff::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "SrsStaff Report";
        $activity->save();
        return redirect()->route('srs_staffs.index')
                        ->with('success','deleted successfully');
    }

    public function getDownload($file_name){

        $file = public_path().'/certificates/'.$file_name;
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file,$file_name,$headers);
    }

    public function certiExp(){

        $certis = Certificate::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('certi_exp', '<', Carbon::now())->get() ?? '';
        return view('srs_staffs/certi_exp',compact('certis'));
    }


}
