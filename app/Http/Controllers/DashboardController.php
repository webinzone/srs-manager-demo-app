<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Models\ActivityLog;
use App\Models\Booking;
use App\Models\ClientDetail;
use App\Models\Appointment;
use App\Models\Rent;
use App\Models\SrsStaff;
use App\Models\Certificate;
use App\Models\LocationMaster;
use App\Models\CompanyMaster;
use App\Models\User;

use Carbon\Carbon;
use Auth;
use View;

/**
 * This controller handles all actions related to the Admin Dashboard
 * for the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class DashboardController extends Controller
{
    /**
    * Check authorization and display admin dashboard, otherwise display
    * the user's checked-out assets.
    *
    * @author [A. Gianotto] [<snipe@snipe.net>]
    * @since [v1.0]
    * @return View
    */
    public function getIndex()
    {
        if (Auth::user()->hasAccess('admin')) {
            
            $asset_stats=null;
            if(Auth::user()->s_role == "c_admin" || Auth::user()->s_role == "c_users") {
                $locations = LocationMaster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->firstOrFail() ?? '';    
            }
            else {
                $locations = " ";
            }
            
            $certis = Certificate::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->where('certi_exp', '<', Carbon::now())->get() ?? '';

            $apps = Appointment::where('status', '=', 'Pending')->orderBy('app_date', 'asc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $appois = Appointment::where('status', '=', 'Re-scheduled')->orderBy('resc_date', 'asc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $rents = Rent::where('status', '=', 'Unpaid')->orderBy('nextpay_date', 'asc')->where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            
            $counts['resident'] = \App\Models\ClientDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->count();
            $counts['appointments'] = Appointment::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->count();
            $counts['bookings'] = \App\Models\Booking::count();
            $counts['rosters'] = \App\Models\Roster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->count();
            
            if ((!file_exists(storage_path().'/oauth-private.key')) || (!file_exists(storage_path().'/oauth-public.key'))) {
                \Artisan::call('migrate', ['--force' => true]);
                \Artisan::call('passport:install');
            }
            return view('dashboard')->with('asset_stats', $asset_stats)->with('counts', $counts)->with('apps', $apps)->with('appois', $appois)->with('certis', $certis)->with('rents', $rents)->with('residents', $residents)->with('locations', $locations);
        } else {
        // Redirect to the profile page
            return redirect()->intended('account/view-assets');
        }
    }

    public function development(){
        return view('development');
    }

    public function cusers(){
        $companies = CompanyMaster::all();
        $locations = LocationMaster::all();
        return view('normal_users',compact('companies','locations'));
    }
    public function vw_users(){
       $cid = request('companyid');
       $lid =  request('locationid');
       $ctype =  "c_users";
       $vwusers = User::where('c_id', '=', $cid)->where('l_id', '=', $lid)->where('s_role', '=', $ctype)->get() ?? '';
       return view('viewusers',compact('vwusers'));
    }
    public function logs(){
        $activity_logs = ActivityLog::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('created_at', 'DESC')->get();
        return view('logs',compact('activity_logs'));
    }
}
