<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\RentsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Rent;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class RentsController extends Controller
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
        $this->authorize('index', Rent::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $rents = Rent::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $rents = $rents->TextSearch($request->input('search'));
        }
        
        $offset = (($rents) && ($request->get('offset') > $rents->count())) ? $rents->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $rents->count();
        $rents = $rents->skip($offset)->take($limit)->get();
        return (new RentsTransformer)->transformRents($rents, $total);
    }


    
    
}
