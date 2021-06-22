<?php

namespace App\Http\Controllers\Api;
use App\Http\Transformers\ClientUsersTransformer;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\ClientUser;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;

class ClientUsersController extends Controller
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
        $this->authorize('index', ClientUser::class);
        
        $client_users = ClientUser::where('user_id', '=', Auth::user()->id);
       

        if ($request->filled('search')) {
            $client_users = $client_users->TextSearch($request->input('search'));
        }
        
        $offset = (($client_users) && ($request->get('offset') > $client_users->count())) ? $client_users->count() : $request->get('offset', 0);

        // Check to make sure the limit is not higher than the max allowed
        ((config('app.max_results') >= $request->input('limit')) && ($request->filled('limit'))) ? $limit = $request->input('limit') : $limit = config('app.max_results');

        $total = $client_users->count();
        $client_users = $client_users->skip($offset)->take($limit)->get();
        return (new ClientUsersTransformer)->transformClientUsers($client_users, $total);
    }


    
    
}
