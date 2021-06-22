<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Redirect;
use App\Models\ClientUser;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Log;
use App\Http\Requests;


/** This controller handles all actions related to Accessories for
 * the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ClientLoginController extends Controller
{
    

    function showLoginForm()
    {
        return view('client_login/index');
    }

    public function authentication(Request $request)
    {
    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
       
            return redirect('login');
        }
        else{
           return redirect('login')->with('error', 'Oppes! You have entered invalid credentials'); 
        }       

    }
    public function logout()
    {
    	Auth::logout();

      return redirect('clients_login');
    }
}