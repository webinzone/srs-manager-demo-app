<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\EvngshiftsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Evngshift;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class EvngshiftsController extends Controller
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
        $this->authorize('index', Evngshift::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $evngshifts = Evngshift::where('user_id', '=', Auth::user()->id);
       

        if ($request->filled('search')) {
            $evngshifts = $evngshifts->TextSearch($request->input('search'));
        }
        
        $offset = (($evngshifts) && ($request->get('offset') > $evngshifts->count())) ? $evngshifts->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $evngshifts->count();
        $evngshifts = $evngshifts->skip($offset)->take($limit)->get();
        return (new EvngshiftsTransformer)->transformEvngshifts($evngshifts, $total);
    }


    
    
}
