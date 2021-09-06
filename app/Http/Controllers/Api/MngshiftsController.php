<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\MngshiftsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Mngshift;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class MngshiftsController extends Controller
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
        $this->authorize('index', Mngshift::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $mngshifts = Mngshift::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $mngshifts = $mngshifts->TextSearch($request->input('search'));
        }
        
        $offset = (($mngshifts) && ($request->get('offset') > $mngshifts->count())) ? $mngshifts->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $mngshifts->count();
        $mngshifts = $mngshifts->skip($offset)->take($limit)->get();
        return (new MngshiftsTransformer)->transformMngshifts($mngshifts, $total);
    }


    
    
}
