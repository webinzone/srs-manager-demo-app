<?php
namespace App\Http\Transformers;

use App\Helpers\Helper;
use Gate;
use App\Models\ClientDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class ClientDetailsTransformer
{

    public function transformClientDetails (Collection $client_details, $total)
    {
        $array = array();
        foreach ($client_details as $client_detail) {
            $array[] = self::transformClientDetail($client_detail);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformClientDetail (ClientDetail $client_detail = null)
    {
        if ($client_detail) {

            $array = [
                'id' => (int) $client_detail->id,
                'fname' => e($client_detail->fname),
                'mname' => e($client_detail->mname),
                'lname' => e($client_detail->lname),
                'dob' => e($client_detail->dob),
                'gender' => e($client_detail->gender),
                'ph' => e($client_detail->ph),
                'created_at' => e($client_detail->created_at),
                'actions' => view('clients/datatables_actions', compact('client_detail'))->render()                 
            ];


            return $array;
        }


    }



}
