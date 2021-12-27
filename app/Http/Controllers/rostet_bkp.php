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
use App\Models\Rostdetail;

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

        $data1[] = implode(',', (array) request('sun')) ?? '';
        $data2[] = implode(',', (array) request('sunto')) ?? '';
        $keysOne = array_keys($data1);
        $keysTwo = array_keys($data2);
        $min = min(count($data1), count($data2));
        for($i = 0; $i < $min; $i++) {

        $startTime  =  DateTime::createFromFormat('H:i', $data1[$keysOne[$i]]);
        $finishTime  = DateTime::createFromFormat('H:i', $data2[$keysTwo[$i]]);   
        
        $d1 = $finishTime->diff($startTime)->format('%H:%I');
        $diffr1[] = $d1;
        }

        $data3[] = implode(',', (array) request('mon')) ?? '';
        $data4[] = implode(',', (array) request('monto')) ?? '';
        $keysOne2 = array_keys($data3);
        $keysTwo2 = array_keys($data4);
        $min2 = min(count($data3), count($data4));
        for($i = 0; $i < $min2; $i++) {

        $startTime2  =  DateTime::createFromFormat('H:i', $data3[$keysOne2[$i]]);
        $finishTime2  = DateTime::createFromFormat('H:i', $data4[$keysTwo2[$i]]);   
        
        $d2 = $finishTime2->diff($startTime2)->format('%H:%I');
        $diffr2[] = $d2;
        }

        $data5[] = implode(',', (array) request('tue')) ?? '';
        $data6[] = implode(',', (array) request('tueto')) ?? '';
        $keysOne3 = array_keys($data5);
        $keysTwo3 = array_keys($data6);
        $min3 = min(count($data5), count($data6));
        for($i = 0; $i < $min3; $i++) {

        $startTime3  =  DateTime::createFromFormat('H:i', $data5[$keysOne3[$i]]);
        $finishTime3  = DateTime::createFromFormat('H:i', $data6[$keysTwo3[$i]]);   
        
        $d3 = $finishTime3->diff($startTime3)->format('%H:%I');
        $diffr3[] = $d3;
        }

        $data7[] = implode(',', (array) request('wed')) ?? '';
        $data8[] = implode(',', (array) request('wedto')) ?? '';
        $keysOne4 = array_keys($data7);
        $keysTwo4 = array_keys($data8);
        $min4 = min(count($data7), count($data8));
        for($i = 0; $i < $min4; $i++) {

        $startTime4  =  DateTime::createFromFormat('H:i', $data7[$keysOne4[$i]]);
        $finishTime4  = DateTime::createFromFormat('H:i', $data8[$keysTwo4[$i]]);   
        
        $d4 = $finishTime4->diff($startTime4)->format('%H:%I');
        $diffr4[] = $d4;
        }

        $data9[] = implode(',', (array) request('thu')) ?? '';
        $data10[] = implode(',', (array) request('thuto')) ?? '';
        $keysOne5 = array_keys($data9);
        $keysTwo5 = array_keys($data10);
        $min5 = min(count($data9), count($data10));
        for($i = 0; $i < $min5; $i++) {

        $startTime5  =  DateTime::createFromFormat('H:i', $data9[$keysOne5[$i]]);
        $finishTime5  = DateTime::createFromFormat('H:i', $data10[$keysTwo5[$i]]);   
        
        $d5 = $finishTime5->diff($startTime5)->format('%H:%I');
        $diffr5[] = $d5;
        }

        $data11[] = implode(',', (array) request('fri')) ?? '';
        $data12[] = implode(',', (array) request('frito')) ?? '';
        $keysOne6 = array_keys($data11);
        $keysTwo6 = array_keys($data12);
        $min6 = min(count($data11), count($data12));
        for($i = 0; $i < $min6; $i++) {

        $startTime6  =  DateTime::createFromFormat('H:i', $data11[$keysOne6[$i]]);
        $finishTime6  = DateTime::createFromFormat('H:i', $data12[$keysTwo6[$i]]);   
        
        $d6 = $finishTime6->diff($startTime6)->format('%H:%I');
        $diffr6[] = $d6;
        }

        $data13[] = implode(',', (array) request('sat')) ?? '';
        $data14[] = implode(',', (array) request('satto')) ?? '';
        $keysOne7 = array_keys($data13);
        $keysTwo7 = array_keys($data14);
        $min7 = min(count($data13), count($data14));
        for($i = 0; $i < $min7; $i++) {

        $startTime7  =  DateTime::createFromFormat('H:i', $data13[$keysOne7[$i]]);
        $finishTime7  = DateTime::createFromFormat('H:i', $data14[$keysTwo7[$i]]);   
        
        $d7 = $finishTime7->diff($startTime7)->format('%H:%I');
        $diffr7[] = $d7;
        }

        $keysOneDiff1 = array_keys($diffr1);
        $keysOneDiff2 = array_keys($diffr2);
        $keysOneDiff3 = array_keys($diffr3);
        $keysOneDiff4 = array_keys($diffr4);
        $keysOneDiff5 = array_keys($diffr5);
        $keysOneDiff6 = array_keys($diffr6);
        $keysOneDiff7 = array_keys($diffr7);

        $mindiff = min(count($diffr1), count($diffr2));
        for($i = 0; $i < $mindiff; $i++) {

        $time1  =  Carbon::parse($diffr1[$keysOneDiff1[$i]])->hour;
        $time2  =  Carbon::parse($diffr2[$keysOneDiff2[$i]])->hour;
        $time3  =  Carbon::parse($diffr3[$keysOneDiff3[$i]])->hour;
        $time4  =  Carbon::parse($diffr4[$keysOneDiff4[$i]])->hour;
        $time5  =  Carbon::parse($diffr5[$keysOneDiff5[$i]])->hour;
        $time6  =  Carbon::parse($diffr6[$keysOneDiff6[$i]])->hour;
        $time7  =  Carbon::parse($diffr7[$keysOneDiff7[$i]])->hour;   

        $timemin1  =  Carbon::parse($diffr1[$keysOneDiff1[$i]])->minute;
        $timemin2  =  Carbon::parse($diffr2[$keysOneDiff2[$i]])->minute;
        $timemin3  =  Carbon::parse($diffr3[$keysOneDiff3[$i]])->minute;
        $timemin4  =  Carbon::parse($diffr4[$keysOneDiff4[$i]])->minute;
        $timemin5  =  Carbon::parse($diffr5[$keysOneDiff5[$i]])->minute;
        $timemin6  =  Carbon::parse($diffr6[$keysOneDiff6[$i]])->minute;
        $timemin7  =  Carbon::parse($diffr7[$keysOneDiff7[$i]])->minute;
        
        //$totalhrr = $time1->addHours($time2)->addHours($time3)->addHours($time4)->addHours($time5)->addHours($time6)->addHours($time7)->format('H:I');
        $totalhrr = $time1 + $time2 + $time3 + $time4 + $time5 + $time6 + $time7;
        $totalmin = $timemin1 + $timemin2 + $timemin3 + $timemin4 + $timemin5 + $timemin6 + $timemin7;
        $totalTime = $totalhrr.':'.$totalmin;
        //Carbon::parse('H:i:s',$a)->addHourss($b))->addHourss((intval($c)));
        //$tt = timezone_open($totalhrr);
        $totHr[] = $totalTime;
        }

        $roster->tot_hr = implode(',', (array) $totHr);

        $roster->company_id = Auth::user()->c_id  ?? '';
        $roster->location_id = Auth::user()->l_id  ?? '';
        $roster->user_id =  Auth::user()->id;
        
        $roster->save();

      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "Roster Report";
      $activity->save();

      return redirect()->route('rosters.index')
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
          $tot_hr = explode(',', $roster->tot_hr);
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;

        return view('rosters/show',compact('roster','p_from','p_to','mngr','a_mngr', 'c_oofr', 'prop', 'faci', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'tot_hr', 'emps', 'num'));
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
          $tot_hr = explode(',', $roster->tot_hr) ?? '';
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;

        return view('rosters/edit',compact('roster','p_from','p_to','mngr','a_mngr', 'c_oofr', 'prop', 'faci', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'tot_hr', 'emps', 'num'));
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
        //$roster->tot_hr = implode(',', (array) request('tot_hr')) ?? ' ';
        $data1[] = implode(',', (array) request('sun')) ?? '';
        $data2[] = implode(',', (array) request('sunto')) ?? '';
        $keysOne = array_keys($data1);
        $keysTwo = array_keys($data2);
        $min = min(count($data1), count($data2));
        for($i = 0; $i < $min; $i++) {

        $startTime  =  DateTime::createFromFormat('H:i', $data1[$keysOne[$i]]);
        $finishTime  = DateTime::createFromFormat('H:i', $data2[$keysTwo[$i]]);   
        
        $d1 = $finishTime->diff($startTime)->format('%H:%I');
        $diffr1[] = $d1;
        }

        $data3[] = implode(',', (array) request('mon')) ?? '';
        $data4[] = implode(',', (array) request('monto')) ?? '';
        $keysOne2 = array_keys($data3);
        $keysTwo2 = array_keys($data4);
        $min2 = min(count($data3), count($data4));
        for($i = 0; $i < $min2; $i++) {

        $startTime2  =  DateTime::createFromFormat('H:i', $data3[$keysOne2[$i]]);
        $finishTime2  = DateTime::createFromFormat('H:i', $data4[$keysTwo2[$i]]);   
        
        $d2 = $finishTime2->diff($startTime2)->format('%H:%I');
        $diffr2[] = $d2;
        }

        $data5[] = implode(',', (array) request('tue')) ?? '';
        $data6[] = implode(',', (array) request('tueto')) ?? '';
        $keysOne3 = array_keys($data5);
        $keysTwo3 = array_keys($data6);
        $min3 = min(count($data5), count($data6));
        for($i = 0; $i < $min3; $i++) {

        $startTime3  =  DateTime::createFromFormat('H:i', $data5[$keysOne3[$i]]);
        $finishTime3  = DateTime::createFromFormat('H:i', $data6[$keysTwo3[$i]]);   
        
        $d3 = $finishTime3->diff($startTime3)->format('%H:%I');
        $diffr3[] = $d3;
        }

        $data7[] = implode(',', (array) request('wed')) ?? '';
        $data8[] = implode(',', (array) request('wedto')) ?? '';
        $keysOne4 = array_keys($data7);
        $keysTwo4 = array_keys($data8);
        $min4 = min(count($data7), count($data8));
        for($i = 0; $i < $min4; $i++) {

        $startTime4  =  DateTime::createFromFormat('H:i', $data7[$keysOne4[$i]]);
        $finishTime4  = DateTime::createFromFormat('H:i', $data8[$keysTwo4[$i]]);   
        
        $d4 = $finishTime4->diff($startTime4)->format('%H:%I');
        $diffr4[] = $d4;
        }

        $data9[] = implode(',', (array) request('thu')) ?? '';
        $data10[] = implode(',', (array) request('thuto')) ?? '';
        $keysOne5 = array_keys($data9);
        $keysTwo5 = array_keys($data10);
        $min5 = min(count($data9), count($data10));
        for($i = 0; $i < $min5; $i++) {

        $startTime5  =  DateTime::createFromFormat('H:i', $data9[$keysOne5[$i]]);
        $finishTime5  = DateTime::createFromFormat('H:i', $data10[$keysTwo5[$i]]);   
        
        $d5 = $finishTime5->diff($startTime5)->format('%H:%I');
        $diffr5[] = $d5;
        }

        $data11[] = implode(',', (array) request('fri')) ?? '';
        $data12[] = implode(',', (array) request('frito')) ?? '';
        $keysOne6 = array_keys($data11);
        $keysTwo6 = array_keys($data12);
        $min6 = min(count($data11), count($data12));
        for($i = 0; $i < $min6; $i++) {

        $startTime6  =  DateTime::createFromFormat('H:i', $data11[$keysOne6[$i]]);
        $finishTime6  = DateTime::createFromFormat('H:i', $data12[$keysTwo6[$i]]);   
        
        $d6 = $finishTime6->diff($startTime6)->format('%H:%I');
        $diffr6[] = $d6;
        }

        $data13[] = implode(',', (array) request('sat')) ?? '';
        $data14[] = implode(',', (array) request('satto')) ?? '';
        $keysOne7 = array_keys($data13);
        $keysTwo7 = array_keys($data14);
        $min7 = min(count($data13), count($data14));
        for($i = 0; $i < $min7; $i++) {

        $startTime7  =  DateTime::createFromFormat('H:i', $data13[$keysOne7[$i]]);
        $finishTime7  = DateTime::createFromFormat('H:i', $data14[$keysTwo7[$i]]);   
        
        $d7 = $finishTime7->diff($startTime7)->format('%H:%I');
        $diffr7[] = $d7;
        }

        $keysOneDiff1 = array_keys($diffr1);
        $keysOneDiff2 = array_keys($diffr2);
        $keysOneDiff3 = array_keys($diffr3);
        $keysOneDiff4 = array_keys($diffr4);
        $keysOneDiff5 = array_keys($diffr5);
        $keysOneDiff6 = array_keys($diffr6);
        $keysOneDiff7 = array_keys($diffr7);

        $mindiff = min(count($diffr1), count($diffr2));
        for($i = 0; $i < $mindiff; $i++) {

        $time1  =  Carbon::parse($diffr1[$keysOneDiff1[$i]])->hour;
        $time2  =  Carbon::parse($diffr2[$keysOneDiff2[$i]])->hour;
        $time3  =  Carbon::parse($diffr3[$keysOneDiff3[$i]])->hour;
        $time4  =  Carbon::parse($diffr4[$keysOneDiff4[$i]])->hour;
        $time5  =  Carbon::parse($diffr5[$keysOneDiff5[$i]])->hour;
        $time6  =  Carbon::parse($diffr6[$keysOneDiff6[$i]])->hour;
        $time7  =  Carbon::parse($diffr7[$keysOneDiff7[$i]])->hour;   

        $timemin1  =  Carbon::parse($diffr1[$keysOneDiff1[$i]])->minute;
        $timemin2  =  Carbon::parse($diffr2[$keysOneDiff2[$i]])->minute;
        $timemin3  =  Carbon::parse($diffr3[$keysOneDiff3[$i]])->minute;
        $timemin4  =  Carbon::parse($diffr4[$keysOneDiff4[$i]])->minute;
        $timemin5  =  Carbon::parse($diffr5[$keysOneDiff5[$i]])->minute;
        $timemin6  =  Carbon::parse($diffr6[$keysOneDiff6[$i]])->minute;
        $timemin7  =  Carbon::parse($diffr7[$keysOneDiff7[$i]])->minute;
        
        //$totalhrr = $time1->addHours($time2)->addHours($time3)->addHours($time4)->addHours($time5)->addHours($time6)->addHours($time7)->format('H:I');
        $totalhrr = $time1 + $time2 + $time3 + $time4 + $time5 + $time6 + $time7;
        $totalmin = $timemin1 + $timemin2 + $timemin3 + $timemin4 + $timemin5 + $timemin6 + $timemin7;
        $totalTime = $totalhrr.':'.$totalmin;
        //Carbon::parse('H:i:s',$a)->addHourss($b))->addHourss((intval($c)));
        //$tt = timezone_open($totalhrr);
        $totHr[] = $totalTime;
        }

        $roster->tot_hr = implode(',', (array) $totHr);
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

        return redirect()->route('rosters.index')
                        ->with('success','updated successfully');
                    }
        
    }

    public function generaterosters()
    {   
        $rosters = Roster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
        return view('rosters/report_show',compact('rosters'));
    
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
          $tot_hr = explode(',', $roster->tot_hr);
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;
          $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();


        return view('rosters/report',compact('roster','p_from','p_to','mngr','a_mngr', 'c_oofr', 'prop', 'faci', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'tot_hr', 'emps', 'num', 'locations'));  
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
          $tot_hr = explode(',', $roster->tot_hr);
      $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail();

      return view('rosters/report', compact('roster', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'tot_hr','locations'));
      
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
          $tot_hr = explode(',', $roster->tot_hr) ?? '';
          $residents = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where([['location_id', '=', Auth::user()->l_id],['status', '=', 'Active']])->orderBy('fname')->get() ?? '';
        //$residents = $resid->where('status', '=', 'Active');
        $companies = CompanyMaster::all();
        $emps = SrsStaff::orderBy('name')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get();
        $item_last= count($e_name);
          $num = (int)$item_last;

        return view('rosters/previous',compact('roster','p_from','p_to','mngr','a_mngr', 'c_oofr', 'prop', 'faci', 'e_name', 'e_pos', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sunto', 'monto', 'tueto', 'wedto', 'thuto', 'frito', 'satto', 'tot_hr', 'emps', 'num'));

    }

}
