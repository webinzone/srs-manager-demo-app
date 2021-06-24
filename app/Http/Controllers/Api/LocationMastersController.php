<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\LocationMastersTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\LocationMaster;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class LocationMastersController extends Controller
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
        $this->authorize('index', LocationMaster::class);
        
        $location_masters = LocationMaster::where('user_id', '=', Auth::user()->id);
       

        if ($request->filled('search')) {
            $location_masters = $location_masters->TextSearch($request->input('search'));
        }
        
        $offset = (($location_masters) && ($request->get('offset') > $location_masters->count())) ? $location_masters->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $location_masters->count();
        $location_masters = $location_masters->skip($offset)->take($limit)->get();
        return (new LocationMastersTransformer)->transformLocationMasters($location_masters, $total);
    }


    
    
}
