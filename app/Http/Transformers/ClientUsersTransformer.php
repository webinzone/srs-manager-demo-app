<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\ClientUser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ClientUsersTransformer
{

    public function transformClientUsers (Collection $client_users, $total)
    {
        $array = array();
        foreach ($client_users as $client_user) {
            $array[] = self::transformClientUser($client_user);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformClientUser (ClientUser $client_user = null)
    {
        if ($client_user) {

            $array = [
                'id' => (int) $client_user->id,
                'fname' => e($client_user->fname." ".$client_user->mname." ".$client_user->cname),
                'email' => e($client_user->email),
                'dob' => e($client_user->dob),
                'ph' => e($client_user->ph),
                'role' => e($client_user->role),
                'username' => e($client_user->username),
                'password' => e($client_user->password),
                'created_at' => e($client_user->created_at),
                'actions' => view('client_users/datatables_actions', compact('client_user'))->render() 
                
            ];


            return $array;
        }


    }



}
