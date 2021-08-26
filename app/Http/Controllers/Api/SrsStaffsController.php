<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\SrsStaffsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\SrsStaff;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class SrsStaffsController extends Controller
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
        $this->authorize('index', SrsStaff::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $srs_staffs = SrsStaff::where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $srs_staffs = $srs_staffs->TextSearch($request->input('search'));
        }
        
        $offset = (($srs_staffs) && ($request->get('offset') > $srs_staffs->count())) ? $srs_staffs->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $srs_staffs->count();
        $srs_staffs = $srs_staffs->skip($offset)->take($limit)->get();
        return (new SrsStaffsTransformer)->transformSrsStaffs($srs_staffs, $total);
    }


    
    
}
