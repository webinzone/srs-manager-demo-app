<?php
namespace App\Http\Controllers;

use App\Http\Controllers\AdminController;
use App\Models\ActivityLog;
use App\Models\Booking;
use App\Models\ClientDetail;
use App\Models\Appointment;


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

            $apps = Appointment::where('status', '=', 'Pending')->orderBy('created_at', 'desc')->get() ?? '';
            $residents = ClientDetail::all();
            

            $counts['resident'] = \App\Models\ClientDetail::count();
            $counts['appointments'] = Appointment::count();
            $counts['bookings'] = \App\Models\Booking::count();
            $counts['staff_roaster'] = \App\Models\StaffRoaster::count();
            
            if ((!file_exists(storage_path().'/oauth-private.key')) || (!file_exists(storage_path().'/oauth-public.key'))) {
                \Artisan::call('migrate', ['--force' => true]);
                \Artisan::call('passport:install');
            }
            return view('dashboard')->with('asset_stats', $asset_stats)->with('counts', $counts)->with('apps', $apps)->with('residents', $residents);
        } else {
        // Redirect to the profile page
            return redirect()->intended('account/view-assets');
        }
    }
}
