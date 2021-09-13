<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\AppointmentsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Appointment;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.0]
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('index', Appointment::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $appointments = Appointment::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('app_date', 'asc');
       

        if ($request->filled('search')) {
            $appointments = $appointments->TextSearch($request->input('search'));
        }
        
        $offset = (($appointments) && ($request->get('offset') > $appointments->count())) ? $appointments->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $appointments->count();
        $appointments = $appointments->skip($offset)->take($limit)->get();
        return (new AppointmentsTransformer)->transformAppointments($appointments, $total);
    }


    
    
}
