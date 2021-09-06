<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\ClientDetailsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\ClientDetail;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class ClientDetailsController extends Controller
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
        $this->authorize('index', ClientDetail::class);
       
        $client_details = ClientDetail::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id)->orderBy('fname');
       

        if ($request->filled('search')) {
            $client_details = $client_details->TextSearch($request->input('search'));
        }
         $offset = (($client_details) && ($request->get('offset') > $client_details->count())) ? $client_details->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        

        $total = $client_details->count();
        $client_details = $client_details->skip($offset)->take($limit)->get();
        return (new ClientDetailsTransformer)->transformClientDetails($client_details, $total);
    }


    
    
}
