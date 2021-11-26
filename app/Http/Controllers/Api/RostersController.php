<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\RostersTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Roster;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class RostersController extends Controller
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
        $this->authorize('index', Roster::class);

        $rosters = Roster::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $rosters = $rosters->TextSearch($request->input('search'));
        }
        
        $offset = (($rosters) && ($request->get('offset') > $rosters->count())) ? $rosters->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $rosters->count();
        $rosters = $rosters->skip($offset)->take($limit)->get();
        return (new RostersTransformer)->transformRosters($rosters, $total);
    }


    
    
}
