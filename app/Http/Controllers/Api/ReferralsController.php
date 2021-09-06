<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\ReferralsTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Referral;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class ReferralsController extends Controller
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
        $this->authorize('index', Referral::class);
        /**$complaints = Complaint::select(['id', 'f_name', 'user_name', 'c_name', 'com_details', 'com_nature', 'phone', 'suggestions', 'sign', 'action_date', 'action_taken', 'outcome']); */
        $referrals = Referral::where('company_id', '=', Auth::user()->c_id)->where('location_id', '=', Auth::user()->l_id);
       

        if ($request->filled('search')) {
            $referrals = $referrals->TextSearch($request->input('search'));
        }
        
        $offset = (($referrals) && ($request->get('offset') > $referrals->count())) ? $referrals->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $referrals->count();
        $referrals = $referrals->skip($offset)->take($limit)->get();
        return (new ReferralsTransformer)->transformReferrals($referrals, $total);
    }


    
    
}
