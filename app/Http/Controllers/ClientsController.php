<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;

use App\Models\ClientDetail;
use App\Models\ClientFamily;
use App\Models\ClientPowerofatony;
use App\Models\ClientAllergy;
use App\Models\ClientVisitor;
use App\Models\ClientGpdetail;
use App\Models\ClientNextofkin;
use App\Models\ActivityLog;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ClientsController extends Controller
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
        return view('clients/index');
    }

     public function create()
    {
         
        $this->authorize('create');
        return view('clients/create');
    }

    public function store()
    {
        
        $client_detail = new ClientDetail();    
        $client_detail->fname = request('fname');
        $client_detail->mname = request('mname');
        $client_detail->lname = request('lname');
        $client_detail->address = request('address');
        $client_detail->dob = request('dob');
        $client_detail->cob = request('cob');
        $client_detail->age = request('age');
        $client_detail->gender = request('gender');
        $client_detail->religion = request('religion');
        $client_detail->l_known = request('l_known');
        $client_detail->ph = request('ph');
        $client_detail->medicard_no = request('medicard_no');
        $client_detail->medicard_orderno = request('medicard_orderno');
        $client_detail->pension_no = request('pension_no');
        $client_detail->insurance_no = request('insurance_no');
        $client_detail->insu_compny = request('insu_compny');
        $client_detail->likes = request('likes');
        $client_detail->dislikes = request('dislikes');
        $client_detail->hobies = request('hobies');
        $client_detail->user_id =  Auth::user()->id;
        $client_detail->save(); 

        $clientid = $client_detail->id;

        $client_family = new ClientFamily();   
        $client_family->client_id = $clientid;
        $client_family->fname = request('f1name');
        $client_family->mname = request('m1name');
        $client_family->lname = request('l1name');
        $client_family->relation = request('relation');
        $client_family->address = request('address1');
        $client_family->gender = request('gender1');
        $client_family->ph = request('ph1');
        $client_family->email = request('email');
        $client_family->country = request('country');
        $client_family->religion = request('religion1');
        $client_family->user_id =  Auth::user()->id;
        $client_family->save();

        $client_powerofatony = new ClientPowerofatony();
        $client_powerofatony->client_id = $clientid;
        $client_powerofatony->po_maker = request('po_maker');
        $client_powerofatony->po_maker_address = request('po_maker_address');
        $client_powerofatony->po_granter = request('po_granter');
        $client_powerofatony->po_granter_address = request('po_granter_address');
        $client_powerofatony->grant_reason = request('grant_reason');
        $client_powerofatony->g_date = request('g_date');
        $client_powerofatony->place = request('place');
        $client_powerofatony->termination_date = request('termination_date');
        $client_powerofatony->user_id =  Auth::user()->id;
        $client_powerofatony->save();

        $client_allergy = new ClientAllergy();    
        $client_allergy->client_id = $clientid;
        $client_allergy->tof_allergy = request('tof_allergy');
        $client_allergy->hos_name = request('hos_name');
        $client_allergy->doc_name = request('doc_name');
        $client_allergy->duration = request('duration');
        $client_allergy->madicine = request('madicine');
        $client_allergy->tests_report = request('tests_report')->getClientOriginalName();
        $client_allergy->user_id =  Auth::user()->id;
        $report = request('tests_report')->getClientOriginalName();
         request()->tests_report->move(public_path('images/test_reports'), $report); 
        $client_allergy->save();

        $client_visitor = new ClientVisitor();     
        $client_visitor->client_id = $clientid;
        $client_visitor->allowed_status = request('allowed_status');
        $client_visitor->name = request('name');
        $client_visitor->gender = request('gender2');
        $client_visitor->relation = request('relation1');
        $client_visitor->address = request('address2');
        $client_visitor->ph = request('ph2');
        $client_visitor->id_no = request('id_no');
        $client_visitor->nationality = request('nationality');
        $client_visitor->user_id =  Auth::user()->id;
        $client_visitor->save();

        $client_gpdetail = new ClientGpdetail();     
        $client_gpdetail->client_id = $clientid;
        $client_gpdetail->gp_name = request('gp_name');
        $client_gpdetail->address = request('gp_address');
        $client_gpdetail->ph = request('ph3');
        $client_gpdetail->clinic_name = request('clinic_name');
        $client_gpdetail->booking_s_time = request('booking_s_time');
        $client_gpdetail->booking_e_time = request('booking_e_time');
        $client_gpdetail->user_id =  Auth::user()->id;
        $client_gpdetail->save();

        $client_nextofkin = new ClientNextofkin();    
        $client_nextofkin->client_id = $clientid;
        $client_nextofkin->allowed_status = request('allowed_status_nok');
        $client_nextofkin->name = request('nok_name');
        $client_nextofkin->gender = request('gender3');
        $client_nextofkin->relation = request('relation2');
        $client_nextofkin->address = request('nok_address3');        
        $client_nextofkin->ph = request('nok_ph');
        $client_nextofkin->id_no = request('id_no1');
        $client_nextofkin->nationality = request('nok_nationality');
        $client_nextofkin->user_id =  Auth::user()->id;
        $client_nextofkin->save();

        $activity = new ActivityLog();
        $activity->user = Auth::user()->first_name;
        $activity->action = "Added";
        $activity->item = "Client";
        $activity->save();
    
     
        return redirect()->route('clients.index')
                ->with('success','Client Added successfully');          

    }

   

}
