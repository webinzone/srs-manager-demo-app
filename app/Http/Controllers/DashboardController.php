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
            $certis = Certificate::where('certi_exp', '<', Carbon::now())->get() ?? '';

            $apps = Appointment::where('status', '=', 'Pending')->orderBy('app_date', 'desc')->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $appois = Appointment::where('status', '=', 'Re-scheduled')->orderBy('resc_date', 'desc')->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $residents = ClientDetail::where('status', '=', 'Active')->orderBy('fname')->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            $rents = Rent::where('status', '=', 'Unpaid')->orderBy('nextpay_date', 'desc')->where('location_id', '=', Auth::user()->l_id)->get() ?? '';
            
            $counts['resident'] = \App\Models\ClientDetail::where('location_id', '=', Auth::user()->l_id)->count();
            $counts['appointments'] = Appointment::where('location_id', '=', Auth::user()->l_id)->count();
            $counts['bookings'] = \App\Models\Booking::count();
            $counts['staff_roaster'] = \App\Models\StaffRoaster::where('location_id', '=', Auth::user()->l_id)->count();
            
            if ((!file_exists(storage_path().'/oauth-private.key')) || (!file_exists(storage_path().'/oauth-public.key'))) {
                \Artisan::call('migrate', ['--force' => true]);
                \Artisan::call('passport:install');
            }
            return view('dashboard')->with('asset_stats', $asset_stats)->with('counts', $counts)->with('apps', $apps)->with('appois', $appois)->with('certis', $certis)->with('rents', $rents)->with('residents', $residents);
        } else {
        // Redirect to the profile page
            return redirect()->intended('account/view-assets');
        }
    }
}
