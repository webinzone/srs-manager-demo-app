<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\GpDetailsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\GpDetail;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class GpDetailsController extends Controller
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
        $this->authorize('index', GpDetail::class);
       
        $gp_details = GpDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $gp_details = $gp_details->TextSearch($request->input('search'));
        }
        
        $offset = (($gp_details) && ($request->get('offset') > $gp_details->count())) ? $gp_details->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $gp_details->count();
        $gp_details = $gp_details->skip($offset)->take($limit)->get();
        return (new GpDetailsTransformer)->transformGpDetails($gp_details, $total);
    }


    
    
}
