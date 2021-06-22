<?php
namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests;
use App\Models\ClientUser;
use App\Models\ActivityLog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;

/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ClientUsersController extends Controller
{
    /**
     * Returns a view that invokes the ajax tables which actually contains
     * the content for the accessories listing, which is generated in getDatatable.
     *
     * @since [v1.0]
     * @return View
     */
    public function index()
    {
        $this->authorize('view', ClientUser::class);
        return view('client_users/index');
    }

     /**
     * Returns a view with a form to create a new Accessory.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @return View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
         // Show the page
        $this->authorize('create',ClientUser::class);
        return view('client_users/create');
    }


    /**
     * Validate and save new Accessory from form post
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @return Redirect
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store()
    {
        $this->authorize('create',ClientUser::class);
        $client_user = new ClientUser();

        $client_user->fname = request('fname');
        $client_user->mname = request('mname');
        $client_user->cname = request('cname');
        $client_user->email = request('email');
        $client_user->dob = request('dob');
        $client_user->ph = request('ph');
        $client_user->role = request('role');
        $client_user->username = request('username');
        $client_user->password = request('password');
        $client_user->user_id =  Auth::user()->id;
        
        $client_user->save();
       
      $activity = new ActivityLog();

      $activity->user = Auth::user()->first_name;
      $activity->action = "Created";
      $activity->item = "ClientUser Report";
      $activity->save();

      return redirect()->route('client_users.index')
                    ->with('success','created successfully');
              

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show',ClientUser::class);
        $client_user = ClientUser::find($id);
        return view('client_users/show',compact('client_user'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {
        $this->authorize('edit',ClientUser::class);
        $client_user = ClientUser::find($id);
        return view('client_users/edit',compact('client_user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $this->authorize('update', ClientUser::class);
        $client_user = ClientUser::find($id);

        $client_user->fname = request('fname');
        $client_user->mname = request('mname');
        $client_user->cname = request('cname');
        $client_user->email = request('email');
        $client_user->dob = request('dob');
        $client_user->ph = request('ph');
        $client_user->role = request('role');
        $client_user->username = request('username');
        $client_user->password = request('password');
        $client_user->user_id =  Auth::user()->id;
        
        $client_user->save();
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Updated";
        $activity->item = "ClientUser Report";
        $activity->save();

        return redirect()->route('client_users.index')
                        ->with('success','updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $this->authorize('destroy', ClientUser::class);
        ClientUser::destroy($id);
        $activity = new ActivityLog();

        $activity->user = Auth::user()->first_name;
        $activity->action = "Deleted";
        $activity->item = "ClientUser Report";
        $activity->save();
        return redirect()->route('client_users.index')
                        ->with('success','deleted successfully');
    }

}
